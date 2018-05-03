<?php

namespace Oquizz\Model;

class QuestionModel
{
    private $id;
    private $id_quiz;
    private $question;
    private $propShuffle;
    private $prop1;
    private $prop2;
    private $prop3;
    private $prop4;
    private $id_level;
    private $anecdote;
    private $wiki;

    // private $members;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getIdQuiz()
    {
        return $this->id_quiz;
    }

    public function getQuestion()
    {
        return $this->question;
    }

    public function getIdLevel()
    {
        return $this->id_level;
    }

    public function getAnecdote()
    {
        return $this->anecdote;
    }

    public function getWiki()
    {
        return $this->wiki;
    }

    static public function findAllQuestionByIdWoShuffle($id) {
      $db = Database::getDB();
      $query = $db->query('SELECT questions.*, levels.name FROM questions, levels WHERE questions.id_level = levels.id AND questions.id_quiz = '.$id);
      $query->bindValue(':id', $id);
      $query->execute();
      $questionsWoShuffle = $query->fetchAll(\PDO::FETCH_CLASS, static::class);
      $questionsWoShuffle = self::woshuffleQuestions($questionsWoShuffle);
      return $questionsWoShuffle;
    }

    static public function findAllQuestionById($id) {
      $db = Database::getDB();
      $query = $db->query('SELECT questions.*, levels.name FROM questions, levels WHERE questions.id_level = levels.id AND questions.id_quiz = '.$id);
      $query->bindValue(':id', $id);
      $query->execute();
      $questions = $query->fetchAll(\PDO::FETCH_CLASS, static::class);
      $questions = self::shuffleQuestions($questions);
      return $questions;
    }

    static public function shuffleQuestions($questions) {
      foreach ($questions as $question) {
        $question->answer = [];
        array_push($question->answer, $question->prop1);
        unset($question->prop1);
        array_push($question->answer, $question->prop2);
        unset($question->prop2);
        array_push($question->answer, $question->prop3);
        unset($question->prop3);
        array_push($question->answer, $question->prop4);
        unset($question->prop4);
        shuffle($question->answer);
      }
      return $questions;
    }

    static public function woshuffleQuestions($questions) {
      foreach ($questions as $question) {
        $question->answer = [];
        array_push($question->answer, $question->prop1);
        unset($question->prop1);
        array_push($question->answer, $question->prop2);
        unset($question->prop2);
        array_push($question->answer, $question->prop3);
        unset($question->prop3);
        array_push($question->answer, $question->prop4);
        unset($question->prop4);
      }
      return $questions;
    }

}

 ?>
