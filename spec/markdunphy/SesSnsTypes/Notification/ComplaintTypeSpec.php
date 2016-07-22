<?php

namespace spec\markdunphy\SesSnsTypes\Notification;

use markdunphy\SesSnsTypes\Notification\ComplaintType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ComplaintTypeSpec extends ObjectBehavior {

  const PAYLOAD = [
    'notificationType' => 'Complaint',
    'complaint'        => [
      'arrivalDate'           => '2016-01-27T14:59:38.237Z',
      'userAgent'             => 'AnyCompany Feedback Loop (V0.01)',
      'timestamp'             => '2016-01-27T14:59:38.237Z',
      'feedbackId'            => '000001378603177f-18c07c78-fa81-4a58-9dd1-fedc3cb8f49a-000000',
      'complaintFeedbackType' => 'abuse',
      'complainedRecipients'  => [
        [
          'emailAddress'   => 'jane@example.com',
        ]
      ],
    ],
  ];

  const EMPTY_PAYLOAD = [
    'notificationType' => 'complaint',
    'complaint'        => [],
  ];

  public function it_is_initializable() {

    $this->beConstructedWith(static::PAYLOAD);
    $this->shouldHaveType(ComplaintType::class);

  }

  public function it_returns_complained_recipients_with_getter() {

    $this->beConstructedWith(static::PAYLOAD);
    $this->getComplainedRecipients()->shouldReturn(static::PAYLOAD['complaint']['complainedRecipients']);

  }

  public function it_returns_complaint_timestamp_with_getter() {

    $this->beConstructedWith(static::PAYLOAD);
    $this->getComplaintTimestamp()->shouldReturn(static::PAYLOAD['complaint']['timestamp']);

  }

  public function it_returns_feedback_id_with_getter() {

    $this->beConstructedWith(static::PAYLOAD);
    $this->getFeedBackId()->shouldReturn(static::PAYLOAD['complaint']['feedbackId']);

  }

  public function it_returns_user_agent_with_getter() {

    $this->beConstructedWith(static::PAYLOAD);
    $this->getUserAgent()->shouldReturn(static::PAYLOAD['complaint']['userAgent']);

  }

  public function it_returns_null_user_agent_when_field_not_set_with_getter() {

    $this->beConstructedWith(static::EMPTY_PAYLOAD);
    $this->getUserAgent()->shouldReturn(null);

  }

  public function it_returns_complaint_feedback_with_getter() {

    $this->beConstructedWith(static::PAYLOAD);
    $this->getComplaintFeedbackType()->shouldReturn(static::PAYLOAD['complaint']['complaintFeedbackType']);

  }

  public function it_returns_null_complaint_feedback_type_when_field_not_set_with_getter() {

    $this->beConstructedWith(static::EMPTY_PAYLOAD);
    $this->getComplaintFeedbackType()->shouldReturn(null);

  }

  public function it_returns_arrival_date_with_getter() {

    $this->beConstructedWith(static::PAYLOAD);
    $this->getArrivalDate()->shouldReturn(static::PAYLOAD['complaint']['arrivalDate']);

  }

  public function it_returns_null_arrival_date_type_when_field_not_set_with_getter() {

    $this->beConstructedWith(static::EMPTY_PAYLOAD);
    $this->getArrivalDate()->shouldReturn(null);

  }

}
