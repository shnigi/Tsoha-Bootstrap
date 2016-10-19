<?php

  class Categories extends BaseModel{

    public $id, $category;

    public function __construct($attributes){
      parent::__construct($attributes);
    }

    public static function getCategories(){
      $query = DB::connection()->prepare('SELECT * FROM categories');
      $query->execute();
      $results = $query->fetchAll();
      $categories = array();

      foreach($results as $result){
        $categories[] = new Categories(array(
          'id' => $result['id'],
          'category' => $result['category']
        ));
      }

      return $categories;
    }


  }
