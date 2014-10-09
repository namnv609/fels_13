<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Phrase</th>
				<th>Created</th>
				<th>Modified</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if (count($lessons) > 0) :
					foreach($lessons as $lesson) :
			?>
			<tr>
				<td>
					<?php echo $lesson["Lesson"]["id"]; ?>
				</td>
				<td>
					<?php echo $lesson["Word"]["phrase"]; ?>
				</td>
				<td>
					<?php echo $lesson["Lesson"]["created"]; ?>
				</td>
				<td>
					<?php echo $lesson["Lesson"]["modified"]; ?>
				</td>
				<td>
					<?php
						echo $this->Html->link(
							'<i class="fa fa-pencil"></i>',
							ADMIN_ALIAS . '/edit-lesson-' . $lesson["Lesson"]["id"],
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
						echo __('(no lessons). You can add new ') .
							$this->Html->link(__('here'), ADMIN_ALIAS . '/add-new-lesson');
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