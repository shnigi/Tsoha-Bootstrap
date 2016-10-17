<?php

class SingleStoryController extends BaseController{

  public static function story($id) {
    $story = Stories::selectedStory($id);
    $comments = Comments::storyComments($id);
    View::make('story.html', array('story' => $story, 'comments' => $comments));
  }

  public static function addComment($id){
    $params = $_POST;
    $story_id = $id;
    if(isset($_SESSION['user'])){
      $user = $_SESSION['user'];
    }
    else {
      $user = "Anonymous";
    }

    $comment = new Comments(array(
      'comment' => $params['comment'],
      'story_id' => $story_id,
      'createdby' => $user
    ));

    $errors = BaseController::validate_string_length($comment->comment);

    if(count($errors) > 0){
      // echo $errors[0];
      Redirect::to('/tarina/' . $comment->story_id, array('messages' => $errors));
    }
    else {
      $comment->saveComment();
      Redirect::to('/tarina/' . $comment->story_id, array('comment' => 'Kommentti lisätty.'));
    }


  }

}
