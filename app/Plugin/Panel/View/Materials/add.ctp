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
			<div class="matHolderLeft">
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
			<div class="matHolderRight">
				<?php echo $this->Html->link($this->Html->image('delete.png', array('alt' => 'Delete')), '/panel/materials/delete/'.$material['Material']['id'], array('escape' => false), "Are you sure you wish to delete ". $material['Material']['name']."?"); ?>
				<?php echo $this->Html->link($this->Html->image('private.png', array('alt' => 'Make Private')), '/panel/materials/toggle_private/'.$material['Material']['id'], array('escape' => false)); ?>
				<?php echo $this->Html->link($this->Html->image('inactive.png', array('alt' => 'Make Inactive')), '/panel/materials/toggle_active/'.$material['Material']['id'], array('escape' => false)); ?>
			</div>
			<div class="clear"></div>
		</div>
		<?php endforeach; ?>
	</div>
	<div class="mDivider">
		Public & Inactive:
		<?php foreach ($m_inactive_public as $material): ?>
		<div class="mCatHolder">
			<div class="matHolderLeft">
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
			<div class="matHolderRight">
				<?php echo $this->Html->link($this->Html->image('delete.png', array('alt' => 'Delete')), '/panel/materials/delete/'.$material['Material']['id'], array('escape' => false), "Are you sure you wish to delete ". $material['Material']['name']."?"); ?>
				<?php echo $this->Html->link($this->Html->image('private.png', array('alt' => 'Make Private')), '/panel/materials/toggle_private/'.$material['Material']['id'], array('escape' => false)); ?>
				<?php echo $this->Html->link($this->Html->image('active.png', array('alt' => 'Make Active')), '/panel/materials/toggle_active/'.$material['Material']['id'], array('escape' => false)); ?>
			</div>
			<div class="clear"></div>
		</div>
		<?php endforeach; ?>
	</div>
	<div class="mDivider">
		Private:
		<?php foreach ($m_private as $material): ?>
		<div class="mCatHolder">
			<div class="matHolderLeft">
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
			<div class="matHolderRight">
				<?php echo $this->Html->link($this->Html->image('delete.png', array('alt' => 'Delete')), '/panel/materials/delete/'.$material['Material']['id'], array('escape' => false), "Are you sure you wish to delete ". $material['Material']['name']."?"); ?>
				<?php echo $this->Html->link($this->Html->image('public.png', array('alt' => 'Make Public')), '/panel/materials/toggle_private/'.$material['Material']['id'], array('escape' => false)); ?>
			</div>
			<div class="clear"></div>
		</div>
		<?php endforeach; ?>
	</div>
	</div>
<div class="clear">
</div>