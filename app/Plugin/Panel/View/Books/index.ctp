<div class="adminHeader">
	Books of the Week
</div>
<?php foreach ($theBooks as $book): ?>
	<div class="bookWeek">
	<?php echo $book['weekOf']; ?>
	</div>
	<div class="
	<?php if (isset($book['Book']['title'])): ?>
	<?php echo 'bookHolder">'; ?>
	<?php echo $this->Html->link($book['Book']['title'], array('controller' => 'books', 'action' => 'view', $book['Book']['week'])); ?>
	<?php else: ?>
	<?php echo 'bookHolderIncomplete">'; ?>
	<?php echo $this->Html->link('Add Book', array('controller' => 'books', 'action' => 'add', $book['weekNum'])); ?>
	<?php endif; ?>
	</div>
	<div class="clear"></div>
<?php endforeach ?>
