<?php

$settingSource = array(
    'ga-id' => array(
        'area' => 'analytics',
        'value' => 'UAXXXXXXXX1',
    ),
    /*'cdn_url' => array( // depreciated in 1.0.0 
        'area' => 'assets',
        'value' => 'http://s3.amazonaws.com/mycdn/',
    ),*/
    'css_normalize_path' => array(
        'area' => 'assets',
        'value' => '[[++assets_url]]components/boilerx/css/normalize.css',
    ),
    'css_path' => array(
        'area' => 'assets',
        'value' => '[[++assets_url]]components/boilerx/css/main.css'
    ),
    'jquery_version' => array(
        'area' => 'assets',
        'value' => '1.10.2'
    ),
    'modernizr_js_path' => array(
        'area' => 'assets',
        'value' => '[[++assets_url]]components/boilerx/js/vendor/modernizr-2.6.2.min.js'
    ),
    'meta_author' => array(
        'area' => 'meta',
        'value' => 'Site Authors'
    ),
    'meta_desc' => array(
        'area' => 'meta',
        'value' => 'Site Description'
    ),
    'meta_viewport' => array(
        'area' => 'meta',
        'value' => 'width=device-width,initial-scale=1'
    ),
    'x-ua-compatible' => array(
        'area' => 'meta',
        'value' => 'IE=edge,chrome=1'
    ),
    'chrome_frame_version' => array(
        'area' => 'options',
        'value' => '7'
    ),
    /*'do_cdn' => array( // depreciated in 1.0.0 
        'area' => 'options',
        'value' => false,
    ),*/
    'show_comments' => array(
        'area' => 'options',
        'value' => false,
    ),
);

$settings = array();

/**
 * Loop over setting stuff to interpret the xtype and to create the modSystemSetting object for the package.
 */
foreach ($settingSource as $key => $options) {
    $val = $options['value'];

    if (isset($options['xtype'])) $xtype = $options['xtype'];
    elseif (is_int($val)) $xtype = 'numberfield';
    elseif (is_bool($val)) $xtype = 'modx-combo-boolean';
    else $xtype = 'textfield';

    /** @var modSystemSetting */
    $settings[$key] = $modx->newObject('modSystemSetting');
    $settings[$key]->fromArray(array(
        'key' => 'bx.' . $key,
        'xtype' => $xtype,
        'value' => $options['value'],
        'namespace' => 'boilerx',
        'area' => $options['area'],
        'editedon' => time(),
    ), '', true, true);
}

return $settings;
