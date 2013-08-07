<div class="mediumHeader">View Book: Week <?php echo $week; ?></div>
<div class="bookView">
		<div class="bookTitle">
			<?php echo $ourBook['Book']['title']; ?>
		</div>
		<div class="bookCover">
			<?php echo $this->Html->image('uploads/book/'.$ourBook['Book']['cover'], array('alt' => $ourBook['Book']['title'])); ?>
		</div>
		<div class="bookAuthor">
			By <?php echo $ourBook['Book']['author']; ?>
		</div>
	</div>