<?php

namespace markdunphy\SesSnsTypes\Notification;

use markdunphy\SesSnsTypes\Entity\BouncedRecipient;

class BounceMessage extends MessageTypeAbstract {

  const TYPE_UNDETERMINED = 'Undetermined';
  const TYPE_PERMANENT = 'Permanent';
  const TYPE_TRANSIENT = 'Transient';

  /**
   * @link http://docs.aws.amazon.com/ses/latest/DeveloperGuide/notification-contents.html#bounce-types
   * @return string
   */
  public function getBounceMessage() {

    return $this->payload['bounce']['bounceType'];

  }

  /**
   * @link http://docs.aws.amazon.com/ses/latest/DeveloperGuide/notification-contents.html#bounce-types
   * @return string
   */
  public function getBounceSubType() {

    return $this->payload['bounce']['bounceSubType'];

  }

  /**
   * @link http://docs.aws.amazon.com/ses/latest/DeveloperGuide/notification-contents.html#bounced-recipients
   * @return BouncedRecipient[]
   */
  public function getBouncedRecipients() {

    $map = (function ($recipient) {
      return new BouncedRecipient($recipient);
    });

    return array_map($map, $this->payload['bounce']['bouncedRecipients']);

  }

  /**
   * @return string
   */
  public function getBouncedTimestamp() {

    return $this->payload['bounce']['timestamp'];

  }

  /**
   * @return string
   */
  public function getFeedBackId() {

    return $this->payload['bounce']['feedbackId'];

  }

  /**
   * @return string|null null if the field does not exist
   */
  public function getReportingMTA() {

    return $this->getValueOrNull('reportingMTA');

  }

  /**
   * @return boolean
   */
  public function isHardBounce() {

    return ($this->getBounceMessage() === static::TYPE_PERMANENT);

  }

  /**
   * @return boolean
   */
  public function isSoftBounce() {

    return ($this->getBounceMessage() === static::TYPE_TRANSIENT);

  }

  /**
   * @return boolean
   */
  public function isUndeterminedBounce() {

    return ($this->getBounceMessage() === static::TYPE_UNDETERMINED);

  }

}
