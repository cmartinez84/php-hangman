<?php
 require_once __DIR__."/../vendor/autoload.php";
 require_once __DIR__."/../src/Game.php";
 date_default_timezone_set('America/Los_Angeles');
 session_start();
  if (empty($_SESSION['hangman'])){
    $_SESSION['hangman'] = "";
  }
  $app = new Silex\Application();

  $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

  $app->get("/", function() use ($app){
    return $app['twig']->render('home.html.twig');
  });
  $app->post("/start", function() use ($app){
    $new_game = new Game ($_POST['player']);
    $new_game->save();
    $new_game->createHiddenAnswer();
    return $app['twig']->render('hangman.html.twig');
  });
  $app->post("/guess", function() use ($app){
    $game = $_SESSION['hangman'];
    $game->playerGuess($_POST['guess']);
    array_push($game->guessedLetters,$_POST['guess']);
    return $app['twig']->render('hangman.html.twig', array('game' => $game, 'guessed' => $game->guessedLetters));
  });

return $app;
 ?>
