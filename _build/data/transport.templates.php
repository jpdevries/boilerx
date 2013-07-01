<?php
/**
 * @package boilerx
 * @subpackage build
 */
function getTemplateContent($filename) {
    $o = file_get_contents($filename);
    return $o;
}

$templates = array();
$templatesSource = array(
	'sample.BoilerXTemplate' => array(
		'description' => 'BoilerX Template Example',
	),
);

$i = 1;
foreach ($templatesSource as $key => $options) {
	$templates[$i]= $modx->newObject('modTemplate');
	$templates[$i]->fromArray(array(
	    'id' => $i,
	    'templatename' => $key,
	    'description' => $options['description'],
	    'content' => getTemplateContent($sources['elements'].'templates/' . $key . '.html'),
	),'',true,true);
	$properties = include $sources['data'].'properties/properties.boilerx.php';
	$templates[$i]->setProperties($properties);
	$o = gettemplateContent($sources['elements'].'templates/' . $key . '.html');
	//echo "\n\n\n$key\n$o";
	unset($properties);
	$i++;
}
return $templates;

