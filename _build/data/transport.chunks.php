<?php
/**
 * @package boilerx
 * @subpackage build
 */
function getChunkContent($filename) {
    $o = file_get_contents($filename);
    return $o;
}

$chunks = array();
$chunksSource = array(
	'sample.bx-head-open' => array(
		'description' => 'Opens the <head> of HTML5 boilerplate (does not close)',
	),
	'sample.bx-head-append' => array(
		'description' => 'Use this chunk to append to your head tag',
	),
	'sample.bx-head-open' => array(
		'description' => 'Opens the <head> of HTML5 boilerplate (does not close)',
	),
	'sample.bx-head-close' => array(
		'description' => 'Closes the <head> tag',
	),
	'sample.bx-container-open' => array(
		'description' => 'Opens the div#container and <body> tags',
	),
	'sample.bx-container-close' => array(
		'description' => 'You should close your topmost wrapper div here',
	),
	'sample.bx-bottom-open' => array(
		'description' => 'Deffered JavaScript and Google Analytics',
	),
	'sample.bx-bottom-close' => array(
		'description' => 'Closes the <body> and <html> tags',
	),
);

$i = 1;
foreach ($chunksSource as $key => $options) {
	$chunks[$i]= $modx->newObject('modChunk');
	$chunks[$i]->fromArray(array(
	    'id' => $i,
	    'name' => $key,
	    'description' => $options['description'],
	    'snippet' => getChunkContent($sources['elements'].'chunks/' . $key . '.html'),
	),'',true,true);
	$properties = include $sources['data'].'properties/properties.boilerx.php';
	$chunks[$i]->setProperties($properties);
	$o = getChunkContent($sources['elements'].'chunks/' . $key . '.html');
	//echo "\n\n\n$key\n$o";
	unset($properties);
	$i++;
}
return $chunks;

