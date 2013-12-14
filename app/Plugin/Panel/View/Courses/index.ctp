<div class="adminHeader">
	Courses
</div>
<div class="adminButton"><?php echo $this->Html->link('Add Course',
'/panel/courses/add/'); ?></div>
Select a course to view & edit periods
	<?php foreach ($courses as $course): ?>
	<div class="contentWidthItem<?php if ($course['Course']['active'] == 0) { echo ' itemInactive'; } ?>">
		<?php echo $this->Html->link($course['Course']['name'], '/panel/courses/periods/'.$course['Course']['id']); ?>
		<?php $num = count($course['Period']); ?>
		<div class="contentWidthRight">
			<?php echo $this->Html->link($this->Html->image('edit.png', array('alt' => 'Edit')), '/panel/courses/edit/'.$course['Course']['id'], array('escape' => false)); ?>
				<?php echo $this->Html->link($this->Html->image('delete.png', array('alt' => 'Delete')), '/panel/courses/delete/'.$course['Course']['id'], array('escape' => false), "Are you sure you wish to delete ". $course['Course']['name']."?"); ?>
				<?php echo $num; ?></div>
		<div class="clear"></div>
	</div>
	<?php endforeach; ?>

<div class="clear">
</div>