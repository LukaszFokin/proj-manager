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
            $class = 'label-default';
            break;
        case ACTIVATED:
            $class = 'label-success';
            break;
        case DELETED:
            $class = 'label-danger';
            break;
        default:
            $class = 'label-default';
    }

    return "<span class='label {$class}'>{$label}</span>";
}

/**
 * Get active class to an menu item
 *
 * @param $route Route to be validated
 * 
 * @return string
 */
function getActive($route)
{
    $actualRoute = \Route::getCurrentRoute()->getCompiled()->getStaticPrefix();

    if(preg_match("/{$route}/", $actualRoute))
        return ' active';
}
