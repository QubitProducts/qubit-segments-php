<?php
namespace QubitSegments;

class SegmentMemberships {
  private $segments;

  function __construct ($segments) {
    $this->segments = $segments;
  }

  public function isMemberOf ($segmentId) {
    return in_array($segmentId, $this->segments);
  }
}
