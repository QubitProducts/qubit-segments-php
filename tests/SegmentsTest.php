<?php
namespace QubitSegments\Tests;

use QubitSegments\Segments;

const TRACKING_ID = "retail_demo_union_fashion";
const SEGMENT_ID = "SG-4286-c1d5b9df";
const VISITOR_ID = "1s3ot7wfdy3-0itk4mqxq-otl42dc";

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
    $segments = new Segments(TRACKING_ID);
    return $segments->getSegmentMembershipsForVisitor($visitorId);
  }

  function getSegmentMembershipsAsync ($visitorId = VISITOR_ID) {
    $segments = new Segments(TRACKING_ID);
    return $segments->getSegmentMembershipsForVisitorAsync($visitorId);
  }
}
