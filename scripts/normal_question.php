<div class="row">
			<div class="col-md-6">
				<?php echo "<b>Question. </b>"; echo $info['question']; ?>			
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-md-6">
				<table class="table">
				<?php
					$qry = mysqli_query($connection, "select * from answers where question = '".$info['id']."'");
					while($answer = mysqli_fetch_array($qry)){
				?>
					<tr class="text-primary">
						
						<td width="1%">
						<?php echo $answer['option']; ?>
						</td>
						
						<td>
						<div class="options">
						<input required type="radio" id="<?php echo $answer['option']; ?>" name="answer" class="custom-control-input">
								<label class="custom-control-label" for="answer"><?php echo $answer['answer']; ?></label>
						</div>
						</td>
						
						
					</tr>
				<?php
					}
					?>
					
					
					<?php
					$a = mysqli_query($connection, "select * from answers where question = '".$info['id']."' and state='correct'");
					$b = mysqli_fetch_array($a);
					$option = $b['option'];
					$correct = $b['answer'];
				?>
				
					<tr>
					<td>
					
					</td>
					<td>
					<div class="your_choice" hidden></div>
					<div class="the_answer" hidden><hr>The correct answer is <?php echo $option.". ".$correct; ?></div>
					</td>
					
					</tr>
				</table>
						<button class="btn btn-success btn-xs checkAnswer">Submit Answer</button>
						<button class="btn btn-success btn-xs nextQuestion hidden">Next Question</button>						
			</div>
			
			<div class="col-md-6" id="read_more" hidden>
				<b><u>Read More On <?php echo $info['topic']; ?></u></b>
				<hr>
				
				<ul>
				<?php
				$t=mysqli_query($connection, "select * from topics where topic='".$info['topic']."'");
				while($g=mysqli_fetch_array($t)){
				?>
					<li><a href=""><?php echo $g['subject']; ?></a></li>
				<?php
				}
				?>
				</ul>
			</div>
		</div>