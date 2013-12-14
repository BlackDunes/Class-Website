<div class="adminHeader">
	Journal Entries: <?php echo $course['Course']['name']; ?>
</div>
<div class="adminButton"><?php echo $this->Html->link('Add Journal Entry',
'/panel/journal_entries/add/'.$course['Course']['id']); ?></div>
<?php foreach ($entries as $entry): ?>
<?php if ($entry['JournalEntry']['active'] == 1): ?>
<div class="contentWidthItem">
	<div class="journalEntryNumber">
		<?php echo $entry['JournalEntry']['number']; ?>
	</div>
	<div class="journalEntryEntry">
		<?php echo $entry['JournalEntry']['entry']; ?>
		<?php $nicedate = date('M j Y', strtotime($entry['JournalEntry']['date'])); ?><br />
		<span class="journalEntryDate"><?php echo $nicedate; ?></span>
	</div>
	<div class="contentWidthRight">
		<?php echo $this->Html->link($this->Html->image('edit.png', array('alt' => 'Edit')), '/panel/journal_entries/edit/'.$entry['JournalEntry']['id'], array('escape' => false)); ?>
		<?php echo $this->Html->link($this->Html->image('delete.png', array('alt' => 'Delete')), '/panel/journal_entries/delete/'.$entry['JournalEntry']['id'], array('escape' => false), "Are you sure you wish to delete this entry?"); ?>
		<?php echo $this->Html->link($this->Html->image('inactive.png', array('alt' => 'Make Inactive')), '/panel/journal_entries/make_inactive/'.$entry['JournalEntry']['id'], array('escape' => false)); ?>
	</div>
	<div class="clear"></div>
</div>
<?php endif; ?>
<?php if ($entry['JournalEntry']['active'] == 0): ?>
<div class="contentWidthItem itemInactive">
	<div class="contentWidthLeft journalEntryInactive">
		<?php echo $entry['JournalEntry']['entry']; ?>
	</div>
	<div class="contentWidthRight">
		<?php echo $this->Html->link($this->Html->image('edit.png', array('alt' => 'Edit')), '/panel/journal_entries/edit/'.$entry['JournalEntry']['id'], array('escape' => false)); ?>
		<?php echo $this->Html->link($this->Html->image('delete.png', array('alt' => 'Delete')), '/panel/journal_entries/delete/'.$entry['JournalEntry']['id'], array('escape' => false), "Are you sure you wish to delete this entry?"); ?>
	</div>
	<div class="clear"></div>
</div>
<?php endif; ?>
<?php endforeach; ?>