<?php

require_once __DIR__.'/../vendor/autoload.php';

use SVG\SVG;
use SVG\Nodes\Texts\SVGText;

$filename = $argv[1];
$count = $argv[2];

$image = new SVG(90, 20);
$svgText = new SVGText($count. ' commits', 4, 15);

$image->getDocument()->addChild($svgText);
file_put_contents(dirname(__DIR__).'/docs/'.$filename.'.svg', $image->toXMLString());
