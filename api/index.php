<?php

// Prepare writable directories in /tmp for Vercel's serverless environment
$storageDir = '/tmp/storage';
$dirs = [
    $storageDir.'/app/public',
    $storageDir.'/framework/cache/data',
    $storageDir.'/framework/sessions',
    $storageDir.'/framework/views',
    $storageDir.'/logs',
    '/tmp/bootstrap/cache',
];

foreach ($dirs as $dir) {
    if (! is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Set environment variables for Vercel serverless execution
putenv('APP_STORAGE='.$storageDir);
putenv('VIEW_COMPILED_PATH='.$storageDir.'/framework/views');
putenv('APP_CONFIG_CACHE=/tmp/bootstrap/cache/config.php');
putenv('APP_EVENTS_CACHE=/tmp/bootstrap/cache/events.php');
putenv('APP_PACKAGES_CACHE=/tmp/bootstrap/cache/packages.php');
putenv('APP_ROUTES_CACHE=/tmp/bootstrap/cache/routes.php');
putenv('APP_SERVICES_CACHE=/tmp/bootstrap/cache/services.php');

// Forward request to public/index.php
require __DIR__.'/../public/index.php';
