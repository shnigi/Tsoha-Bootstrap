<?php

  class OwnPage extends BaseModel{

    public $id, $points, $story, $updated, $createdby;

    public function __construct($attributes){
      parent::__construct($attributes);
    }

    public static function ownStories($createdby){
      $query = DB::connection()->prepare('SELECT * FROM stories WHERE createdby = :createdby');
      $query->execute(array('createdby' => $createdby));
      $results = $query->fetchAll();
      $stories = array();

      foreach($results as $result){
        $stories[] = new Stories(array(
          'id' => $result['id'],
          'points' => $result['points'],
          'story' => $result['story'],
          'updated' => $result['updated'],
          'createdby' => $result['createdby']
        ));
      }

      return $stories;
    }

    public static function ownStory($id){
      $query = DB::connection()->prepare('SELECT * FROM stories WHERE id = :id LIMIT 1');
      $query->execute(array('id' => $id));
      $result = $query->fetch();

      if($result){
        $story[] = new Stories(array(
          'id' => $result['id'],
          'points' => $result['points'],
          'story' => $result['story'],
          'updated' => $result['updated'],
          'createdby' => $result['createdby']
        ));
        return $story;
      }
      return null;
    }

    public static function ownComment($id){
      $query = DB::connection()->prepare('SELECT * FROM comments WHERE id = :id LIMIT 1');
      $query->execute(array('id' => $id));
      $result = $query->fetch();

      if($result){
        $story[] = new Comments(array(
          'id' => $result['id'],
          'comment' => $result['comment'],
          'story' => $result['story_id'],
          'updated' => $result['updated'],
          'createdby' => $result['createdby']
        ));
        return $story;
      }
      return null;
    }

    public static function ownComments($id){
      $query = DB::connection()->prepare('SELECT * FROM comments WHERE createdby = :id');
      $query->execute(array('id' => $id));
      $result = $query->fetchAll();

      if($result){
        return $result;
      }
      return null;
    }

    public function saveStory(){
      $query = DB::connection()->prepare('UPDATE stories SET "story"=:story WHERE "id"=:id');
      $query->execute(array('story' => $this->story, 'id' => $this->id));
    }

    public function deleteStory(){
      $query = DB::connection()->prepare('DELETE FROM comments WHERE "story_id"=:id');
      $query->execute(array('id' => $this->id));
      $query = DB::connection()->prepare('DELETE FROM stories WHERE "id"=:id');
      $query->execute(array('id' => $this->id));
    }

  }
