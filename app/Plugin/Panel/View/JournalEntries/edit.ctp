<div class="journal_entry form">
<?php echo $this->Form->create('JournalEntry'); ?>
    <fieldset>
        <legend><?php echo 'Edit Journal Entry'; ?></legend>
        <?php echo $this->Form->input('id', array('type' => 'hidden'));
        echo $this->Form->input('active');
        echo $this->Form->input('number');
        echo $this->Form->input('date');
        echo $this->Form->input('entry');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>