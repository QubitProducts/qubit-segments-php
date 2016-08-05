<?php
namespace QubitSegments;

function getVisitorIdFromCookie($cookie) {
  preg_match("/([^:]+)/", $cookie, $matches);

  if (sizeof($matches) === 2) {
    return $matches[1];
  }

  return null;
}
