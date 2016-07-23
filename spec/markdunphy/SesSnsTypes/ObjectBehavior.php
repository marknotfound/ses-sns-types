<?php

namespace spec\markdunphy\SesSnsTypes;

class ObjectBehavior extends \PhpSpec\ObjectBehavior {

  public function getMatchers() {

    return [
      'returnArrayOf' => function ($items, $type) {
        foreach ($items as $item) {
          if (!$item instanceof $type) {
            return false;
          }
        }

        return true;
      }
    ];

  }

}