<div class="period form">
<?php echo $this->Form->create('Period'); ?>
    <fieldset>
        <legend><?php echo 'New Period for '.$course['Course']['name']; ?></legend>
        <?php echo $this->Form->hidden('course_id', array('default' => $courseId));
        echo $this->Form->input('ab', array(
    'options' => array('A' => 'A', 'B' => 'B'),
    'empty' => '(choose one)',
    'label' => 'A or B Day'
));
        echo $this->Form->input('block', array(
    'options' => array(1 => 1, 2 => 2, 4 => 4, 5 => 5),
    'empty' => '(choose one)'
));
        $thisYear = date('Y');
        $lastYear = $thisYear - 1;
        $nextYear = $thisYear + 1;
        $veryNextYear = $thisYear + 2;

        echo $this->Form->input('year', array(
    'type' => 'year',
    'label' => 'School Year'
));
        echo $this->Form->input('active');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>