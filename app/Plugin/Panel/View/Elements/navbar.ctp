<div id="navigation">
<?php $counter = 1; ?>
<?php foreach ($theModels as $model): ?>
	<div class="navElement 
<?php if ($counter % 2 == 0): ?>
<?php echo "nav1" ?>
<?php else: ?>
<?php echo "nav2" ?>
<?php endif; ?>
<?php ++$counter; ?>"> 
<?php echo $this->Html->link($model,
array('controller' => $model, 'action' => 'index')); ?>
</div>
<?php endforeach; ?>
<div class="navElement">
	<?php echo $this->Html->link('Log Out',
'/users/logout'); ?>
</div>
</div>