<header>
    <section class="container-fluid">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <p class="logo"><a href="<?=$router->generate('home')?>">O'quiz</a></p>
                <nav>
                    <ul class="list-inline">
                        <li><a href="#">Bonjour <?php echo $user ? $user->first_name : "" ?></a></li>
                        <li><a href="<?=$router->generate('home')?>">Accueil</a></li>
                        <li>
                            <?php if($user): ?>
                                <a href="<?=$router->generate('account', ['id' => $user->id])?>">Mon compte</a>
                            <?php else: ?>
                                <a href="<?=$router->generate('user_login')?>">Mon compte</a>
                            <?php endif ?>
                        </li>
                        <li>
                            <?php if($user): ?>
                                <a href="<?=$router->generate('user_logout')?>">Déconnexion</a>
                            <?php else: ?>
                                <a href="<?=$router->generate('user_login')?>">Connexion</a>
                            <?php endif ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
</header>
