<?php

namespace markdunphy\SesSnsTypes\Notification;

/**
 * @link http://docs.aws.amazon.com/ses/latest/DeveloperGuide/notification-contents.html#top-level-json-object
 */
class PayloadValidator {

  const REQUIRED_TOP_LEVEL_FIELDS = [
    'notificationType',
    'mail',
  ];

  const REQUIRED_MAIL_FIELDS = [
    'timestamp',
    'messageId',
    'source',
    'sourceArn',
    'sendingAccountId',
    'destination',
  ];

  const REQUIRED_BOUNCE_FIELDS = [
    'bounceType',
    'bounceSubType',
    'bouncedRecipients',
    'timestamp',
    'feedbackId',
  ];

  const REQUIRED_COMPLAINT_FIELDS = [
    'complainedRecipients',
    'timestamp',
    'feedbackId',
  ];

  const REQUIRED_DELIVERY_FIELDS = [
    'timestamp',
    'processingTimeMillis',
    'recipients',
    'smtpResponse',
    'reportingMTA',
  ];

  const NOTIFICATION_TYPE_VALIDATORS = [
    'bounce'    => self::REQUIRED_BOUNCE_FIELDS,
    'complaint' => self::REQUIRED_COMPLAINT_FIELDS,
    'delivery'  => self::REQUIRED_DELIVERY_FIELDS,
  ];


  /**
   * @return boolean
   */
  public static function isValid(array $payload) {

    foreach (static::REQUIRED_TOP_LEVEL_FIELDS as $field) {
      if (!isset($payload[$field])) {
        return false;
      }
    }

    $type = strtolower($payload['notificationType']);

    if (!isset($payload[$type])) {
      return false;
    }

    if (!static::isObjectValid($payload['mail'], static::REQUIRED_MAIL_FIELDS)) {
      return false;
    }

    if (!static::isObjectValid($payload[$type], static::NOTIFICATION_TYPE_VALIDATORS[$type])) {
      return false;
    }

    return true;

  }

  /**
   * @return boolean
   */
  private static function isObjectValid(array $object, $expectedFields) {

    foreach ($expectedFields as $field) {
      if (!isset($object[$field])) {
        return false;
      }
    }

    return true;

  }

}
