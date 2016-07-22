<?php

namespace spec\markdunphy\SesSnsTypes\Notification;

use markdunphy\SesSnsTypes\Exception;
use markdunphy\SesSnsTypes\Notification\TypeFactory;
use markdunphy\SesSnsTypes\Notification\TypeInterface;
use markdunphy\SesSnsTypes\Notification\PayloadValidator;
use markdunphy\SesSnsTypes\Notification\BounceType;
use markdunphy\SesSnsTypes\Notification\ComplaintType;
use markdunphy\SesSnsTypes\Notification\DeliveryType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TypeFactorySpec extends ObjectBehavior {

  const EXAMPLES_DIR = __DIR__.'/../../../../notification-examples';

  public function it_is_initializable() {

    $this->shouldHaveType(TypeFactory::class);

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

    $this->create($payload)->shouldReturnAnInstanceOf(TypeInterface::class);

  }

  public function it_should_accept_array_when_passed_as_payload() {

    $payload = json_decode( require(static::EXAMPLES_DIR.'/delivery.php'), true );

    $this->create($payload)->shouldReturnAnInstanceOf(TypeInterface::class);

  }

  public function it_should_return_BounceType_when_given_bounce_notification_payload() {

    $payload = json_decode( require(static::EXAMPLES_DIR.'/bounce-with-dsn.php'), true );

    $this->create($payload)->shouldReturnAnInstanceOf(BounceType::class);

  }

  public function it_should_return_DeliveryType_when_given_delivery_notification_payload() {

    $payload = json_decode( require(static::EXAMPLES_DIR.'/delivery.php'), true );

    $this->create($payload)->shouldReturnAnInstanceOf(DeliveryType::class);

  }

  public function it_should_return_ComplaintType_when_given_complaint_notification_payload() {

    $payload = json_decode( require(static::EXAMPLES_DIR.'/complaint-with-feedback-report.php'), true );

    $this->create($payload)->shouldReturnAnInstanceOf(ComplaintType::class);

  }

}
