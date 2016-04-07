<?php

const DISABLED = 0;
const ACTIVATED = 1;
const DELETED = 2;

const LABEL_DISABLED = 'DISABLED';
const LABEL_ACTIVATED = 'ACTIVATED';
const LABEL_DELETED = 'DELETED';


/**
 * Returns status according to the constant
 *
 * @param integer $status according constants
 *
 * @return string
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
        case DELETED:
            $label = LABEL_DELETED;
            break;
        default:
            $label = '';
    }

    return $label;
}

/**
 * Checks if a register is deleted according status constants
 *
 * @param integer $status according constants
 *
 * @return bool
 */
function isDeleted($status)
{
    if($status == DELETED)
        return true;

    return false;
}