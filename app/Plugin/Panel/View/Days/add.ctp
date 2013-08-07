<div class="days form">
<?php echo $this->Form->create('Day'); ?>
    <fieldset>
        <legend><?php echo 'Add Day: ' . $nicedate; ?></legend>
        <?php echo $this->Form->hidden('date', array('default' => $date));
        echo $this->Form->input('noschool', array('options' => array('0' => 'Yup', '1' => 'Nope'), 'label' => 'Is there school?'));
        echo $this->Form->input('ab', array('options' => array('0' => 'N/A', 'A' => 'A Day', 'B' => 'B Day'), 'label' => 'A or B Day?'));
        echo $this->Form->input('halfday', array('options' => array('0' => 'Nope', '1' => 'Yup'), 'label' => 'Is it a half day?'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>