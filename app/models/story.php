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

    public static function newestStories(){
      $query = DB::connection()->prepare('SELECT * FROM stories ORDER BY updated DESC;');
      $query->execute();
      $results = $query->fetchAll();
      $newestStories = array();

      foreach($results as $result){
        $newestStories[] = new Stories(array(
          'id' => $result['id'],
          'points' => $result['points'],
          'story' => $result['story'],
          'updated' => $result['updated'],
          'createdby' => $result['createdby']
        ));
      }

      return $newestStories;
    }

    public static function bestStories(){
      $query = DB::connection()->prepare('SELECT * FROM stories ORDER BY points DESC;');
      $query->execute();
      $results = $query->fetchAll();
      $bestStories = array();

      foreach($results as $result){
        $bestStories[] = new Stories(array(
          'id' => $result['id'],
          'points' => $result['points'],
          'story' => $result['story'],
          'updated' => $result['updated'],
          'createdby' => $result['createdby']
        ));
      }

      return $bestStories;
    }

    public static function topTenStories(){
      $query = DB::connection()->prepare('SELECT * FROM stories ORDER BY points DESC LIMIT 10;');
      $query->execute();
      $results = $query->fetchAll();
      $topTenStories = array();

      foreach($results as $result){
        $topTenStories[] = new Stories(array(
          'id' => $result['id'],
          'points' => $result['points'],
          'story' => $result['story'],
          'updated' => $result['updated'],
          'createdby' => $result['createdby']
        ));
      }

      return $topTenStories;
    }

    public static function selectedStory($id){
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

    public function saveStory(){
      $query = DB::connection()->prepare('INSERT INTO stories (story, points, createdby) VALUES (:story, :points, :createdby) RETURNING id');
      $query->execute(array('story' => $this->story, 'points' => $this->points, 'createdby' => $this->createdby));
      $row = $query->fetch();
      $this->id = $row['id'];
    }

    public function validate_story(){
      $errors = array();
      if($this->story == '' || $this->story == null){
        $errors[] = 'Tarina ei saa olla tyhjä!';
      }
      if(strlen($this->story) < 6){
        $errors[] = 'Tarinan pituuden tulee olla vähintään 6 merkkiä!';
      }

      return $errors;
    }

  }
