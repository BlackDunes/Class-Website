<div class="m_categories form">
<?php echo $this->Form->create('MCategory', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php echo 'New Material Category'; ?></legend>
        <?php echo $this->Form->input('name');
        echo $this->Form->input('color');
        echo $this->Form->input('icon', array('type' => 'file', 'label' => 'Icon (should be from the Fugue set of icons'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>