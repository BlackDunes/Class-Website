<div class="m_categories form">
<?php echo $this->Form->create('MCategory'); ?>
    <fieldset>
        <legend><?php echo 'Edit Material Category'; ?></legend>
        <?php echo $this->Form->input('name');
        echo $this->Form->input('color');
        echo $this->Form->input('id', array('type' => 'hidden'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>