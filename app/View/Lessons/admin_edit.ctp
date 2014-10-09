<?php
	$validationErrs = array_filter($this->validationErrors);
	$flashMessage = $this->Session->flash();
	
	echo $this->Form->create('Lesson', array(
		'class' => 'form-horizontal',
		'url' => ADMIN_ALIAS . '/save-lesson',
		'inputDefaults' => array(
			'div' => array('class' => 'form-group'),
			'between' => '<div class="col-md-10">',
			'after' => '</div>',
			'class' => 'form-control',
			'error' => FALSE,
		),
		'type' => 'post',
		'novalidate' => 'novalidate'
	));
	
	echo $this->CustomForm->validationSummary($flashMessage, 'alert alert-success widget-inner');
	echo $this->CustomForm->validationSummary($validationErrs, 'alert alert-danger widget-inner');
	echo $this->Form->hidden('id');
	echo $this->Form->input('word_id', array(
		'label' => array(
			'text' => __('Correct answer'),
			'class' => 'control-label col-md-2'
		)
	));
	echo $this->Form->input('answer_a', array(
		'label' => array(
			'text' => __('Answer A'),
			'class' => 'control-label col-md-2'
		)
	));
	echo $this->Form->input('answer_b', array(
		'label' => array(
			'text' => __('Answer B'),
			'class' => 'control-label col-md-2'
		)
	));
	echo $this->Form->input('answer_c', array(
		'label' => array(
			'text' => __('Answer C'),
			'class' => 'control-label col-md-2'
		)
	));
?>
<div class="form-group">
	<div class="col-md-12 pull-right">
		<?php
			echo $this->Form->button(
				'<i class="fa fa-save"></i> ' . __('Save'),
				array(
					'class' => 'btn btn-primary btn-success',
					'escape' => FALSE
				)
			);
			
			echo $this->Form->end();
		?>
	</div>
</div>