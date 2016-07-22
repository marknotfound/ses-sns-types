<?php

namespace markdunphy\SesSnsTypes\Notification;

class BounceType extends TypeAbstract {

  /**
   * @link http://docs.aws.amazon.com/ses/latest/DeveloperGuide/notification-contents.html#bounce-types
   * @return string
   */
  public function getBounceType() {

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
   * @return array
   */
  public function getBouncedRecipients() {

    return $this->payload['bounce']['bouncedRecipients'];

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