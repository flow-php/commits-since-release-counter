<?php

require_once __DIR__.'/../vendor/autoload.php';

use SVG\SVG;
use SVG\Nodes\Texts\SVGText;

$filename = $argv[1];
$count = (int) $argv[2];

$image = new SVG(90, 20);
$suffix = $count === 1 ? 'commit' : 'commits';
$svgText = new SVGText($count. ' '.$suffix, 4, 15);

$image->getDocument()->addChild($svgText);
file_put_contents(dirname(__DIR__).'/docs/'.$filename.'.svg', $image->toXMLString());
