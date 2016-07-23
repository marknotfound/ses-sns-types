<?php

namespace markdunphy\SesSnsTypes\Notification;

use markdunphy\SesSnsTypes\Exception;

class MessageTypeFactory {

  const TYPE_CLASSES_BY_STRING = [
    'bounce' => BounceMessage::class,
    'complaint' => ComplaintMessage::class,
    'delivery' => DeliveryMessage::class,
  ];

  /**
   * @var PayloadValidator
   */
  private $validator;

  /**
   * @param string|array $payload json string or array of SNS payload data
   *
   * @return MessageTypeInterface
   */
  public function create($payload) {

    if (is_string($payload)) {
      $payload = json_decode($payload, true);
    }

    if (!is_array($payload)) {
      throw new Exception\InvalidTypeException('Argument 1 for NotificationMessageTypeFactory::create must be valid JSON string or array');
    }

    if (!PayloadValidator::isValid($payload)) {
      throw new Exception\MalformedPayloadException('Supplied SNS payload is malformed');
    }

    $class = static::TYPE_CLASSES_BY_STRING[strtolower($payload['notificationType'])];

    return new $class($payload);

  }

}
