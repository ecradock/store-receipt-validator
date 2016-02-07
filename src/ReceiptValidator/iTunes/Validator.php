<?php
namespace ReceiptValidator\iTunes;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Guzzle\Http\Client as GuzzleClient;
use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use ReceiptValidator\iTunes\SerializationSubscriber\LatestReceiptDeserializerSubscriber;
use ReceiptValidator\iTunes\SerializationSubscriber\PurchaseInfoDeserializerSubscriber;
use ReceiptValidator\RunTimeException;

class Validator
{

    const ENDPOINT_SANDBOX = 'https://sandbox.itunes.apple.com/verifyReceipt';

    const ENDPOINT_PRODUCTION = 'https://buy.itunes.apple.com/verifyReceipt';

    /**
     * endpoint url
     *
     * @var string
     */
    protected $_endpoint;

    /**
     * itunes receipt data, in base64 format
     *
     * @var string
     */
    protected $_receiptData;


    /**
     * itunes shared secret ie. password
     *
     * @var string
     */
    protected $_iStoreSharedSecret = null;

    /**
     * Guzzle http client
     *
     * @var \Guzzle\Http\Client
     */
    protected $_client = null;

    /**
     * Serializer
     *
     * @var SerializerInterface
     */
    protected $serializer;

    public function __construct($endpoint = self::ENDPOINT_PRODUCTION, SerializerInterface $serializer = null)
    {
        if ($endpoint != self::ENDPOINT_PRODUCTION && $endpoint != self::ENDPOINT_SANDBOX) {
            throw new RunTimeException("Invalid endpoint '{$endpoint}'");
        }

        if($serializer === null)
        {
            // @TODO: See if we can refactor to not require this.
            AnnotationRegistry::registerLoader('class_exists');

            $builder = SerializerBuilder::create();

            $builder->configureListeners(function(EventDispatcher $dispatcher) {
                $dispatcher->addSubscriber(new LatestReceiptDeserializerSubscriber());
                $dispatcher->addSubscriber(new PurchaseInfoDeserializerSubscriber());
            });

            $this->serializer = $builder->build();
        }

        $this->_endpoint = $endpoint;
    }

    /**
     * get receipt data
     *
     * @return string
     */
    public function getReceiptData()
    {
        return $this->_receiptData;
    }

    /**
     * set receipt data, either in base64, or in json
     *
     * @param string $receiptData
     * @return \ReceiptValidator\iTunes\Validator;
     */
    function setReceiptData($receiptData)
    {
        if (strpos($receiptData, '{') !== false) {
            $this->_receiptData = base64_encode($receiptData);
        } else {
            $this->_receiptData = $receiptData;
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getIStoreSharedSecret()
    {
        return $this->_iStoreSharedSecret;
    }

    /**
     * @param string $iStoreSharedSecret
     */
    public function setIStoreSharedSecret($iStoreSharedSecret)
    {
        $this->_iStoreSharedSecret = $iStoreSharedSecret;
    
        return $this;
    }

    /**
     * get endpoint
     *
     * @return string
     */
    public function getEndpoint()
    {
        return $this->_endpoint;
    }

    /**
     * set endpoint
     *
     * @param string $endpoint
     * @return\ReceiptValidator\iTunes\Validator;
     */
    function setEndpoint($endpoint)
    {
        $this->_endpoint = $endpoint;

        return $this;
    }

    /**
     * returns the Guzzle client
     *
     * @return \Guzzle\Http\Client
     */
    protected function getClient()
    {
        if ($this->_client == null) {
            $this->_client = new GuzzleClient($this->_endpoint);
        }

        return $this->_client;
    }

    /**
     * encode the request in json
     *
     * @return string
     */
    private function encodeRequest()
    {
        $request = array('receipt-data' => $this->getReceiptData());

        if( !is_null( $this->getIStoreSharedSecret() ) ) {
            $request['password'] = $this->getIStoreSharedSecret();
        }

        return json_encode( $request );
    }

    /**
     * validate the receipt data
     *
     * @param string $receiptData
     * @param string $iStoreSharedSecret
     *
     * @return Response
     */
    public function validate($receiptData = null, $iStoreSharedSecret = null)
    {

        if ($receiptData != null) {
            $this->setReceiptData($receiptData);
        }

        if ($iStoreSharedSecret != null) {
            $this->setIStoreSharedSecret($iStoreSharedSecret);
        }

        $httpResponse = $this->getClient()->post(null, null, $this->encodeRequest(), array('verify' => false))->send();

        if ($httpResponse->getStatusCode() != 200) {
            throw new RunTimeException('Unable to get response from itunes server');
        }

        $response = $this->serializer->deserialize($httpResponse->getBody(true), 'ReceiptValidator\iTunes\Response', 'json');


        // on a 21007 error retry the request in the sandbox environment (if the current environment is Production)
        // these are receipts from apple review team
        if ($this->_endpoint == self::ENDPOINT_PRODUCTION && $response->getResultCode() == Response::RESULT_SANDBOX_RECEIPT_SENT_TO_PRODUCTION) {
            $client = new GuzzleClient(self::ENDPOINT_SANDBOX);

            $httpResponse = $client->post(null, null, $this->encodeRequest(), array('verify' => false))->send();

            if ($httpResponse->getStatusCode() != 200) {
                throw new RunTimeException('Unable to get response from itunes server');
            }

            $response = new Response($httpResponse->json());
        }

        return $response;
    }
}
