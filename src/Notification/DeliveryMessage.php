<?php

namespace markdunphy\SesSnsTypes\Notification;

class DeliveryMessage extends MessageTypeAbstract {

  /**
   * @return string
   */
  public function getDeliveryTimestamp() {

    return $this->payload['delivery']['timestamp'];

  }

  /**
   * @return integer
   */
  public function getProcessingTimeInMilliseconds() {

    return $this->payload['delivery']['processingTimeInMillis'];

  }

  /**
   * @return array
   */
  public function getRecipients() {

    return $this->payload['delivery']['recipients'];

  }

  /**
   * @return string
   */
  public function getSmtpResponse() {

    return $this->payload['delivery']['smtpResponse'];

  }

  /**
   * @return string
   */
  public function getReportingMTA() {

    return $this->payload['delivery']['reportingMTA'];

  } // getReportingMTA

}