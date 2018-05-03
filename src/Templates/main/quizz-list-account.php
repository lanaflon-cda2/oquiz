<li>
  <h2>
    <a href="<?=$router->generate('quizz_show', ['id' => $quizz->getId()])?>"><?=$quizz->getTitle()?></a>
  </h2>
  <p>
      <?=$quizz->getDescription()?>
  </p>
</li>
