<?php
	$validationErrs = array_filter($this->validationErrors);
	$flashMessage = $this->Session->flash();
	
	echo $this->Form->create('Word', array(
		'class' => 'form-horizontal',
		'url' => ADMIN_ALIAS . '/save-word',
		'inputDefaults' => array(
			'div' => array('class' => 'form-group'),
			'between' => '<div class="col-md-10">',
			'after' => '</div>',
			'class' => 'form-control',
			'error' => FALSE,
		),
		'novalidate' => 'novalidate',
		'type' => 'post'
	));
	
	echo $this->CustomForm->validationSummary($flashMessage, 'alert alert-success widget-inner');
	echo $this->CustomForm->validationSummary($validationErrs, 'alert alert-danger widget-inner');
	
	echo $this->Form->hidden('id');
	echo $this->Form->input('phrase', array(
		'label' => array(
			'text' => __('Phrase'),
			'class' => 'control-label col-md-2'
		)
	));
	echo $this->Form->input('definition', array(
		'label' => array(
			'text' => __('Definition'),
			'class' => 'control-label col-md-2'
		)
	));
	echo $this->Form->input('category_id', array(
		'label' => array(
			'text' => __('Category'),
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