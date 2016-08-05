<?php
namespace QubitSegments\Tests;

use QubitSegments\Segments;

const PROPERTY_ID = 4286;
const SEGMENT_ID = "SG-4286-f06a1268";
const VISITOR_ID = "1470246529846.599399";

class SegmentsTest extends \PHPUnit_Framework_TestCase
{
  public function testCanHandleNullVisitorId()
  {
    $memberships = $this->getSegmentMemberships(null);
    $this->assertEquals(false, $memberships->isMemberOf(SEGMENT_ID));
  }

  public function testCanSayWhenYouAreInASegment()
  {
    $memberships = $this->getSegmentMemberships();
    $this->assertEquals(true, $memberships->isMemberOf(SEGMENT_ID));
  }

  public function testCanSayWhenYouAreNotInASegment()
  {
    $memberships = $this->getSegmentMemberships();
    $this->assertEquals(false, $memberships->isMemberOf("SG-4286-djewjj"));
  }

  public function testCanSayAsyncWhenYouAreInASegment()
  {
    $promise = $this->getSegmentMembershipsAsync()->then(function ($memberships) {
      $this->assertEquals(true, $memberships->isMemberOf(SEGMENT_ID));
    });

    $promise->wait();
  }

  public function testCanSayAsyncWhenYouAreNotInASegment()
  {
    $promise = $this->getSegmentMembershipsAsync()->then(function ($memberships) {
      $this->assertEquals(false, $memberships->isMemberOf("SG-4286-djewjj"));
    });

    $promise->wait();
  }

  function getSegmentMemberships ($visitorId = VISITOR_ID) {
    $segments = new Segments(PROPERTY_ID);
    return $segments->getSegmentMembershipsForVisitor($visitorId);
  }

  function getSegmentMembershipsAsync ($visitorId = VISITOR_ID) {
    $segments = new Segments(PROPERTY_ID);
    return $segments->getSegmentMembershipsForVisitorAsync($visitorId);
  }
}
