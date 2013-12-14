<div class="adminHeader">
	Materials
</div>
<div class="periodDayHolder">
		<span class="periodDayHead">Add Materials</span><br />
		Choose a unit
		<?php foreach ($courses as $course): ?>
		<div class="periodDayItem">
			<?php echo $course['Course']['name']; ?>
			<?php foreach ($course['Unit'] as $unit): ?>
			<div class="mUnitHolder<?php if ($unit['id'] == $course['Course']['active_unit']) { echo ' holderActive'; } ?>">
				<?php if ($unit['type'] == 2) { echo '<i>'; } ?>
				<?php echo $this->Html->link($unit['name'], '/panel/materials/add/'. $unit['id']); ?>
				<?php if ($unit['type'] == 2) { echo '</i>'; } ?>
			</div>
			<?php endforeach; ?>

		</div>
		<?php endforeach; ?>
</div>
<div class="periodDayHolder">
	Material Categories
	<?php foreach ($categories as $categories): ?>
	<div class="mCatHolder">
		<div class="matHolderLeft">
			<div class="mCatIcon">
				<?php echo $this->Html->image('uploads/mcat/'.$categories['MCategory']['icon'], array('alt' => $categories['MCategory']['name'])); ?>
			</div>
			<span style="color: #<?php echo $categories['MCategory']['color']; ?>">
				<?php echo $categories['MCategory']['name']; ?>
			</span>
		</div>
		<div class="matHolderRight">
				<?php echo $this->Html->link($this->Html->image('edit.png', array('alt' => 'Edit')), '/panel/m_categories/edit/'.$categories['MCategory']['id'], array('escape' => false)); ?>
		</div>
		<div class="clear"></div>
	</div>
	<?php endforeach; ?>
	<div class="adminButton">
		<?php echo $this->Html->link('Add a Category', '/panel/m_categories/add/'); ?>
	</div>
</div>
<div class="clear">
</div>