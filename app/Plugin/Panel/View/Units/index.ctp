<div class="adminHeader">
	Units
</div>

Choose a course
	<?php foreach ($courses as $course): ?>
	<div class="contentWidthItem<?php if ($course['Course']['active'] == 0) { echo ' itemInactive'; } ?>">
		<?php echo $this->Html->link($course['Course']['name'], '/panel/units/course/'.$course['Course']['id']); ?>
		<?php $num = count($course['Unit']); ?>
		<div class="contentWidthRight"><?php echo $num; ?></div>
		<div class="clear"></div>
	</div>
	<?php endforeach; ?>

<div class="clear">
</div>