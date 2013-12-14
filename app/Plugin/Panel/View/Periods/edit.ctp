<div class="period form">
<?php echo $this->Form->create('Period'); ?>
    <fieldset>
        <legend><?php echo 'Edit Period'; ?></legend>
        <?php echo $this->Form->input('ab');
        echo $this->Form->input('block');
        echo $this->Form->input('active');
        echo $this->Form->input('id', array('type' => 'hidden'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>