<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th><?php echo __('ID'); ?></th>
				<th><?php echo __('Name'); ?></th>
				<th><?php echo __('Created'); ?></th>
				<th><?php echo __('Modified'); ?></th>
				<th><?php echo __('Status'); ?></th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if (count($categories) > 0) :
					foreach ($categories as $category) :
			?>
			<tr>
				<td>
					<?php echo $category["Category"]["id"]; ?>
				</td>
				<td>
					<?php echo $category["Category"]["name"]; ?>
				</td>
				<td>
					<?php echo $category["Category"]["created"]; ?>
				</td>
				<td>
					<?php echo $category["Category"]["modified"]; ?>
				</td>
				<td>
					<?php echo AppModel::$slbStatus[$category["Category"]["status"]]; ?>
				</td>
				<td>
					<?php
						echo $this->Html->link(
							'<i class="fa fa-pencil"></i>',
							ADMIN_ALIAS . '/edit-category-' . $category["Category"]["id"],
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
				<td colspan="6">
					<?php
						echo __('(no categories). You can add new ') . 
								$this->Html->link(__('here'), ADMIN_ALIAS . '/add-new-category');
					?>
				</td>
			</tr>
			<?php
				endif;
			?>
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