<?php
namespace Oquizz\Controller;

use Oquizz\Model\QuizzModel;
use Oquizz\Model\QuestionModel;

class MainController extends CoreController
{
    public function homeAction()
    {
        $quizzes = QuizzModel::findAll();
        echo $this->templateEngine->render('main/home', [
            'quizzes' => $quizzes
        ]);
    }

    public function accountAction($params)
    {
        $quizzes = QuizzModel::findAllById($params['id']);
        echo $this->templateEngine->render('main/account', [
            'quizzes' => $quizzes
        ]);
    }

    public function quizzAction($params)
    {
        $quizz = QuizzModel::findById($params['id']);
        $questions = QuestionModel::findAllQuestionById($params['id']);
        $questionsWoShuffle = QuestionModel::findAllQuestionByIdWoShuffle($params['id']);

        if(isset($_POST['formsent'])){
            $form = true;
            $_POST = array_values($_POST);
            $resultat = 0;
            for($i = 0 ; $i < count($questions) ; $i++){
                if($_POST[$i] == $questionsWoShuffle[$i]->answer[0]){
                    $resultat++;
                }
            }
            echo $this->templateEngine->render('main/quizz', [
                'quizz' => $quizz,
                'questionsWoShuffle' => $questionsWoShuffle,
                'questions' => $questions,
                'form' => $form,
                'resultat' => $resultat
            ]);
        } else {
            $form = false;
            $resultat = 0;
            echo $this->templateEngine->render('main/quizz', [
                'quizz' => $quizz,
                'questionsWoShuffle' => $questionsWoShuffle,
                'questions' => $questions,
                'form' => $form,
                'resultat' => $resultat
            ]);
        }
    }

  }
