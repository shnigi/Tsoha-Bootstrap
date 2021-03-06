<?php
class UserController extends BaseController{

  public static function login(){
      View::make('kirjaudu.html');
  }

  public static function handle_login(){
    $params = $_POST;

    $user = User::authenticate($params['username'], $params['password']);

    if(!$user){
      View::make('kirjaudu.html', array('error' => 'Väärä käyttäjätunnus tai salasana!'));
    }
    else{
      $_SESSION['user'] = $user[0]->username;
      $_SESSION['isadmin'] = $user[0]->isadmin;

      Redirect::to('/', array('message' => 'Tervetuloa takaisin !'));
    }
  }

  public static function registerNewUser(){
    $params = $_POST;

    $registerUser = User::register($params['username'], $params['password'], $params['email']);

    if(!$registerUser){
      View::make('rekisteroidy.html', array('error' => 'Jotain meni pieleen!'));
    }else{
      Redirect::to('/kirjaudu', array('message' => 'Rekisteröinti onnistui!'));
    }
  }

  public static function logout(){
    $_SESSION['user'] = null;
    Redirect::to('/kirjaudu', array('message' => 'Olet kirjautunut ulos!'));
  }

}
