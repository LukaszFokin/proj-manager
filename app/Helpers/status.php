<?php

const ACTIVATED = 1;
const DISABLED = 0;

const LABEL_ACTIVATED = 'ACTIVATED';
const LABEL_DISABLED = 'DISABLED';


/**
 * Returns status according to the constant
 *
 * @param $status
 */
function getStatus($status)
{
    switch ($status)
    {
        case DISABLED:
            $label = LABEL_DISABLED;
            break;
        case ACTIVATED:
            $label = LABEL_ACTIVATED;
            break;
        default:
            $label = '';
    }

    return $label;
}