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

/**
 * Returns a select option with all projects activated in database
 *
 * @param string $name
 * @param string $label
 * @param null $selected
 * @param string $optionDefault
 *
 * @return string
 */
function getProjectsSelect($name = 'project_id', $label = 'Project', $selected = null, $optionDefault = '<< Choose >>')
{
    $projects = \App\Models\Project::where('status', ACTIVATED)->get();

    return BootForm::select($name, $label, convertObjectToArray($projects, 'id', 'name', $optionDefault), $selected);
}

/**
 * Returns a select option with all phases stored in database
 * @param string $name
 * @param string $label
 * @param null $selected
 * @param string $optionDefault
 *
 * @return string
 */
function getParentPhasesSelect($name = 'parent_id', $label = 'Parent Phase', $selected = null, $optionDefault = '<< Choose >>')
{
    $phases = \App\Models\Phase::whereNull('parent_id')->get();

    return BootForm::select($name, $label, convertObjectToArray($phases, 'id', 'name', $optionDefault), $selected);
}

