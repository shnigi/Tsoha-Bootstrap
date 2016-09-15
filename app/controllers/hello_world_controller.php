<?php

  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  View::make('home.html');
    }

    public static function stories(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      View::make('stories.html');
    }

    public static function story(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      View::make('story.html');
    }

    public static function topten(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      View::make('topten.html');
    }

    public static function rekisteroidy(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      View::make('rekisteroidy.html');
    }

    public static function kirjaudu(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      View::make('kirjaudu.html');
    }

    public static function sandbox(){
      // Testaa koodiasi täällä
      echo 'Hello World!';
    }
  }
