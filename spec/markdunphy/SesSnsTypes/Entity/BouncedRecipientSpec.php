<?php

namespace spec\markdunphy\SesSnsTypes\Entity;

use markdunphy\SesSnsTypes\Entity\BouncedRecipient;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BouncedRecipientSpec extends ObjectBehavior {

  const RECIPIENT = [
    'emailAddress'   => 'jane@example.com',
    'status'         => '5.1.1',
    'action'         => 'failed',
    'diagnosticCode' => 'smtp; 550 5.1.1 <jane@example.com>... User'
  ];

  public function let() {

    $this->beConstructedWith(static::RECIPIENT);

  }

  public function it_is_initializable() {

    $this->shouldHaveType(BouncedRecipient::class);

  }

  public function it_returns_email_address_with_getter() {

    $this->getEmailAddress()->shouldReturn(static::RECIPIENT['emailAddress']);

  }

  public function it_returns_status_with_getter() {

    $this->getStatus()->shouldReturn(static::RECIPIENT['status']);

  }

  public function it_returns_action_with_getter() {

    $this->getAction()->shouldReturn(static::RECIPIENT['action']);

  }

  public function it_returns_diagnostic_code_with_getter() {

    $this->getDiagnosticCode()->shouldReturn(static::RECIPIENT['diagnosticCode']);

  }

}
