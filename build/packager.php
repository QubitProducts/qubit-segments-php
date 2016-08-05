<?php
require __DIR__ . '/Burgomaster.php';

$stageDirectory = __DIR__ . '/artifacts/staging';
$projectRoot = __DIR__ . '/../';
$packager = new \Burgomaster($stageDirectory, $projectRoot);

// Copy basic files to the stage directory. Note that we have chdir'd onto
// the $projectRoot directory, so use relative paths.
foreach (['README.md', 'LICENSE'] as $file) {
    $packager->deepCopy($file, $file);
}

// Copy each dependency to the staging directory. Copy *.php and *.pem files.
$packager->recursiveCopy('src', 'QubitSegments', ['php']);

$packager->createAutoloader([
    'QubitSegments/functions.php',
]);

$packager->createPhar(__DIR__ . '/artifacts/qubit-segments.phar');
$packager->createZip(__DIR__ . '/artifacts/qubit-segments.zip');