<?php
  function check_logged_in(){
    BaseController::check_logged_in();
  }

  $routes->get('/', function() {
    IndexController::index();
  });

  $routes->get('/omat', 'check_logged_in', function() {
    ownController::index();
  });

  $routes->get('/selaa', function() {
    StoryController::index();
  });

  $routes->get('/tarina/:id', function($id) {
    SingleStoryController::story($id);
  });

  $routes->get('/topten', function() {
    TopTenController::index();
  });

  $routes->get('/rekisteroidy', function() {
    HelloWorldController::rekisteroidy();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

  $routes->post('/tallennatarina', function() {
    StoryController::createNewStory();
  });

  $routes->post('/tallennakommentti/:id', function($id) {
    SingleStoryController::addComment($id);
  });

  $routes->get('/muokkaa/:id', function($id) {
    ownController::ownStory($id);
  });

  $routes->post('/editoitarinaa/:id', function($id) {
    ownController::editStory($id);
  });

  $routes->post('/poista/:id', function($id) {
    ownController::deleteStory($id);
  });

  $routes->get('/kirjaudu', function() {
    UserController::login();
  });

  $routes->post('/login', function(){
    UserController::handle_login();
  });

  $routes->post('/register', function(){
    UserController::registerNewUser();
  });

  $routes->post('/logout', function(){
    UserController::logout();
  });
