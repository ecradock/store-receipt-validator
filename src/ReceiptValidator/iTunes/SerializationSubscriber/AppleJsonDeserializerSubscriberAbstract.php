<?php
namespace ReceiptValidator\iTunes\SerializationSubscriber;

use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use ReceiptValidator\iTunes\Normalizer\AppleJsonNormalizer;
use ReceiptValidator\iTunes\Normalizer\Normalizer;

/**
 * Class AppleJsonDeserializerSubscriberAbstract
 * @package ReceiptValidator\iTunes\SerializationSubscriber
 */
abstract class AppleJsonDeserializerSubscriberAbstract implements EventSubscriberInterface
{
    /**
     * @var null|AppleJsonNormalizer|Normalizer
     */
    protected $appleJsonNormalizer;

    /**
     *  AppleJsonDeserializerSubscriberAbstract constructor.
     * @param Normalizer|null $normalizer
     */
    public function __construct(Normalizer $normalizer = null)
    {
        if($normalizer === null)
        {
            $normalizer = new AppleJsonNormalizer();
        }

        $this->appleJsonNormalizer = $normalizer;
    }

    /**
     * @param PreDeserializeEvent $event
     * @return mixed
     */
    abstract public function onPreDeserialize(PreDeserializeEvent $event);

    /**
     * @param array $data
     * @param array $fieldNames
     * @return array
     */
    public function normalizeFields(array $data, array $fieldNames)
    {
        foreach($fieldNames as $fieldName)
        {
            $data[$fieldName] = base64_decode($data[$fieldName]);
            $data[$fieldName] = $this->appleJsonNormalizer->normalize($data[$fieldName]);
            $data[$fieldName] = json_decode($data[$fieldName], true);
        }

        return $data;
    }
}
