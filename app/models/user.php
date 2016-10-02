<?php

  class User extends BaseModel{

    public $username, $password, $emailaddr, $isadmin, $registerdate;

    public function __construct($attributes){
      parent::__construct($attributes);
    }

    public static function authenticate($username, $password){
      $query = DB::connection()->prepare('SELECT * FROM appuser WHERE username = :username AND password =:password');
      $query->execute(array('username' => $username, 'password' => $password));
      $results = $query->fetch();
      return $results;
    }



}
