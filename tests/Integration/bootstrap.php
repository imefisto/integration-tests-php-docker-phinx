<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$phinx = require __DIR__ . '/../../phinx.php';

$app = new Phinx\Console\PhinxApplication();
$wrap = new Phinx\Wrapper\TextWrapper($app);

$wrap->getMigrate('test');
