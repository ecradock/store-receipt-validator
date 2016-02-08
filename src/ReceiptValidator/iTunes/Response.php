<?php
namespace ReceiptValidator\iTunes;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\PostDeserialize;

class Response
{
    const RESULT_OK = 0;

    // The App Store could not read the JSON object you provided.
    const RESULT_APPSTORE_CANNOT_READ = 21000;

    // The data in the receipt-data property was malformed or missing.
    const RESULT_DATA_MALFORMED = 21002;

    // The receipt could not be authenticated.
    const RESULT_RECEIPT_NOT_AUTHENTICATED = 21003;

    // The shared secret you provided does not match the shared secret on file for your account.
    // Only returned for iOS 6 style transaction receipts for auto-renewable subscriptions.
    const RESULT_SHARED_SECRET_NOT_MATCH = 21004;

    // The receipt server is not currently available.
    const RESULT_RECEIPT_SERVER_UNAVAILABLE = 21005;

    // This receipt is valid but the subscription has expired. When this status code is returned to your server, the receipt data is also decoded and returned as part of the response.
    // Only returned for iOS 6 style transaction receipts for auto-renewable subscriptions.
    const RESULT_RECEIPT_VALID_BUT_SUB_EXPIRED = 21006;

    // This receipt is from the test environment, but it was sent to the production environment for verification. Send it to the test environment instead.
    // special case for app review handling - forward any request that is intended for the Sandbox but was sent to Production, this is what the app review team does
    const RESULT_SANDBOX_RECEIPT_SENT_TO_PRODUCTION = 21007;

    // This receipt is from the production environment, but it was sent to the test environment for verification. Send it to the production environment instead.
    const RESULT_PRODUCTION_RECEIPT_SENT_TO_SANDBOX = 21008;

    /**
    * @Type("integer")
    */
    protected $status;

    /**
    * @Type("ReceiptValidator\iTunes\ReceiptResponse")
    */
    protected $receipt;

    /**
    * @Type("ReceiptValidator\iTunes\ReceiptResponse")
    * @SerializedName("latest_expired_receipt_info")
    */
    protected $latestExpiredReceiptInfo;

    /**
    * @Type("ReceiptValidator\iTunes\LatestReceiptResponse")
    * @SerializedName("latest_receipt")
    */
    protected $latestReceipt;

    /**
     * @Type("ReceiptValidator\iTunes\ReceiptResponse")
     * @SerializedName("latest_receipt_info")
     */
    protected $latestReceiptInfo;

    /**
     * @return ReceiptResponse
     */
    public function getLatestExpiredReceiptInfo()
    {
        return $this->latestExpiredReceiptInfo;
    }

    /**
     * @param ReceiptResponse $latestExpiredReceiptInfo
     */
    public function setLatestExpiredReceiptInfo($latestExpiredReceiptInfo)
    {
        $this->latestExpiredReceiptInfo = $latestExpiredReceiptInfo;
    }

    /**
     * @return LatestReceiptResponse
     */
    public function getLatestReceipt()
    {
        return $this->latestReceipt;
    }

    /**
     * @param LatestReceiptResponse $latestReceipt
     */
    public function setLatestReceipt($latestReceipt)
    {
        $this->latestReceipt = $latestReceipt;
    }

    /**
     * @return LatestReceiptResponse
     */
    public function getLatestReceiptInfo()
    {
        return $this->latestReceiptInfo;
    }

    /**
     * @param ReceiptResponse $latestReceiptInfo
     */
    public function setLatestReceiptInfo($latestReceiptInfo)
    {
        $this->latestReceiptInfo = $latestReceiptInfo;
    }

    /**
     * @return ReceiptResponse
     */
    public function getReceipt()
    {
        return $this->receipt;
    }

    /**
     * @param ReceiptResponse $receipt
     */
    public function setReceipt($receipt)
    {
        $this->receipt = $receipt;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return self::RESULT_OK == $this->getStatus();
    }
}
