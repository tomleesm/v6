<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > About
Breadcrumbs::for('about', function ($trail) {
    $trail->parent('home');
    $trail->push('About', route('about', [ 'pid' => 123, 'id' => 456 ]));
});

// Home > Blog
Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('about');
    $trail->push('Blog', route('blog'));
});

Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('blog');
    $trail->push($post->title, route('post', $post->title));
});

Breadcrumbs::for('category', function ($trail, $category) {
    /**
     $trail->parent('blog');

     if(isset($category->parents)) {
         foreach ($category->parents as $parent) {
             $trail->push($parent->title, route('category', $parent->id));
         }
     }
      ***/
    if(isset($category->parent)) {
        $trail->parent('category', $category->parent);
    } else {
        $trail->parent('blog');
    }

     $trail->push($category->title, route('category', $category->id));
});
