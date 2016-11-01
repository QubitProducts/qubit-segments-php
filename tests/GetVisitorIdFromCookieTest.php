<?php
namespace QubitSegments\Test;

use QubitSegments;

class getVisitorIdFromCookieTest extends \PHPUnit_Framework_TestCase
{
    public function testCanGetVisitorIdIfPresent()
    {
        $cookie = "1s3ot7wfdy3-0itk4mqxq-otl42dc:12:2:5:5:0::0:1:0:BX6Ssw:BYGJ8q:::::75.128.225.195:madison:59:united%20states:US:43.0792:-89.3772:madison:669:wisconsin:50:1NQ!&NU_F&SS_F&NY!&Nb!&Ng!&Ns!&Nv!&Nw_F&N0!&OH!&OJ_F&OP!&OQ!&OU!&OV_F&OX!&Oq!&Ow!&O0_F&O8_F&O9!&PA!&PJ_F&Pg!&Ph!&Pm!&Pn!&Po!&Pp!&Py!&Pz!&P1_F&P5!&QB!&ST_F&QM!&QS!&QV!&QW!&Qc!&Qd!&Qf_F&Qk!&Ql!&Q5!&RC!&RD!&RI_F&RN!&RO!&RS!&RT!&Rt!&Rx!&Ry!&NI@M&OI@M&Od@M&PD@M&Qm@M&QO@M&Pe@M&PQ@M:Jzy=CW=G=Ek8=I/&J4O=O=G=EnF=z&PWt=O9=G=HHv=KS&vdA=Es=B=UtM=Gf:Mhl&HCa&IPc&JlZ:VggLbxW:VggLbsj";

        $expectedVisitorId = "1s3ot7wfdy3-0itk4mqxq-otl42dc";
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
