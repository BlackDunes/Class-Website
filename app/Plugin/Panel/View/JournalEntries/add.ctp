<div class="journal_entry form">
<?php echo $this->Form->create('JournalEntry'); ?>
    <fieldset>
        <legend><?php echo 'New Journal Entry for '.$course['Course']['name']; ?></legend>
        <?php echo $this->Form->hidden('course_id', array('default' => $courseId));
        echo $this->Form->input('active');
        echo $this->Form->input('number');
        echo $this->Form->input('date');
        echo $this->Form->input('entry');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>