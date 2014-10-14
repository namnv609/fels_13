<p>
	<?php echo __('Progress: '); ?>
	<span id="question-progress">1</span> /
	<?php echo count($questions); ?>
</p>
<?php
	echo $this->Form->create("Result", array(
		"url" => "/lesson/submit",
		"type" => "post",
		"inputDefaults" => array(
			"div" => FALSE,
			"label" => FALSE,
			"between" => "<p>",
			"after" => "</p>",
			"class" => "contact",
			"size" => 5
		)
	));
	echo $this->Form->hidden(NULL, array(
		'default' => $categoryID,
		'name' => 'categoryID'
	));
?>
<div class="form_settings">
	<?php
		if (count($questions) > 0) :
			foreach ($questions as $question) :
	?>
	<div class="answer">
		<h3><?php echo $question["Word"]["phrase"]; ?></h3>
		<?php
			echo $this->Form->input($question["Lesson"]["id"], array(
				'options' => $question["Answer"]
			));
		?>
	</div>
<?php
			endforeach;
			echo $this->Form->button(__('Previous'), array(
				'class' => 'submit',
				'label' => '&nbsp;',
				'type' => 'button',
				'id' => 'btn-prev'
			));
			echo $this->Form->button(__('Next'), array(
				'class' => 'submit',
				'label' => '&nbsp;',
				'type' => 'button',
				'id' => 'btn-next'
			));
		else :
			echo __("No question(s) :/");
		endif;
	?>
</div>
<?php
	echo $this->Form->end();
	