<?php

  class BaseController{

    public static function get_user_logged_in(){
      if(isset($_SESSION['user'])){
       $user_id = $_SESSION['user'];
       $user = User::find($user_id);

       return $user[0];
     }
      return null;
    }

    public static function check_logged_in(){
      if(!isset($_SESSION['user'])){
         Redirect::to('/kirjaudu', array('message' => 'Kirjaudu ensin sisään!'));
       }
    }

    public static function validate_string_length($string){
      $errors = array();
      if($string === "" && $string === null){
        $errors[] = 'Kenttä ei saa olla tyhjä!';
      }
      if(strlen($string) < 6){
        $errors[] = 'Syötteen tulee olla vähintään 6 merkkiä!';
      }
      if(strlen($string) > 2000){
        $errors[] = 'Teksti on liian pitkä. Enintään 2000 merkkiä!';
      }

      return $errors;
    }

  }
