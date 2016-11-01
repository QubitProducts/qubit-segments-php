Qubit Segments
==============

[![Build Status](https://travis-ci.org/QubitProducts/qubit-segments-php.svg?branch=master)](https://travis-ci.org/QubitProducts/qubit-segments-php)


## Usage

```php

use QubitSegments;

$trackingId = "retail_demo_union_fashion"; // This is the tracking id from your QProtocol events. Either ask your Qubit contact for details or look at the `meta.trackingId` value in your QP events.
$segmentId = "SG-4286-f06a1268"
$segments = new Segments($trackingId);
$visitorId = QubitSegments\getVisitorIdFromCookie($_COOKIE["qb_permanent"]);
$memberships = $segments->getSegmentMembershipsForVisitor($visitorId);

if ($memberships->isMemberOf($segmentId)) {
    print "Visitor $visitorId is in segment $segmentId";
}

// if you want to get segments asynchronously
$request = $segments->getSegmentMembershipsForVisitor($visitorId)
$request->then(function ($memberships) {
    if ($memberships->isMemberOf($segmentId)) {
        print "Visitor $visitorId is in segment $segmentId";
    }
})
```

Run `make example` to see a demo of it working.

## Installation

The recommended way to install Qubit Segments is through [Composer](http://getcomposer.org).

```bash
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install the latest stable version of Qubit Segments:

```bash
php composer.phar require qubit/segments
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

You can then later update using composer:

 ```bash
php composer.phar update
 ```
