<div class="unit form">
<?php echo $this->Form->create('Unit'); ?>
    <fieldset>
        <legend><?php echo 'New Unit for '.$course['Course']['name']; ?></legend>
        <?php echo $this->Form->hidden('course_id', array('default' => $courseId));
        echo $this->Form->input('name');
        echo $this->Form->input('type', array('options' => array('1' => 'Concept', '2' => 'Book'), 'label' => 'Unit Type'));
        echo $this->Form->input('author', array('label' => 'Book Author (If applicable)'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>