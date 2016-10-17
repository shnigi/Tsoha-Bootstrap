<?php

  class ownController extends BaseController{

    public static function index(){
      $user = BaseController::get_user_logged_in();
      if ($user){
        $createdby = $user->username;
        $ownStories = OwnPage::ownStories($createdby);
        $ownComments = OwnPage::ownComments($createdby);
      }
      View::make('own.html', array('ownStories' => $ownStories, 'comments' => $ownComments));
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

    public static function deleteStory($id){

      $deleteStory = new OwnPage(array(
        'id' => $id
      ));

      $deleteStory->deleteStory();
       Redirect::to('/omat', array('message' => 'Tarina poistettu.'));
    }

    public static function deleteComment($id){

      $deleteStory = new Comments(array(
        'id' => $id
      ));

      $deleteStory->deleteComment();
       Redirect::to('/omat', array('messages' => 'Kommentti poistettu.'));
    }

  }
