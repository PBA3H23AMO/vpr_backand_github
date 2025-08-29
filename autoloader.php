<?php

// Autoloader for ppb namespace
spl_autoload_register(function ($className) {
    if (substr($className, 0, 4) !== 'ppb\\') { return; }

    $fileName = __DIR__.'/'.str_replace('\\', DIRECTORY_SEPARATOR, substr($className, 4)).'.php';

    if (file_exists($fileName)) { include $fileName; }
});

// Additional autoloader for App namespace
spl_autoload_register(function ($className) {
    if (substr($className, 0, 4) !== 'App\\') { return; }

    $fileName = __DIR__.'/app/'.str_replace('\\', DIRECTORY_SEPARATOR, substr($className, 4)).'.php';

    if (file_exists($fileName)) { include $fileName; }
});