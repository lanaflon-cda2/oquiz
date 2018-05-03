<?php if($form): ?>
<p class="resultat">Votre score : <?php echo $resultat ?> / <?php echo count($questions) ?>
    <a href="<?=$router->generate('quizz_show', ['id' => $quizz->getId()])?>">Rejouer</a>
</p>
<?php endif ?>
<form class="quizz-form" method="POST">
		<?php for ($i = 0 ; $i < count($questions) ; $i++): ?>
				<div class="quizz-card">
                    <?php if($form): ?>
                        <?php if($_POST[$i] == $questionsWoShuffle[$i]->answer[0]): ?>
                            <div class="header-card-green">
                        <?php elseif($_POST[$i] == "noanswer"): ?>
                            <div class="header-card">
                        <?php else: ?>
                            <div class="header-card-red">
                        <?php endif ?>
                    <?php else: ?>
                        <div class="header-card">
                    <?php endif ?>
						<div class="question">
								<p><?=$questions[$i]->getQuestion() ?></p>
								<p class="<?php echo $questions[$i]->getName() == "Débutant" ? "green" : $questions[$i]->getName() == "Confirmé" ? 'orange' : "red"; ?>"><?=$questions[$i]->getName() ?></p>
						</div>
					</div>
					<div class="body-card">
							<?php for($j = 0 ; $j < count($questions[$i]->answer) + 1 ; $j++): ?>
                                <?php if($j < 4): ?>
									<label>
                                        <input type="radio" name="<?=$questions[$i]->getId()?>" value="<?=$questions[$i]->answer[$j]?>"><?=$questions[$i]->answer[$j]?>
                                    </label>
                                <?php else: ?>
                                    <label>
                                        <input class="tohide" type="radio" name="<?=$questions[$i]->getId()?>" value="noanswer" checked="checked">
                                    </label>
                                <?php endif ?>
							<?php endfor; ?>
                            <?php if($form): ?>
                                <?php if($_POST[$i] !== "noanswer"): ?>
                                    <p><?=$questions[$i]->getAnecdote()?></p>
                                    <p><?=$questions[$i]->getWiki()?></p>
                                <?php endif; ?>
                            <?php endif; ?>
					</div>
				</div>
		<?php endfor; ?>
        <input type="hidden" name="formsent" value="true">
		<button class="btn btn-primary" type="submit"><?php echo $form ? "Rejouer" : "OK"?></button>
</form>
