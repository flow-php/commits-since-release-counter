<?php

require_once __DIR__.'/../vendor/autoload.php';

use SVG\SVG;

$filename = $argv[1];
$count = (int) $argv[2];

$data = file_get_contents(__DIR__.'/template.svg');
$data = str_replace('COMMIT_NUMBER', ' '.$count, $data);
$image = SVG::fromString($data);
$shadow = $image->getDocument()->getChild(1)->getChild(1)->getChild(1)->getChild(0);
$commitNumber = $image->getDocument()->getChild(1)->getChild(1)->getChild(2)->getChild(0);

/*
 * Center the text
 */
if ($count < 10) {
    $shadow->setAttribute('x', 10);
    $commitNumber->setAttribute('x', 10);
} elseif ($count < 100) {
    $shadow->setAttribute('x', 7);
    $commitNumber->setAttribute('x', 7);
}

/*
 * Change colors
 */
$gradient = $image->getDocument()->getChild(0)->getChild(1);
if ($count >= 20) {
    // red
    $gradient->getChild(0)->setStyle('stop-color', '#D23232');
    $gradient->getChild(1)->setStyle('stop-color', '#892121');
} elseif ($count >= 6) {
    // yellow
    $gradient->getChild(0)->setStyle('stop-color', '#C5D034');
    $gradient->getChild(1)->setStyle('stop-color', '#A8B12F');
}

file_put_contents(dirname(__DIR__).'/docs/'.$filename.'.svg', $image->toXMLString());
