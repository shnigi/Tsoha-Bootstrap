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

    public static function validate_string_length($string, $length){
      if ($string !== "" && $string !== null && $string.length > 6){

      }
    }

  }
