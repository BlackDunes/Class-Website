<div class="adminHeader">
	Materials
</div>
<div class="periodDayHolder">
		<span class="periodDayHead">Add Materials</span><br />
		Choose a course
		<?php foreach ($courses as $courses): ?>
		<div class="periodDayItem">
			<?php echo $this->Html->link($courses['Courses']['name'],
'/panel/materials/add/'.$courses['Courses']['id']); ?>
		</div>
		<?php endforeach; ?>
</div>
<div class="periodDayHolder">
	Material Categories
	<?php foreach ($categories as $categories): ?>
	<div class="mCatHolder">
		<div class="mCatIcon">
			<?php echo $this->Html->image('uploads/mcat/'.$categories['MCategories']['icon'], array('alt' => $categories['MCategories']['name'])); ?>
		</div>
		<span style="color: #<?php echo $categories['MCategories']['color']; ?>">
		<?php echo $categories['MCategories']['name']; ?>
		</span>
	</div>
	<?php endforeach; ?>
	<div class="periodDayItem">
		<?php echo $this->Html->link('Add a Category', '/panel/m_categories/add/'); ?>
	</div>
</div>
<div class="clear">
</div>