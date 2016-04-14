<?php
// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', url('/'));
});

// Home > Users
Breadcrumbs::register('users', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Users', url('users'));
});

// Home > User > [User]
Breadcrumbs::register('userEdit', function($breadcrumbs, $user)
{
    $breadcrumbs->parent('users');
    $breadcrumbs->push($user->name? $user->name : 'New');
});

// Home > Projects
Breadcrumbs::register('projects', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Projects', url('projects'));
});

// Home > Projects -> [Project]
Breadcrumbs::register('projectEdit', function($breadcrumbs, $project) {
    $breadcrumbs->parent('projects');
    $breadcrumbs->push($project->name? $project->name : 'New');
});

// Home > Phases
Breadcrumbs::register('phases', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Phases', url('phases'));
});

// Home > Phases -> [Phase]
Breadcrumbs::register('phaseEdit', function($breadcrumbs, $phase) {
    $breadcrumbs->parent('phases');
    $breadcrumbs->push($phase->name? $phase->name : 'New');
});