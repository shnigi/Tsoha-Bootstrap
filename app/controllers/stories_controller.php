<?php

class StoryController extends BaseController{

  public static function index(){
    $stories = Stories::allStories();
    View::make('stories.html', array('stories' => $stories));
  }

  public static function getStoryByCategory($id){
    $storiesByCategory = Stories::getStories($id);
    View::make('stories.html', array('stories' => $storiesByCategory));
  }

  public static function findStory(){
    $params = $_POST;
    $searchWord = $params['tarina'];
    $foundStories = Stories::findStories($searchWord);
    View::make('stories.html', array('stories' => $foundStories));
  }

  public static function createNewStory(){
    $params = $_POST;
    $points = 0;
    $user = BaseController::get_user_logged_in();
    if ($user){
      $createdby = $user->username;
    }
    else {
      $createdby = "Anonymous";
    }

    if(isset($params['storycategory'])){
      $categories = $params['storycategory'];
    }
    else {
      $categories = null;
    }

    $story = new Stories(array(
      'story' => $params['story'],
      'points' => $points,
      'createdby' => $createdby,
      'categories' => $categories
    ));

    $errors = $story->validate_story();

    if(count($errors) > 0){
      Redirect::to('/', array('messages' => $errors));
    }
    else if (!isset($params['storycategory'])){
      Redirect::to('/', array('message' => 'Kategoria puuttuu'));
    }
    else {
      $story->saveStory();
      Redirect::to('/tarina/' . $story->id, array('message' => 'Tarina lisätty onnistuneesti.'));
    }


  }

}
