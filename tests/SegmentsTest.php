<?php
namespace QubitSegments\Tests;

use QubitSegments\Segments;

class SegmentsTest extends \PHPUnit_Framework_TestCase
{
  public function testCanHandleNullVisitorId()
  {
    $memberships = $this->getSegmentMemberships(null);
    $this->assertEquals(false, $memberships->isMemberOf("SG-3918-f06a1268"));
  }

  public function testCanSayWhenYouAreInASegment()
  {
    $memberships = $this->getSegmentMemberships();
    $this->assertEquals(true, $memberships->isMemberOf("SG-3918-f06a1268"));
  }

  public function testCanSayWhenYouAreNotInASegment()
  {
    $memberships = $this->getSegmentMemberships();
    $this->assertEquals(false, $memberships->isMemberOf("SG-3918-djewjj"));
  }

  public function testCanSayAsyncWhenYouAreInASegment()
  {
    $promise = $this->getSegmentMembershipsAsync()->then(function ($memberships) {
      $this->assertEquals(true, $memberships->isMemberOf("SG-3918-f06a1268"));
    });

    $promise->wait();
  }

  public function testCanSayAsyncWhenYouAreNotInASegment()
  {
    $promise = $this->getSegmentMembershipsAsync()->then(function ($memberships) {
      $this->assertEquals(false, $memberships->isMemberOf("SG-3918-djewjj"));
    });

    $promise->wait();
  }

  function getSegmentMemberships ($visitorId = "1470246529846.599399", $propertyId = 3918) {
    $segments = new Segments($propertyId);
    return $segments->getSegmentMembershipsForVisitor($visitorId);
  }

  function getSegmentMembershipsAsync ($visitorId = "1470246529846.599399", $propertyId = 3918) {
    $segments = new Segments($propertyId);
    return $segments->getSegmentMembershipsForVisitorAsync($visitorId);
  }
}
