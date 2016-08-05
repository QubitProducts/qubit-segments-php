<?php
namespace QubitSegments;

function getVisitorIdFromCookie($cookie) {
  preg_match("/([^:]+)/", $cookie, $matches);

  return $matches[1];
}
