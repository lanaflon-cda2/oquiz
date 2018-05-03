<?php $this->layout('layouts/base', ['title' => 'Connexion']) ?>

<section class="container">
  <div class="row">
    <div id="signin-area" class="box col-md-6 col-md-offset-3">
      <p id="error"></p>
      <h1>Connexion</h1>
      <form id="signin-form" method="POST">
        <div class="form-group">
          <label for="ff_email">Email</label>
          <input type="text" name="email" class="form-control" id="ff_email" placeholder="Votre email...">
        </div>
        <div class="form-group">
          <label for="ff_pass">Mot de passe</label>
          <input type="password" name="password" class="form-control" id="ff_pass" placeholder="Votre mot de passe...">
        </div>
        <p>Pas encore inscrit ? N'hésitez pas <a href="">créer un compte</a></p>
        <button type="submit" name="sub" class="btn btn-primary">Se connecter</button>
      </form>
    </div>
  </div>
</section>
