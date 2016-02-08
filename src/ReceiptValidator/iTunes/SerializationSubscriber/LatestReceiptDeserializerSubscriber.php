<?php
namespace ReceiptValidator\iTunes\SerializationSubscriber;

use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

/**
 * Class LatestReceiptDeserializerSubscriber
 * @package ReceiptValidator\iTunes\SerializationSubscriber
 */
class LatestReceiptDeserializerSubscriber extends AppleJsonDeserializerSubscriberAbstract
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
            array( 'event' => 'serializer.pre_deserialize', 'method' => 'onPreDeserialize', 'class' => 'ReceiptValidator\iTunes\Response'),
        );
    }

    /**
     * @param PreDeserializeEvent $event
     */
    public function onPreDeserialize(PreDeserializeEvent $event)
    {
        $data = $event->getData();

        if(isset($data['latest_receipt']))
        {
            $data['raw'] = $data['latest_receipt'];
            $data = $this->normalizeFields($data, array('latest_receipt'));

            $event->setData($data);

        }
    }
}