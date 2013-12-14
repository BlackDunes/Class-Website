<div class="unit form">
<?php echo $this->Form->create('Unit'); ?>
    <fieldset>
        <legend><?php echo 'Edit Unit: '.$unit['Unit']['name']; ?></legend>
        <?php echo $this->Form->input('name');
        echo $this->Form->input('type', array('options' => array('1' => 'Concept', '2' => 'Book'), 'label' => 'Unit Type'));
        echo $this->Form->input('author', array('label' => 'Book Author (If applicable)'));
        echo $this->Form->input('id', array('type' => 'hidden'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>