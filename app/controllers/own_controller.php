<?php

  class ownController extends BaseController{

    public static function index(){
      $ownStories = OwnPage::ownStories();
      View::make('own.html', array('ownStories' => $ownStories));
    }

    public static function ownStory($id){
      $ownStory = OwnPage::ownStory($id);
      View::make('edit.html', array('ownStory' => $ownStory));
    }

    public static function editStory($id){
      $params = $_POST;
      $user = "Anonymous";

      $story = new OwnPage(array(
        'story' => $params['story'],
        'id' => $id
      ));

      $story->saveStory();
       Redirect::to('/omat', array('message' => 'Tarinan muokkaus onnistui.'));
    }

  }
