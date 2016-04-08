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
        case NEW_USER:
            $class = 'label-warning';
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
        return 'active';
}

/**
 * Get a select options with available status
 *
 * @param string $name
 * @param integer $selected
 * @param string $optionDefault
 * @return mixed
 *
 */
function getStatusSelect($name = 'status', $selected = null, $optionDefault = '<< Choose >>')
{
    $list = [];

    if ($optionDefault)
        $list[''] = $optionDefault;

    $list[ACTIVATED] = LABEL_ACTIVATED;
    $list[DISABLED] = LABEL_DISABLED;

    return BootForm::select($name, null, $list, $selected);
}

/**
 * Returns a icon string according
 *
 * @param string $alert
 * 
 * @return string
 */
function getAlertIcon($alert)
{
    switch ($alert)
    {
        case 'danger':
            $icon = 'ban';
            break;
        case 'warning':
            $icon = 'warning';
            break;
        case 'success':
            $icon = 'check';
            break;
        case 'info':
            $icon = 'info';
            break;
    }

    return $icon;
}

