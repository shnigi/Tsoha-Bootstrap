<?php

class StoryController extends BaseController{

  public static function index(){
    $stories = Stories::allStories();
    View::make('stories.html', array('stories' => $stories));
  }

}
