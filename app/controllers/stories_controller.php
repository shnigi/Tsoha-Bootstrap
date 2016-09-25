<?php

class StoryController extends BaseController{

  public static function index(){
    $stories = Stories::allStories();
    View::make('stories.html', array('stories' => $stories));
  }

  public static function createNewStory(){
    $params = $_POST;

    $story = new Stories(array(
      'story' => $params['story']
    ));

    $story->saveStory();
     Redirect::to('/tarina/' . $story->id, array('message' => 'Tarina lisätty onnistuneesti.'));
  }

}
