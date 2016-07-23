<?php

namespace spec\markdunphy\SesSnsTypes\Notification;

use markdunphy\SesSnsTypes\Exception;
use markdunphy\SesSnsTypes\Notification\BounceMessage;
use markdunphy\SesSnsTypes\Notification\ComplaintMessage;
use markdunphy\SesSnsTypes\Notification\DeliveryMessage;
use markdunphy\SesSnsTypes\Notification\MessageTypeFactory;
use markdunphy\SesSnsTypes\Notification\MessageTypeInterface;
use markdunphy\SesSnsTypes\Notification\PayloadValidator;
use Prophecy\Argument;
use spec\markdunphy\SesSnsTypes\ObjectBehavior;

class MessageTypeFactorySpec extends ObjectBehavior {

  const EXAMPLES_DIR = __DIR__.'/../../../../notification-examples';

  public function it_is_initializable() {

    $this->shouldHaveType(MessageTypeFactory::class);

  }

  public function it_throws_invalid_type_exception_when_payload_is_not_a_string_or_array() {

    $payload = (object) [];

    $this->shouldThrow(Exception\InvalidTypeException::class)->during('create', [$payload]);

  }

  public function it_throws_malformed_payload_exception_when_payload_fails_validation() {

    $payload = [];

    $this->shouldThrow(Exception\MalformedPayloadException::class)->during('create', [$payload]);

  }

  public function it_should_decode_json_string_when_passed_as_payload() {

    $payload = require(static::EXAMPLES_DIR.'/delivery.php');

    $this->create($payload)->shouldReturnAnInstanceOf(MessageTypeInterface::class);

  }

  public function it_should_accept_array_when_passed_as_payload() {

    $payload = json_decode( require(static::EXAMPLES_DIR.'/delivery.php'), true );

    $this->create($payload)->shouldReturnAnInstanceOf(MessageTypeInterface::class);

  }

  public function it_should_return_BounceMessage_when_given_bounce_notification_payload() {

    $payload = json_decode( require(static::EXAMPLES_DIR.'/bounce-with-dsn.php'), true );

    $this->create($payload)->shouldReturnAnInstanceOf(BounceMessage::class);

  }

  public function it_should_return_DeliveryMessage_when_given_delivery_notification_payload() {

    $payload = json_decode( require(static::EXAMPLES_DIR.'/delivery.php'), true );

    $this->create($payload)->shouldReturnAnInstanceOf(DeliveryMessage::class);

  }

  public function it_should_return_ComplaintMessage_when_given_complaint_notification_payload() {

    $payload = json_decode( require(static::EXAMPLES_DIR.'/complaint-with-feedback-report.php'), true );

    $this->create($payload)->shouldReturnAnInstanceOf(ComplaintMessage::class);

  }

}
