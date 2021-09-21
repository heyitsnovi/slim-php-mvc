<?php

/*Define your routes here*/


// Default Page / Sample Page
$app->get('/','AppControllers\DefaultController:index');


// Demo Application "Blogs"

//GET routes
$app->get('/blogs', 'AppControllers\Blog:index');
$app->get('/blogs/add', 'AppControllers\Blog:add_blog');
$app->get('/blogs/view/{blog_id}', 'AppControllers\Blog:view_blog');

//POST Routes
$app->post('/blogs/save-blog','AppControllers\Blog:save_blog');