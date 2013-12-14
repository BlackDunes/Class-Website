<div class="adminHeader">
	Journal Entries
</div>
Choose a course
	<?php foreach ($courses as $course): ?>
	<div class="contentWidthItem<?php if ($course['Course']['active'] == 0) { echo ' itemInactive'; } ?>">
		<?php echo $this->Html->link($course['Course']['name'], '/panel/journal_entries/course/'.$course['Course']['id']); ?>
		<div class="clear"></div>
	</div>
	<?php endforeach; ?>

<div class="clear">
</div>