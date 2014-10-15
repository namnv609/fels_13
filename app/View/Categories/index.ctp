<ul>
	<?php
		if (count($categories) > 0) :
			foreach ($categories as $category) :
	?>
	<li>
		<h3><?php echo $category["Category"]["name"]; ?></h3>
		<?php
			echo __("You've learned " . $category["Category"]["learned"]) . 
				'/' . count($category["Word"]);
		?>
		<h3>
			<?php
				echo $this->Html->link(__('Start'), '/lesson-' . $category["Category"]["id"]);
			?> -
			<?php
				echo $this->Html->link(__('View result'), '/view-result-' . $category["Category"]["id"]);
			?>
		</h3>
	</li>
	<?php
			endforeach;
		endif;
	?>
</ul>