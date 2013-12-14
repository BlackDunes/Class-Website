<div class="course form">
<?php echo $this->Form->create('Course'); ?>
    <fieldset>
        <legend><?php echo 'Create Course'; ?></legend>
        <?php echo $this->Form->input('name');
        echo $this->Form->input('grade');
        echo $this->Form->input('journal');
        echo $this->Form->input('active');
        echo $this->Form->input('description');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>