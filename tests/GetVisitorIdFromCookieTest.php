<?php
namespace QubitSegments\Test;

use QubitSegments;

class getVisitorIdFromCookieTest extends \PHPUnit_Framework_TestCase
{
    public function testCanGetVisitorIdIfPresent()
    {
        $cookie = "8kht1s75idw-0ib6llgrv-0pjgw44:211:1:65:135:147:Jz6=PjdJ:1:2:0:BVhtDG:BXmd/d:BVvl5i:BVvl5i:::213.78.70.52:chichester:7813:united%20kingdom:GB:50.8308:-0.781328:itv%20meridian:826045:west%20sussex:25553:segments~:BKGm=M8=B=mkw&BR9B=Iz=C=jWZ:CTT&CUb&C9P&DgH&HCa&Hxl&H+v&IPc&JhC&KOt&KP/&KQA&Kct&KhM&KhN&Kh6&LTH&Mag&Mgj&Mgw&Mhl&NmS&OGv&OK8&OTl&Ovf&QFr:VZafrGd";

        $expectedVisitorId = "8kht1s75idw-0ib6llgrv-0pjgw44";
        $actualVisitorId = QubitSegments\getVisitorIdFromCookie($cookie);

        $this->assertEquals($expectedVisitorId, $actualVisitorId);
    }

    public function testReturnsNullIfVisitorIdNotPresent()
    {
        $cookie = "";

        $expectedVisitorId = null;
        $actualVisitorId = QubitSegments\getVisitorIdFromCookie($cookie);

        $this->assertEquals($expectedVisitorId, $actualVisitorId);
    }
}
