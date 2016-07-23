<?php

namespace markdunphy\SesSnsTypes\Notification;

use markdunphy\SesSnsTypes\Entity;

class BounceMessage extends MessageTypeAbstract {

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
      return new Entity\BouncedRecipient($recipient);
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

  } // getReportingMTA

}