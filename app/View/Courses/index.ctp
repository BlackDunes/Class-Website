<div class="theLeftSide">
	<div class="mediumHeader">Class Websites</div>
	<?php foreach ($courses as $course): ?>
	<div class="classcontainer">
		<div class="classname">
			<?php echo $course['Course']['name']; ?>
		</div>

		<?php foreach ($course['Period'] as $period): ?>
			<div class="classperiod">
				<?php echo $this->Html->link($period['name'], array('controller' => 'periods', 'action' => 'view', $period['id'])); ?>
			</div>
		<?php endforeach; ?>

		<div class="clear"></div>
	</div>
	<br />
	<?php endforeach; ?>
	<?php unset($course); ?>
</div>
<div class="theRightSide">
	<div class="mediumHeaderRight">Book of the Week</div>
	<div class="bookHolder">
		<div class="bookTitle">
			<?php echo $ourBook['Books']['title']; ?>
		</div>
		<div class="bookCover">
			<?php echo $this->Html->image('uploads/book/'.$ourBook['Books']['cover'], array('alt' => $ourBook['Books']['title'])); ?>
		</div>
		<div class="bookAuthor">
			By <?php echo $ourBook['Books']['author']; ?>
		</div>
	</div>
</div>
<div class="clear"></div>