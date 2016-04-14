<?php

/**
 * Convert an object in array
 *
 * @param  stdclass $toBeConverted Object to be converted
 * @param  string   $index         Array key
 * @param  string   $value         Associated value array
 * @param  string   $optionDefault Default option
 */
function convertObjectToArray($toBeConverted, $index, $value, $optionDefault = null)
{
    $data = [];

    if($optionDefault)
        $data[''] = $optionDefault;

    foreach ($toBeConverted as $option)
        $data[$option->{$index}] = $option->{$value};

    return $data;
}