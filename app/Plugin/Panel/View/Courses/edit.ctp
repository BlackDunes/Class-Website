<div class="course form">
<?php echo $this->Form->create('Course'); ?>
    <fieldset>
        <legend><?php echo 'Edit Course'; ?></legend>
        <?php echo $this->Form->input('name');
        echo $this->Form->input('grade');
        echo $this->Form->input('journal');
        echo $this->Form->input('active');
        echo $this->Form->input('description');
        echo $this->Form->input('id', array('type' => 'hidden'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>