<?php

class SingleStoryController extends BaseController{

  public static function story($id){
    $story = Stories::selectedStory($id);
    $comments = Comments::storyComments($id);
    View::make('story.html', array('story' => $story, 'comments' => $comments));
  }

}
