		<?php foreach ($questions as $question): ?>
				<div class="quizz-card">
					<div class="header-card">
						<div class="question">
								<p><?=$question->getQuestion() ?></p>
								<p class="<?php echo $question->getName() == "Débutant" ? "green" : $question->getName() == "Confirmé" ? 'orange' : "red"; ?>"><?=$question->getName() ?></p>
						</div>
					</div>
					<div class="body-card">
						<ol>
							<?php for($i = 0 ; $i < count($question->answer) ; $i++): ?>
									<li><?=$question->answer[$i]?></li>
							<?php endfor; ?>
						</ol>

					</div>
				</div>
		<?php endforeach; ?>
