<?php

namespace markdunphy\SesSnsTypes\Entity;

class ComplainedRecipient implements RecipientInterface {

  /**
   * @var array
   */
  private $data;

  /**
   * @param array $data
   */
  public function __construct(array $data) {

    $this->data = $data;

  }

  /**
   * @return string
   */
  public function getEmailAddress() {

    return $this->data['emailAddress'];

  }

}
