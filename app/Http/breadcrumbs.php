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
    $breadcrumbs->push($user->name);
});

// Home > Projects
Breadcrumbs::register('projects', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Projects', url('projects'));
});


/*

// Home > About
Breadcrumbs::register('about', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('About', '');
});

// Home > Blog
Breadcrumbs::register('blog', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Blog', '');
});

// Home > Blog > [Category]
Breadcrumbs::register('category', function($breadcrumbs)
{
    $breadcrumbs->parent('blog');
    $breadcrumbs->push('oi', 'testeteste');
});

// Home > Blog > [Category] > [Page]
Breadcrumbs::register('page', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('category', $page->category);
    $breadcrumbs->push($page->title, '');
});
*/