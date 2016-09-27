<?php

  class Comments extends BaseModel{

    public $id, $comment, $updated, $createdby, $story_id;

    public function __construct($attributes){
      parent::__construct($attributes);
    }

    public static function storyComments($story_id){
      $query = DB::connection()->prepare('SELECT * FROM comments WHERE story_id = :story_id');
      $query->execute(array('story_id' => $story_id));
      $results = $query->fetchAll();
      $comments = array();

      foreach($results as $result){
        $comments[] = new Comments(array(
          'id' => $result['id'],
          'comment' => $result['comment'],
          'story_id' => $result['story_id'],
          'updated' => $result['updated'],
          'createdby' => $result['createdby']
        ));
      }

      return $comments;
    }

}
