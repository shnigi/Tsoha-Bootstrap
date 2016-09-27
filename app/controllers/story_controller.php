<?php

class SingleStoryController extends BaseController{

  public static function story($id) {
    $story = Stories::selectedStory($id);
    $comments = Comments::storyComments($id);
    View::make('story.html', array('story' => $story, 'comments' => $comments));
  }

  public static function addComment(){
    $params = $_POST;
    $story_id = 1;

    $comment = new Comments(array(
      'comment' => $params['comment'],
      'story_id' => $story_id
    ));

    $comment->saveComment();
     Redirect::to('/tarina/' . $comment->story_id, array('message' => 'Kommentti lisätty.'));
  }

}
