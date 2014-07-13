<div class="classHeader">
	HAVE A GREAT SUMMER!
</div>
<div class="sLandingDesc">
	If you would like to get in touch with me, my e-mail address is found at the bottom of this page.</br >
	While enjoying your summer, check out some of the books below!
</div>
<?php foreach ($randBooks as $book): ?>
<div class="bookHolderSummer">
		<div class="bookTitle">
			<?php echo $book['Book']['title']; ?>
		</div>
		<div class="bookCover">
			<?php echo $this->Html->image('uploads/book/'.$book['Book']['cover'], array('alt' => $book['Book']['title'])); ?>
		</div>
		<div class="bookAuthor">
			By <?php echo $book['Book']['author']; ?>
		</div>
	</div>
<?php endforeach; ?>

<div class="clear">
</div>

