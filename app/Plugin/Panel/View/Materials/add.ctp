<div class="adminHeader">
	Materials: <?php echo $unit['Course']['name']; ?>, <?php echo $unit['Unit']['name']; ?>
</div>
<div class="periodDayHolder">
		<?php echo $this->Form->create('Material', array('type' => 'file')); ?>
    <fieldset class="addMaterials">
        <legend><?php echo 'Add Material'; ?></legend>
        <?php echo $this->Form->hidden('unit_id', array('default' => $unit['Unit']['id']));
        echo $this->Form->input('m_category_id', array('label' => 'Category'));
        echo $this->Form->input('name');
        echo $this->Form->input('local');
        echo $this->Form->input('file', array('type' => 'file', 'label' => 'File (if local)'));
        echo $this->Form->input('url', array('label' => 'URL (if not local)'));
        echo $this->Form->input('public');
        echo $this->Form->input('active');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>

</div>
<div class="periodDayHolder">
	<div class="mDivider">
		Public & Active:
		<?php foreach ($m_active_public as $material): ?>
		<div class="mCatHolder">
			<div class="mCatIcon">
				<?php echo $this->Html->image('uploads/mcat/'.$material['MCategory']['icon'], array('alt' => $material['MCategory']['name'])); ?>
			</div>
			<span style="color: #<?php echo $material['MCategory']['color']; ?>">
			<?php if ($material['Material']['local'] == 1): ?>
			<?php echo $this->Html->link($material['Material']['name'], '/files/uploads/materials/'. $unit['Unit']['id'].'/'.$material['Material']['file'], array('target' => '_blank')); ?>
			<?php else: ?>
			<?php echo $this->Html->link($material['Material']['name'], $material['Material']['url'], array('target' => '_blank')); ?>
			<?php endif; ?>
			</span>
		</div>
		<?php endforeach; ?>
	</div>
	<div class="mDivider">
		Public & Inactive:
		<?php foreach ($m_inactive_public as $material): ?>
		<div class="mCatHolder">
			<div class="mCatIcon">
				<?php echo $this->Html->image('uploads/mcat/'.$material['MCategory']['icon'], array('alt' => $material['MCategory']['name'])); ?>
			</div>
			<span style="color: #<?php echo $material['MCategory']['color']; ?>">
			<?php if ($material['Material']['local'] == 1): ?>
			<?php echo $this->Html->link($material['Material']['name'], '/files/uploads/materials/'. $unit['Unit']['id'].'/'.$material['Material']['file'], array('target' => '_blank')); ?>
			<?php else: ?>
			<?php echo $this->Html->link($material['Material']['name'], $material['Material']['url'], array('target' => '_blank')); ?>
			<?php endif; ?>
			</span>
		</div>
		<?php endforeach; ?>
	</div>
	<div class="mDivider">
		Private:
		<?php foreach ($m_private as $material): ?>
		<div class="mCatHolder">
			<div class="mCatIcon">
				<?php echo $this->Html->image('uploads/mcat/'.$material['MCategory']['icon'], array('alt' => $material['MCategory']['name'])); ?>
			</div>
			<span style="color: #<?php echo $material['MCategory']['color']; ?>">
			<?php if ($material['Material']['local'] == 1): ?>
			<?php echo $this->Html->link($material['Material']['name'], '/files/uploads/materials/'. $unit['Unit']['id'].'/'.$material['Material']['file'], array('target' => '_blank')); ?>
			<?php else: ?>
			<?php echo $this->Html->link($material['Material']['name'], $material['Material']['url'], array('target' => '_blank')); ?>
			<?php endif; ?>
			</span>
		</div>
		<?php endforeach; ?>
	</div>
	</div>
<div class="clear">
</div>