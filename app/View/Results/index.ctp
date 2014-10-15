<table width="100%">
	<thead>
		<tr>
			<th><?php echo __("Status"); ?></th>
			<th><?php echo __("Phrase"); ?></th>
			<th><?php echo __("Definition"); ?></th>
			<th><?php echo __("Your answer"); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
			if (count($results) > 0) :
				foreach ($results as $result) :
		?>
		<tr>
			<td>
				<h4><?php echo $result["Result"]["isCorrect"]; ?></h4>
			</td>
			<td>
				<?php echo $result["Word"]["phrase"]; ?>
			</td>
			<td>
				<?php echo $result["Word"]["definition"]; ?>
			</td>
			<td>
				<?php echo $result["Result"]["answer"]; ?>
			</td>
		</tr>
		<?php
				endforeach;
			else :
		?>
		<tr>
			<td colspan="4">
				<?php echo __("No result yet :/"); ?>
			</td>
		</tr>
		<?php
			endif;
		?>
		<tr>
			<td colspan="4">
				<h3><?php echo $this->Html->link(__('Back to Lessons'), '/categories'); ?></h3>
			</td>
		</tr>
	</tbody>
</table>
