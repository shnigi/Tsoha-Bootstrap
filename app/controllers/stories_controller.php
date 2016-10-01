<?php

class StoryController extends BaseController{

  public static function index(){
    $stories = Stories::allStories();
    View::make('stories.html', array('stories' => $stories));
  }

  public static function createNewStory(){
    $params = $_POST;
    $points = 0;
    $createdby = "Anonymous";

    $story = new Stories(array(
      'story' => $params['story'],
      'points' => $points,
      'createdby' => $createdby
    ));

    $errors = $story->validate_story();

    if(count($errors) > 0){
      echo 'Tarina on liian lyhyt!';
    }
    else {
      $story->saveStory();
      Redirect::to('/tarina/' . $story->id, array('message' => 'Tarina lisätty onnistuneesti.'));  
    }


  }

}
