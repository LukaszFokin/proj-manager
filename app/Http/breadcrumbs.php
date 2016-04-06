<?php
// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', url('/'));
});

// Users
Breadcrumbs::register('users', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Users');
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