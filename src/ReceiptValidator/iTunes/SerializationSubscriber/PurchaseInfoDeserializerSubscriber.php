<?php
namespace ReceiptValidator\iTunes\SerializationSubscriber;

use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

/**
 * Class PurchaseInfoDeserializerSubscriber
 * @package ReceiptValidator\iTunes\SerializationSubscriber
 */
class PurchaseInfoDeserializerSubscriber extends AppleJsonDeserializerSubscriberAbstract
{
    /**
     * Returns the events to which this class has subscribed.
     *
     * Return format:
     *     array(
     *         array('event' => 'the-event-name', 'method' => 'onEventName', 'class' => 'some-class', 'format' => 'json'),
     *         array(...),
     *     )
     *
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return array(
            array( 'event' => 'serializer.pre_deserialize', 'method' => 'onPreDeserialize', 'class' => 'ReceiptValidator\iTunes\LatestReceiptResponse'),
        );
    }

    /**
     * @param PreDeserializeEvent $event
     */
    public function onPreDeserialize(PreDeserializeEvent $event)
    {
        $data = $event->getData();

        if(isset($data['purchase-info']))
        {
            $data = $this->normalizeFields($data, array('purchase-info'));

            // Transform all indexes to use _ instead of -
            // @TODO: Find something a little more elegant
            foreach($data['purchase-info'] as $k => $v)
            {
                $data['purchase-info'][str_replace('-', '_', $k)] = $v;

                unset($data['purchase-info'][$k]);
            }

            $event->setData($data);
        }
    }
}