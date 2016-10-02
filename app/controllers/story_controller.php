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
    $user = "Anonymous";

    $comment = new Comments(array(
      'comment' => $params['comment'],
      'story_id' => $story_id,
      'createdby' => $user
    ));

    $errors = $comment->validate_comment();

    if(count($errors) > 0){
      echo 'Kommentti on liian lyhyt!';
    }
    else {
      $comment->saveComment();
      Redirect::to('/tarina/' . $comment->story_id, array('message' => 'Kommentti lisätty.'));
    }


  }

}
