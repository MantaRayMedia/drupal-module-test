<?php

namespace Drupal\fun\Service;


use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class CamelcaseTextService extends AbstractExtension {

  public function getFilters(): array {
    return [
      new TwigFilter('camelcase', [$this, 'camelcaseText']),
    ];
  }

  // The actual implementation of the filter.
  public function camelcaseText($context) {
    $context = $this->camelCase($context);
    return $context;
  }

  private function camelCase($string, $dontStrip = []){
    /*
     * This will take any dash or underscore turn it into a space, run ucwords against
     * it so it capitalizes the first letter in all words separated by a space then it
     * turns and deletes all spaces.
     */
    return lcfirst(str_replace(' ', '', ucwords(preg_replace('/[^a-z0-9'.implode('',$dontStrip).']+/', ' ',$string))));
  }
}