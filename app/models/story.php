<?php

  class Stories extends BaseModel{

    public $id, $points, $story, $updated, $createdby;

    public function __construct($attributes){
      parent::__construct($attributes);
    }

    public static function allStories(){
      $query = DB::connection()->prepare('SELECT * FROM stories');
      $query->execute();
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

    public static function selectedStory($id){
      $query = DB::connection()->prepare('SELECT * FROM stories WHERE id = :id LIMIT 1');
      $query->execute(array('id' => $id));
      $result = $query->fetch();

      if($result){
        $story = new Stories(array(
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

  }
