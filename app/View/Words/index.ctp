<?php
	$filters = array(
		0 => __('All'),
		1 => __('Learned'),
		2 => __('Not learned')
	);
	
	echo $this->Form->create('Word', array(
		'type' => 'get',
		'inputDefaults' => array(
			'div' => FALSE,
			'class' => 'contact',
			'between' => '<p>',
			'after' => '</p>'
		)
	));
?>
<div class="form_settings">
	<table width="100%">
		<tr>
			<td>
				<?php echo $this->Form->input('category', array(
					'options' => $categories,
					'default' => $queryStr["category"]
				)); ?>
			</td>
			<td>
				<?php
					echo $this->Form->input('learn', array(
						'options' => $filters,
						'default' => $queryStr["learn"]
					));
				?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php
					echo $this->Form->button(__('Filter'), array(
						'class' => 'submit',
						'label' => FALSE
					));
				?>
			</td>
		</tr>
	</table>
</div>
<?php echo $this->Form->end(); ?>
<hr />
<table width="100%">
	<thead>
		<tr>
			<th><?php echo __('Phrase'); ?></th>
			<th><?php echo __('Definition'); ?></th>
		</tr>
	</thead>
<?php
	if (count($words) > 0) :
		foreach ($words as $word) :
?>
	<tr>
		<td><?php echo $word["Word"]["phrase"]; ?></td>
		<td><?php echo $word["Word"]["definition"]; ?></td>
	</tr>
<?php
		endforeach;
?>
	<tr>
		<td colspan="2" class="pagination">
			<?php
				echo $this->Paginator->first(__('First'));
				echo $this->Paginator->numbers(array('separator' => FALSE));
				echo $this->Paginator->last(__('Last'));
			?>
		</td>
	</tr>
<?php
	else :
?>
	<tr>
		<td colspan="2">
			<?php echo __('Lonely here :/'); ?>
		</td>
	</tr>
<?php
	endif;
?>
</table>