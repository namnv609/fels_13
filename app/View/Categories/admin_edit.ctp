<?php
	$validationErrs = array_filter($this->validationErrors);
	$flashMessage = $this->Session->flash();
	
	echo $this->Form->create('Category', array(
		'class' => 'form-horizontal',
		'url' => ADMIN_ALIAS . '/save-category',
		'inputDefaults' => array(
			'format' => array('before', 'label', 'between', 'input', 'after'),
			'div' => array('class' => 'form-group'),
			'between' => '<div class="col-md-10">',
			'after' => '</div>',
			'class' => 'form-control',
			'error' => FALSE
		)
	));
	
	echo $this->CustomForm->validationSummary($flashMessage, 'alert alert-success widget-inner');
	echo $this->CustomForm->validationSummary($validationErrs, 'alert alert-danger widget-inner');
	
	echo $this->Form->hidden('id', array('default' => $category["Category"]["id"]));
	echo $this->Form->input('name', array(
		'label' => array(
			'class' => 'control-label col-md-2',
			'text' => __('Category name')
		),
		'default' => $category["Category"]["name"]
	));
	echo $this->Form->input('status', array(
		'options' => Category::$slbStatus,
		'label' => array(
			'class' => 'control-label col-md-2',
			'text' => __('Status')
		),
		'default' => $category["Category"]["status"]
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
		?>
	</div>
</div>