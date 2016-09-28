<?php

class TopTenController extends BaseController{

  public static function index(){
    $topten = Stories::topTenStories();
    View::make('topten.html', array('topten' => $topten));
  }

}
