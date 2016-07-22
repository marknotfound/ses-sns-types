<?php

namespace spec\markdunphy\SesSnsTypes\Notification;

use markdunphy\SesSnsTypes\Notification\PayloadValidator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PayloadValidatorSpec extends ObjectBehavior {

  public function it_is_initializable() {

    $this->shouldHaveType(PayloadValidator::class);

  }

  public function it_returns_false_when_missing_top_level_notification_type_key() {

    $payload = ['mail' => []];

    $this::isValid($payload)->shouldReturn(false);

  }

  public function it_returns_false_when_missing_top_level_mail_key() {

    $payload = ['notificationType' => []];

    $this::isValid($payload)->shouldReturn(false);

  }

  public function it_returns_false_when_missing_mail_object() {

    $payload = [
      'notificationType' => 'bounce',
      'mail' => [],
    ];

    $this::isValid($payload)->shouldReturn(false);

  }

  public function it_returns_false_when_mail_object_is_missing_timestamp_key() {

    $payload = [
      'notificationType' => 'bounce',
      'mail' => [
        'messageId' => '',
        'source' => '',
        'sourceArn' => '',
        'sendingAccountId' => '',
        'destination' => '',
      ],
    ];

    $this::isValid($payload)->shouldReturn(false);

  }

  public function it_returns_false_when_notification_type_object_does_not_match_notification_type_key() {

    $payload = [
      'notificationType' => 'bounce',
      'mail' => [
        'messageId' => '',
        'source' => '',
        'sourceArn' => '',
        'sendingAccountId' => '',
        'destination' => '',
      ],
      'complaint' => [],
    ];

    $this::isValid($payload)->shouldReturn(false);

  }

  public function it_returns_false_when_mail_object_is_missing_message_id_key() {

    $payload = [
      'notificationType' => 'bounce',
      'mail' => [
        'timestamp' => '',
        'source' => '',
        'sourceArn' => '',
        'sendingAccountId' => '',
        'destination' => '',
      ],
    ];

    $this::isValid($payload)->shouldReturn(false);

  }

  public function it_returns_false_when_mail_object_is_missing_source_key() {

    $payload = [
      'notificationType' => 'bounce',
      'mail' => [
        'timestamp' => '',
        'messageId' => '',
        'sourceArn' => '',
        'sendingAccountId' => '',
        'destination' => '',
      ],
    ];

    $this::isValid($payload)->shouldReturn(false);

  }

  public function it_returns_false_when_mail_object_is_missing_source_arn_key() {

    $payload = [
      'notificationType' => 'bounce',
      'mail' => [
        'timestamp' => '',
        'messageId' => '',
        'source' => '',
        'sendingAccountId' => '',
        'destination' => '',
      ],
    ];

    $this::isValid($payload)->shouldReturn(false);

  }

  public function it_returns_false_when_mail_object_is_missing_sending_account_id_key() {

    $payload = [
      'notificationType' => 'bounce',
      'mail' => [
        'timestamp' => '',
        'messageId' => '',
        'source' => '',
        'sourceArn' => '',
        'destination' => '',
      ],
    ];

    $this::isValid($payload)->shouldReturn(false);

  }

  public function it_returns_false_when_mail_object_is_missing_destination_key() {

    $payload = [
      'notificationType' => 'bounce',
      'mail' => [
        'timestamp' => '',
        'messageId' => '',
        'source' => '',
        'sourceArn' => '',
        'sendingAccountId' => '',
      ],
    ];

    $this::isValid($payload)->shouldReturn(false);

  }

  public function it_returns_false_when_bounce_object_is_missing_bounce_type_key() {

    $payload = [
      'notificationType' => 'bounce',
      'mail' => [
        'timestamp' => '',
        'messageId' => '',
        'source' => '',
        'sourceArn' => '',
        'sendingAccountId' => '',
        'destination' => '',
      ],
      'bounce' => [
        'bounceSubType' => '',
        'bouncedRecipients' => '',
        'timestamp' => '',
        'feedbackId' => '',
      ]
    ];

    $this::isValid($payload)->shouldReturn(false);

  }

  public function it_returns_false_when_bounce_object_is_missing_bounce_sub_type_key() {

    $payload = [
      'notificationType' => 'bounce',
      'mail' => [
        'timestamp' => '',
        'messageId' => '',
        'source' => '',
        'sourceArn' => '',
        'sendingAccountId' => '',
        'destination' => '',
      ],
      'bounce' => [
        'bounceType' => '',
        'bouncedRecipients' => '',
        'timestamp' => '',
        'feedbackId' => '',
      ]
    ];

    $this::isValid($payload)->shouldReturn(false);

  }

  public function it_returns_false_when_bounce_object_is_missing_bounced_recipients_key() {

    $payload = [
      'notificationType' => 'bounce',
      'mail' => [
        'timestamp' => '',
        'messageId' => '',
        'source' => '',
        'sourceArn' => '',
        'sendingAccountId' => '',
        'destination' => '',
      ],
      'bounce' => [
        'bounceType' => '',
        'bounceSubType' => '',
        'timestamp' => '',
        'feedbackId' => '',
      ]
    ];

    $this::isValid($payload)->shouldReturn(false);

  }

  public function it_returns_false_when_bounce_object_is_missing_timestamp_key() {

    $payload = [
      'notificationType' => 'bounce',
      'mail' => [
        'timestamp' => '',
        'messageId' => '',
        'source' => '',
        'sourceArn' => '',
        'sendingAccountId' => '',
        'destination' => '',
      ],
      'bounce' => [
        'bounceType' => '',
        'bounceSubType' => '',
        'bouncedRecipients' => '',
        'feedbackId' => '',
      ]
    ];

    $this::isValid($payload)->shouldReturn(false);

  }

  public function it_returns_false_when_bounce_object_is_missing_feedback_id_key() {

    $payload = [
      'notificationType' => 'bounce',
      'mail' => [
        'timestamp' => '',
        'messageId' => '',
        'source' => '',
        'sourceArn' => '',
        'sendingAccountId' => '',
        'destination' => '',
      ],
      'bounce' => [
        'bounceType' => '',
        'bounceSubType' => '',
        'bouncedRecipients' => '',
        'timestamp' => '',
      ]
    ];

    $this::isValid($payload)->shouldReturn(false);

  }

  public function it_returns_true_when_bounce_object_is_well_formed() {

    $payload = [
      'notificationType' => 'bounce',
      'mail' => [
        'timestamp' => '',
        'messageId' => '',
        'source' => '',
        'sourceArn' => '',
        'sendingAccountId' => '',
        'destination' => '',
      ],
      'bounce' => [
        'bounceType' => '',
        'bounceSubType' => '',
        'bouncedRecipients' => '',
        'timestamp' => '',
        'feedbackId' => '',
      ]
    ];

    $this::isValid($payload)->shouldReturn(true);

  }

  public function it_returns_false_when_complaint_object_is_missing_complained_recipients_key() {

    $payload = [
      'notificationType' => 'complaint',
      'mail' => [
        'timestamp' => '',
        'messageId' => '',
        'source' => '',
        'sourceArn' => '',
        'sendingAccountId' => '',
        'destination' => '',
      ],
      'complaint' => [
        'feedbackId' => '',
        'timestamp' => '',
      ]
    ];

    $this::isValid($payload)->shouldReturn(false);

  }

  public function it_returns_false_when_complaint_object_is_missing_feedback_id_key() {

    $payload = [
      'notificationType' => 'complaint',
      'mail' => [
        'timestamp' => '',
        'messageId' => '',
        'source' => '',
        'sourceArn' => '',
        'sendingAccountId' => '',
        'destination' => '',
      ],
      'complaint' => [
        'complainedRecipients' => '',
        'timestamp' => '',
      ]
    ];

    $this::isValid($payload)->shouldReturn(false);

  }

  public function it_returns_false_when_complaint_object_is_missing_timestamp_key() {

    $payload = [
      'notificationType' => 'complaint',
      'mail' => [
        'timestamp' => '',
        'messageId' => '',
        'source' => '',
        'sourceArn' => '',
        'sendingAccountId' => '',
        'destination' => '',
      ],
      'complaint' => [
        'complainedRecipients' => '',
        'feedbackId' => '',
      ]
    ];

    $this::isValid($payload)->shouldReturn(false);

  }

  public function it_returns_true_when_complaint_object_is_well_formed() {

    $payload = [
      'notificationType' => 'complaint',
      'mail' => [
        'timestamp' => '',
        'messageId' => '',
        'source' => '',
        'sourceArn' => '',
        'sendingAccountId' => '',
        'destination' => '',
      ],
      'complaint' => [
        'complainedRecipients' => '',
        'feedbackId' => '',
        'timestamp' => '',
      ]
    ];

    $this::isValid($payload)->shouldReturn(true);

  }

  public function it_returns_false_when_delivery_object_is_missing_timestamp_key() {

    $payload = [
      'notificationType' => 'delivery',
      'mail' => [
        'timestamp' => '',
        'messageId' => '',
        'source' => '',
        'sourceArn' => '',
        'sendingAccountId' => '',
        'destination' => '',
      ],
      'delivery' => [
        'processingTimeMillis' => '',
        'recipients' => '',
        'smtpResponse' => '',
        'reportingMTA' => '',
      ]
    ];

    $this::isValid($payload)->shouldReturn(false);

  }

  public function it_returns_false_when_delivery_object_is_missing_processing_time_millis_key() {

    $payload = [
      'notificationType' => 'delivery',
      'mail' => [
        'timestamp' => '',
        'messageId' => '',
        'source' => '',
        'sourceArn' => '',
        'sendingAccountId' => '',
        'destination' => '',
      ],
      'delivery' => [
        'timestamp' => '',
        'recipients' => '',
        'smtpResponse' => '',
        'reportingMTA' => '',
      ]
    ];

    $this::isValid($payload)->shouldReturn(false);

  }

  public function it_returns_false_when_delivery_object_is_missing_recipients_key() {

    $payload = [
      'notificationType' => 'delivery',
      'mail' => [
        'timestamp' => '',
        'messageId' => '',
        'source' => '',
        'sourceArn' => '',
        'sendingAccountId' => '',
        'destination' => '',
      ],
      'delivery' => [
        'timestamp' => '',
        'processingTimeMillis' => '',
        'smtpResponse' => '',
        'reportingMTA' => '',
      ]
    ];

    $this::isValid($payload)->shouldReturn(false);

  }

  public function it_returns_false_when_delivery_object_is_missing_smtp_response_key() {

    $payload = [
      'notificationType' => 'delivery',
      'mail' => [
        'timestamp' => '',
        'messageId' => '',
        'source' => '',
        'sourceArn' => '',
        'sendingAccountId' => '',
        'destination' => '',
      ],
      'delivery' => [
        'timestamp' => '',
        'processingTimeMillis' => '',
        'recipients' => '',
        'reportingMTA' => '',
      ]
    ];

    $this::isValid($payload)->shouldReturn(false);

  }

  public function it_returns_false_when_delivery_object_is_missing_reporting_mta_key() {

    $payload = [
      'notificationType' => 'delivery',
      'mail' => [
        'timestamp' => '',
        'messageId' => '',
        'source' => '',
        'sourceArn' => '',
        'sendingAccountId' => '',
        'destination' => '',
      ],
      'delivery' => [
        'timestamp' => '',
        'processingTimeMillis' => '',
        'recipients' => '',
        'smtpResponse' => '',
      ]
    ];

    $this::isValid($payload)->shouldReturn(false);

  }

  public function it_returns_true_when_delivery_object_is_well_formed() {

    $payload = [
      'notificationType' => 'delivery',
      'mail' => [
        'timestamp' => '',
        'messageId' => '',
        'source' => '',
        'sourceArn' => '',
        'sendingAccountId' => '',
        'destination' => '',
      ],
      'delivery' => [
        'reportingMTA' => '',
        'timestamp' => '',
        'processingTimeMillis' => '',
        'recipients' => '',
        'smtpResponse' => '',
      ]
    ];

    $this::isValid($payload)->shouldReturn(true);

  }

}
