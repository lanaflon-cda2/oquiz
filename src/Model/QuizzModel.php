<?php

namespace Oquizz\Model;

class QuizzModel
{
    private $id;
    private $title;
    private $description;
    private $id_author;
    private $firstName;
    private $lastName;

    // private $members;



    public function getId()
    {
        return $this->id;
    }


    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getIdAuthor()
    {
        return $this->id_author;
    }

    public function getFirstNameAuthor()
    {
        return $this->first_name;
    }

    public function getLastNameAuthor()
    {
        return $this->last_name;
    }

    static public function findAll() {
      $db = Database::getDB();
      $query = $db->query('SELECT quizzes.*, users.first_name, users.last_name, users.email, users.password FROM quizzes LEFT JOIN users ON quizzes.id_author = users.id');
      $quizzes = $query->fetchAll(\PDO::FETCH_CLASS, static::class);

      return $quizzes;
    }

    static public function findAllById($id) {
      $db = Database::getDB();
      $query = $db->query('SELECT quizzes.* FROM quizzes WHERE quizzes.id_author = '.$id);
    //   $query->bindValue(':id', $id);
    //   $query->execute();
      $quizzes = $query->fetchAll(\PDO::FETCH_CLASS, static::class);

      return $quizzes;
    }

    static public function findById($id) {
      $db = Database::getDB();
      $query = $db->prepare('SELECT * FROM quizzes LEFT JOIN users ON quizzes.id_author = users.id AND quizzes.id = :id LIMIT 1');
      $query->bindValue(':id', $id);
      $query->execute();
      $quizz = $query->fetchObject(static::class);

      return $quizz;
    }

}

 ?>
