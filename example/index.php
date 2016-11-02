<!DOCTYPE html>
<html>
<head>
  <title>Qubit Segments demo</title>
</head>
<body>

<script type="text/javascript">
  // This would be set by smartserve.js. Lets fake it for now
  document.cookie = "qb_permanent=1470246529846.599399:213:1:66:137:147:Jz6=PjdJ:1:2:0:BVhtDG:BXmd/d";
</script>

<?php
  require __DIR__ . '/../vendor/autoload.php';

  $segmentId = "SG-4286-f06a1268";
  $client = new QubitSegments\Segments("retail_demo_union_fashion");
  $visitorId = QubitSegments\getVisitorIdFromCookie($_COOKIE["qb_permanent"]);

  $memberships = $client->getSegmentMembershipsForVisitor($visitorId);

  if ($memberships->isMemberOf($segmentId)) {
    echo "Visitor $visitorId is in segment $segmentId";
  } else {
    echo "Visitor $visitorId is NOT in segment $segmentId. Why not try refreshing?";
  }
?>

</body>
</html>
