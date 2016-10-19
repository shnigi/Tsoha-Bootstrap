<?php

  class IndexController extends BaseController{

    public static function index(){
      $newestStories = Stories::newestStories();
      $bestStories = Stories::bestStories();
      $categories = Categories::getCategories();
      View::make('home.html', array('newestStories' => $newestStories,
                                    'bestStories' => $bestStories,
                                    'categories' => $categories));
    }

  }
