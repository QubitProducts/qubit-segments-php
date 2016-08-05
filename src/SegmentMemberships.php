<?php
namespace QubitSegments;

class SegmentMemberships {
  private $segments;

  function __construct ($segments) {
    $this->segments = $segments;
  }

  public function isMemberOf ($segmentId) {
    if (array_key_exists($segmentId, $this->segments)) {
      return $this->segments[$segmentId] == true;
    }

    return false;
  }
}
