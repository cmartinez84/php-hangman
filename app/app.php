<?php
 require_once __DIR__."/../vendor/autoload.php";
 require_once __DIR__."/../src/Game.php";
 date_default_timezone_set('America/Los_Angeles');
 session_start();
  if (empty($_SESSION['allCds'])){
    $_SESSION['allCds'] = array();
  }
  $app = new Silex\Application();

  $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

  $app->get("/", function() use ($app){
    $new_game = new Game ("KD");
    $new_game->createHiddenAnswer();
    var_dump($new_game->getHiddenAnswer());
    return $app['twig']->render('home.html.twig');
  });



return $app;
 ?>
