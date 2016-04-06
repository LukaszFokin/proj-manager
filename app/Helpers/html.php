<?php

/**
 * Returns a box with status
 *
 * @param integer $status
 *
 * @return string
 */
function getStatusBox($status)
{
    $label = getStatus($status);
    switch ($status)
    {
        case DISABLED:
            $class = 'label-danger';
            break;
        case ACTIVATED:
            $class = 'label-success';
            break;
        default:
            $class = 'label-default';
    }

    return "<span class='label {$class}'>{$label}</span>";
}
