<?php

  class User extends BaseModel{

    public $username, $password, $emailaddr, $isadmin, $registerdate;

    public function __construct($attributes){
      parent::__construct($attributes);
    }

    public static function authenticate($username, $password){
      $query = DB::connection()->prepare('SELECT * FROM appuser WHERE username = :username AND password =:password LIMIT 1');
      $query->execute(array('username' => $username, 'password' => $password));
      $results = $query->fetch();
      return $results;
    }

    public static function register($username, $password, $email){
      $query = DB::connection()->prepare('INSERT INTO appuser (username, password, emailaddr) VALUES (:username, :password, :email)');
      $query->execute(array('username' => $username, 'password' => $password, 'email' => $email));
      return true;
    }



}
