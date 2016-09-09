<?php

  class Game
{
  private $player;
  private $answer;
  private $hiddenAnswer;
  private $wordArray;
  public $guessedLetters = "";
  function __construct($player){
    $this->player = $player;
    $this->answer = "Music";
    $this->wordArray = array("supercalifragilisticexpialidocious", "puclchritrude", "shit", "concupiscence", "toggle", "abnegation");
  }
  function getPlayer()
  {
    return $this->player;
  }
  function setPlayer($player){
    $this->player = $player;

  }
  function getAnswer()
  {
    return $this->answer;
  }
  function getHiddenAnswer()
  {
    return $this->hiddenAnswer;
  }
  function createHiddenAnswer()
  {
    $answerLength = $this->answer;
    $this->hiddenAnswer = str_repeat("_",strlen($answerLength));
  }
  function playerGuess($letter)
  {
    $answerLength = (strlen($this->answer))-1;
    while($answerLength >= 0)
    {
      if($letter == (substr($this->answer,$answerLength, 1))){
        $this->hiddenAnswer = substr_replace($this->hiddenAnswer, $letter, $answerLength, 1);
      }
      $answerLength = $answerLength - 1;
    }
    $this->guessedLetters= substr_replace($this->guessedLetters, $letter, strlen($this->guessedLetters), 0);

  }

  function save()
  {
    $_SESSION["hangman"] = $this;
  }
  // static function getAll()
  // {
  //     return $_SESSION['allCds'];
  // }
  static function deleteAll()
  {
      $_SESSION['hangman'] = "";
  }



}
 ?>
