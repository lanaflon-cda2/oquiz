<?php $this->layout('layouts/base', ['title' => 'Oquizz welcome']); ?>

<main class="home">
  <section class="container-fluid">
    <div class="row">
      <div class="col-xs-10 col-xs-offset-1">
        <h1>Bienvenue sur O'quizz</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque scelerisque suscipit nibh quis porttitor. Integer iaculis mi urna, a pulvinar quam adipiscing ut. Vivamus vel vestibulum mauris. Nam sed est a orci iaculis mattis eu non ante. Maecenas at imperdiet quam. Donec sit amet arcu accumsan, posuere nulla at, pretium metus. Integer adipiscing tellus dolor, sed vestibulum purus congue eget. Fusce at tincidunt lacus, nec tincidunt eros. Vivamus aliquet purus non tincidunt posuere.</p>
      </div>
    </div>
  </section>
  <section class="container-fluid">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
          <ul class="list-inline">
              <?php foreach ($quizzes as $quizz) : ?>
                  <?php $this->insert('main/quizz-list', ['quizz' => $quizz]) ?>
              <?php endforeach; ?>
          </ul>
      </div>
    </div>
  </section>
</main>
