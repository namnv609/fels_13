<?php
	if (!isset($queryStr["category"])) {
		$queryStr["category"] = "";
	}
	if( !isset($queryStr["keyword"])) {
		$queryStr["keyword"] = "";
	}
	
	echo $this->Form->create('Word', array(
		'class' => 'form-horizontal',
		'type' => 'get',
		'inputDefaults' => array(
			'div' => FALSE,
			'class' => 'form-control',
			'label' => FALSE
		),
		'autocomplete' => 'off'
	));
?>
<div class="form-group">
	<label class="control-label col-md-2"><?php echo __('Search & Filter'); ?></label>
	<div class="col-md-5">
		<?php
			echo $this->Form->input('keyword', array(
				'default' => $queryStr["keyword"]
			)); 
		?>
	</div>
	<div class="col-md-3">
		<?php
			echo $this->Form->input('category', array(
				'type' => 'select',
				'options' => $categories,
				'default' => $queryStr["category"]
			));
		?>
	</div>
	<div class="col-md-2">
		<?php echo $this->Form->button(__('Search'), array(
			'class' => 'btn btn-primary btn-success form-control'
		)); ?>
	</div>
</div>
<?php echo $this->Form->end(); ?>
<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Phrase</th>
				<th>Definition</th>
				<th>Created</th>
				<th>Modified</th>
				<th>Category</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
				if (count($words) > 0) :
					foreach($words as $word) :
			?>
			<tr>
				<td>
					<?php echo $word["Word"]["id"]; ?>
				</td>
				<td>
					<?php echo $word["Word"]["phrase"]; ?>
				</td>
				<td>
					<?php echo $word["Word"]["definition"]; ?>
				</td>
				<td>
					<?php echo $word["Word"]["created"]; ?>
				</td>
				<td>
					<?php echo $word["Word"]["modified"]; ?>
				</td>
				<td>
					<?php echo $word["Category"]["name"]; ?>
				</td>
				<td>
					<?php
						echo $this->Html->link(
							'<i class="fa fa-pencil"></i>',
							ADMIN_ALIAS . '/edit-word-' . $word["Word"]["id"],
							array(
								"escape" => FALSE,
								"class" => "btn btn-primary btn-sm"
							)
						);
					?>
				</td>
			</tr>
			<?php
					endforeach;
				else :
			?>
			<tr>
				<td colspan="7">
					<?php
						echo __('(no words). You can add new ') .
							$this->Html->link(__('here'), ADMIN_ALIAS . '/add-new-words');
					?>
				</td>
			</tr>
			<?php endif; ?>
		</tbody>
	</table>
</div>
<div class="datatable-footer">
	<div class="pagination dataTables_paginate pull-right">
		<?php
			echo $this->Paginator->prev(__('Previous'), array('tag' => 'li'));
			echo $this->Paginator->numbers(array('tag' => 'li'));
			echo $this->Paginator->next(__('Next'), array('tag' => 'li'));
		?>
	</div>
</div>