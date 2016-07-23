<?php

namespace markdunphy\SesSnsTypes\Notification;

use markdunphy\SesSnsTypes\Entity\ComplainedRecipient;

class ComplaintMessage extends MessageTypeAbstract {

  /**
   * @link http://docs.aws.amazon.com/ses/latest/DeveloperGuide/notification-contents.html#complained-recipients
   * @return ComplainedRecipient[]
   */
  public function getComplainedRecipients() {

    $map = (function ($recipient) {
      return new ComplainedRecipient($recipient);
    });

    return array_map($map, $this->payload['complaint']['complainedRecipients']);

  }

  /**
   * @return string
   */
  public function getComplaintTimestamp() {

    return $this->payload['complaint']['timestamp'];

  }

  /**
   * @return string
   */
  public function getFeedBackId() {

    return $this->payload['complaint']['feedbackId'];

  }

  /**
   * @return string|null null if the field does not exist
   */
  public function getUserAgent() {

    return $this->getValueOrNull('userAgent');

  }

  /**
   * @link http://www.iana.org/assignments/marf-parameters/marf-parameters.xml#marf-parameters-2
   * @return string|null null if the field does not exist
   */
  public function getComplaintFeedbackType() {

    return $this->getValueOrNull('complaintFeedbackType');

  }

  /**
   * @return string|null null if the field does not exist
   */
  public function getArrivalDate() {

    return $this->getValueOrNull('arrivalDate');

  }

}