<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Avatar</th>
				<th>Name</th>
				<th>Email</th>
				<th>Created</th>
				<th>Modified</th>
				<th>Status</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if (count($users) > 0) :
					foreach ($users as $user) :
			?>
			<tr>
				<td>
					<?php echo $user["User"]["id"]; ?>
				</td>
				<td>
					<?php
						echo $this->Html->image($user["User"]["avatar"], array(
							'class' => 'user-profile-img'
						));
					?>
				</td>
				<td>
					<?php echo $user["User"]["name"]; ?>
				</td>
				<td>
					<?php echo $user["User"]["email"]; ?>
				</td>
				<td>
					<?php echo $user["User"]["created"]; ?>
				</td>
				<td>
					<?php echo $user["User"]["modified"]; ?>
				</td>
				<td>
					<?php echo AppModel::$slbStatus[$user["User"]["status"]]; ?>
				</td>
				<td>
					<?php
						echo $this->Html->link(
							'<i class="fa fa-pencil"></i>',
							ADMIN_ALIAS . '/user-profile-' . $user["User"]["id"],
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
				<td colspan="8">
					<?php
						echo __('(no categories). You can add new ') . 
							$this->Html->link(__('here'), ADMIN_ALIAS . '/add-new-category');
					?>
				</td>
			</tr>
			<?php endif; ?>
		</tbody>
	</table>
</div>