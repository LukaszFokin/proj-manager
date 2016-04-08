<?php

const DISABLED = 0;
const ACTIVATED = 1;
const DELETED = 2;
const NEW_USER = 3;

const LABEL_DISABLED = 'Disabled';
const LABEL_ACTIVATED = 'Activated';
const LABEL_DELETED = 'Deleted';
const LABEL_NEW_USER = 'New User';


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
        case NEW_USER:
            $label = LABEL_NEW_USER;
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