<?php

  class Game
{
  private $player;
  private $answer;
  private $hiddenAnswer;
  private $wordArray;
  function __construct($player){
    $this->player = $player;
    $this->answer = "Music";
    $this->hiddenAnswer = array();
    $this->wordArray = array("supercalifragilisticexpialidocious", "puclchritrude", "shit", "concupiscence", "toggle", "abnegation");
  }
  function getPlayer()
  {
    return $this->player;
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
    // echo substr($this->answer, $answerLength, 1);
    while($answerLength >= 0)
    {
      if($letter == (substr($this->answer,$answerLength, 1))){
        echo $letter;
        $this->hiddenAnswer = substr_replace($this->hiddenAnswer, $letter, $answerLength, 1);
      }
      else{
        echo "-  ";
      }
      $answerLength = $answerLength - 1;

    }
  }



}
 ?>
