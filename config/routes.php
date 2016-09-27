<?php
  $routes->get('/', function() {
    IndexController::index();
  });

  $routes->get('/selaa', function() {
    StoryController::index();
  });

  $routes->get('/tarina/:id', function($id) {
    SingleStoryController::story($id);
  });

  $routes->get('/topten', function() {
    HelloWorldController::topten();
  });

  $routes->get('/rekisteroidy', function() {
    HelloWorldController::rekisteroidy();
  });

  $routes->get('/kirjaudu', function() {
    HelloWorldController::kirjaudu();
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
