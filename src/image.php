<?php

$filename = $argv[1];
$count = $argv[2];

// TODO create a proper SVG

file_put_contents(dirname(__DIR__).'/docs/'.$filename.'.svg', $count);
