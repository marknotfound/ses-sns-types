<?php

namespace markdunphy\SesSnsTypes\Entity;

class BouncedRecipient {

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

  /**
   * @return string
   */
  public function getStatus() {

    return $this->data['status'];

  }

  /**
   * @return string
   */
  public function getAction() {

    return $this->data['action'];

  }

  /**
   * @return string
   */
  public function getDiagnosticCode() {

    return $this->data['diagnosticCode'];

  }

} // BouncedRecipient