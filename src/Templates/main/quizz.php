<?php $this->layout('layouts/base', ['title' => 'Quizz '.$quizz->getTitle()]); ?>

<main id="quizz-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-10 col-xs-offset-1">
          <h1><?=$quizz->getTitle() ?></h1>
          <span><?php echo count($questions)?> questions</span>
          <h2><?=$quizz->getDescription() ?></h2>
          <p>by <?=$quizz->getFirstNameAuthor()?> <?=$quizz->getLastNameAuthor()?></p>
          <p class="intro-quizz">Nouveau jeu : Répondez au maximum de questions avant de valider !</p>
          <?php if($user): ?>
          <?php $this->insert('main/quizz-form', ['quizz' => $quizz, 'questions' => $questions, 'questionsWoShuffle' => $questionsWoShuffle, 'form' => $form, 'resultat' => $resultat]) ?>
          <?php else: ?>
          <p class="erreur-quizz">Vous devez d'abord vous connectez pour jouer !</p>
          <?php $this->insert('main/quizz-wo-form', ['questions' => $questions]) ?>
          <?php endif ?>
      </div>
    </div>
  </div>
</main>
