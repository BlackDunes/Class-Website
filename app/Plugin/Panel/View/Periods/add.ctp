<div class="period form">
<?php echo $this->Form->create('Period'); ?>
    <fieldset>
        <legend><?php echo 'New Period for '.$course['Course']['name']; ?></legend>
        <?php echo $this->Form->hidden('course_id', array('default' => $courseId));
        echo $this->Form->input('ab');
        echo $this->Form->input('block');
        echo $this->Form->input('active');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>