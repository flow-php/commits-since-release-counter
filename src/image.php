<?php

require_once __DIR__.'/../vendor/autoload.php';

use SVG\Nodes\Texts\SVGText;
use SVG\SVG;

$filename = $argv[1];
$count = (int) $argv[2];

$image = new SVG(90, 20);
$suffix = 1 === $count ? 'commit' : 'commits';
$svgText = new SVGText($count.' '.$suffix, 4, 15);

$image->getDocument()->addChild($svgText);
file_put_contents(dirname(__DIR__).'/docs/'.$filename.'.svg', $image->toXMLString());
