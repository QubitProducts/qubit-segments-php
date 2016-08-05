<?php
namespace QubitSegments;

class SegmentMemberships {
  private $segments;

  function __construct ($segments) {
    $this->segments = $segments;
  }

  public function isMemberOf ($segmentId) {
    return $this->segments[$segmentId] == true;
  }
}
