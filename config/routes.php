<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/selaa', function() {
    StoryController::index();
  });

  $routes->get('/tarina/:id', function($id) {
    HelloWorldController::story();
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
