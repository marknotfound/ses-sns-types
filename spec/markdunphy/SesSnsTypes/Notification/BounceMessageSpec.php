<?php

namespace spec\markdunphy\SesSnsTypes\Notification;

use markdunphy\SesSnsTypes\Entity;
use markdunphy\SesSnsTypes\Notification\BounceMessage;
use Prophecy\Argument;
use spec\markdunphy\SesSnsTypes\ObjectBehavior;

class BounceMessageSpec extends ObjectBehavior {

  const PAYLOAD = [
    'notificationType' => 'Bounce',
    'bounce'           => [
      'bounceType'        => 'example bounce type',
      'bounceSubType'     => 'example bounce subtype',
      'bouncedRecipients' => [
        [
          'emailAddress'   => 'jane@example.com',
          'status'         => '5.1.1',
          'action'         => 'failed',
          'diagnosticCode' => 'smtp; 550 5.1.1 <jane@example.com>... User'
        ]
      ],
      'timestamp'    => '2016-01-27T14:59:38.237Z',
      'feedbackId'   => '',
      'reportingMTA' => '00000138111222aa-33322211-cccc-cccc-cccc-ddddaaaa068a-000000'
    ],
  ];

  public function let() {

    $this->beConstructedWith(static::PAYLOAD);

  }

  public function it_is_initializable() {

    $this->shouldHaveType(BounceMessage::class);

  }

  public function it_returns_bounce_type_with_getter() {
    $this->getBounceMessage()->shouldReturn(static::PAYLOAD['bounce']['bounceType']);

  }

  public function it_returns_bounce_sub_type_with_getter() {
    $this->getBounceSubType()->shouldReturn(static::PAYLOAD['bounce']['bounceSubType']);

  }

  public function it_returns_recipients_with_getter() {

    $this->getBouncedRecipients()->shouldReturnArrayOf(Entity\BouncedRecipient::class);

  }

  public function it_returns_bounced_timestamp_with_getter() {

    $this->getBouncedTimestamp()->shouldReturn(static::PAYLOAD['bounce']['timestamp']);

  }

  public function it_returns_feedback_id_with_getter() {

    $this->getFeedbackId()->shouldReturn(static::PAYLOAD['bounce']['feedbackId']);

  }

  public function it_returns_reporting_mta_with_getter() {

    $this->getReportingMTA()->shouldReturn(static::PAYLOAD['bounce']['reportingMTA']);

  }

  public function it_returns_null_reporting_mta_when_field_not_set_with_getter() {

    $payload = [
      'notificationType' => 'bounce',
      'bounce' => []
    ];

    $this->beConstructedWith($payload);
    $this->getReportingMTA()->shouldReturn(null);

  }

}
