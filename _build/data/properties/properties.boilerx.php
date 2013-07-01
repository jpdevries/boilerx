<?php
/**
 * @package shopmonster
 * @subpackage build
 */
$properties = array(
    array(
        'name' => 'tpl',
        'desc' => 'prop_shopmonster.tpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'rowTpl',
        'lexicon' => 'shopmonster:properties',
    ),
    array(
        'name' => 'sort',
        'desc' => 'prop_shopmonster.sort_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'name',
        'lexicon' => 'shopmonster:properties',
    ),
    array(
        'name' => 'dir',
        'desc' => 'prop_shopmonster.dir_desc',
        'type' => 'list',
        'options' => array(
            array('text' => 'prop_shopmonster.ascending','value' => 'ASC'),
            array('text' => 'prop_shopmonster.descending','value' => 'DESC'),
        ),
        'value' => 'DESC',
        'lexicon' => 'shopmonster:properties',
    ),
);
return $properties;