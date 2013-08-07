<div class="books form">
<?php echo $this->Form->create('Book', array('type' => 'file')); ?>
    <fieldset>
        <legend><?php echo 'Book of the Week for Week #' . $week; ?></legend>
        <?php echo $this->Form->hidden('week', array('default' => $week));
        echo $this->Form->input('title');
        echo $this->Form->input('author');
        echo $this->Form->input('cover', array('type' => 'file', 'label' => 'Book Cover Image (width of 250px, height of 300-400px)'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>