<?php

namespace markdunphy\SesSnsTypes\Notification;

abstract class MessageTypeAbstract implements MessageTypeInterface {

  const NOTIFICATION_DELIVERY = 'delivery';
  const NOTIFICATION_COMPLAINT = 'complaint';
  const NOTIFICATION_BOUNCE = 'bounce';

  /**
   * @var array
   */
  protected $payload;

  /**
   * @param array $payload
   */
  public function __construct( array $payload ) {

    $this->payload = $payload;

  }

  /**
   * @return boolean
   */
  public function isDeliveryNotification() {

    return ($this->getTypeString() === self::NOTIFICATION_DELIVERY);

  }

  /**
   * @return boolean
   */
  public function isComplaintNotification() {

    return ($this->getTypeString() === self::NOTIFICATION_COMPLAINT);

  }

  /**
   * @return boolean
   */
  public function isBounceNotification() {

    return ($this->getTypeString() === self::NOTIFICATION_BOUNCE);

  }

  /**
   * {@inheritdoc}
   */
  public function hasOriginalHeaders() {

    $originalHeaderFields = [
        'headersTruncated',
        'headers',
        'commonHeaders',
    ];

    foreach ($originalHeaderFields as $field) {
      if (!isset($this->payload['mail'][$field])) {
        return false;
      }
    }

    return true;

  } // hasOriginalHeaders

  /**
   * {@inheritdoc}
   */
  public function getTypeString() {

    return strtolower($this->payload['notificationType']);

  }

  /**
   * {@inheritdoc}
   */
  public function getOriginalSendTime() {

    return $this->payload['mail']['timestamp'];

  }

  /**
   * {@inheritdoc}
   */
  public function getMessageId() {

    return $this->payload['mail']['messageId'];

  }

  /**
   * {@inheritdoc}
   */
  public function getFullPayloadAsArray() {

    return $this->payload;

  }

  /**
   * @return mixed
   */
  protected function get($key) {

    return $this->payload[$this->getTypeString()][$key];

  }

  /**
   * @return mixed|null
   */
  protected function getValueOrNull($key) {

    $type = $this->getTypeString();

    if (!isset($this->payload[$type][$key])) {
      return;
    }

    return $this->payload[$type][$key];

  }

}
