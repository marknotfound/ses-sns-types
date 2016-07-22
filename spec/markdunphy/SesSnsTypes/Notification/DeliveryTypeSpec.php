<?php

namespace spec\markdunphy\SesSnsTypes\Notification;

use markdunphy\SesSnsTypes\Notification\DeliveryType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DeliveryTypeSpec extends ObjectBehavior {

  const PAYLOAD = [
    'notificationType' => 'Delivery',
    'delivery'         => [
      'timestamp'              => '2016-01-27T14:59:38.237Z',
      'processingTimeInMillis' => 546,
      'recipients'             => [ 'jane@example.com' ],
      'smtpResponse'           => '250 ok:  Message 64111812 accepted',
      'reportingMTA'           => 'a8-70.smtp-out.amazonses.com',
    ],
  ];

  public function it_is_initializable() {

    $this->beConstructedWith(static::PAYLOAD);
    $this->shouldHaveType(DeliveryType::class);

  }

  public function it_returns_delivery_timestamp_with_getter() {

    $this->beConstructedWith(static::PAYLOAD);
    $this->getDeliveryTimestamp()->shouldReturn(static::PAYLOAD['delivery']['timestamp']);

  }

  public function it_returns_processing_time_in_milliseconds_with_getter() {

    $this->beConstructedWith(static::PAYLOAD);
    $this->getProcessingTimeInMilliseconds()->shouldReturn(static::PAYLOAD['delivery']['processingTimeInMillis']);

  }

  public function it_returns_recipients_with_getter() {

    $this->beConstructedWith(static::PAYLOAD);
    $this->getRecipients()->shouldReturn(static::PAYLOAD['delivery']['recipients']);

  }

  public function it_returns_smtp_response_with_getter() {

    $this->beConstructedWith(static::PAYLOAD);
    $this->getSmtpResponse()->shouldReturn(static::PAYLOAD['delivery']['smtpResponse']);

  }

  public function it_returns_reporting_mta_with_getter() {

    $this->beConstructedWith(static::PAYLOAD);
    $this->getReportingMTA()->shouldReturn(static::PAYLOAD['delivery']['reportingMTA']);

  }

}
