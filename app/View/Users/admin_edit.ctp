<?php
	$validationErrs = array_filter($this->validationErrors);
	$flashMessage = $this->Session->flash();
	$labelClass = 'control-label col-md-2';
	
	echo $this->Form->create('User', array(
		'class' => 'form-horizontal',
		'url' => ADMIN_ALIAS . '/update-user',
		'inputDefaults' => array(
			'format' => array('before', 'label', 'between', 'input', 'after'),
			'div' => array('class' => 'form-group'),
			'between' => '<div class="col-md-10">',
			'after' => '</div>',
			'class' => 'form-control',
			'error' => FALSE
		),
		'type' => 'file'
	));
	
	echo $this->CustomForm->validationSummary($flashMessage, 'alert alert-success widget-inner');
	echo $this->CustomForm->validationSummary($validationErrs, 'alert alert-danger widget-inner');
	
	echo $this->Form->hidden('id');
	echo $this->Form->input('name', array(
		'label' => array(
			'text' => __('Name'),
			'class' => $labelClass
		)
	));
	echo $this->Form->input('email', array(
		'label' => array(
			'text' => __('Email'),
			'class' => $labelClass
		),
		'disabled' => 'disabled'
	));
	echo $this->Form->input('avatar', array(
		'type' => 'file',
		'label' => array(
			'text' => __('Avatar'),
			'class' => $labelClass
		)
	));
	echo $this->Form->input('password', array(
		'value' => '',
		'label' => array(
			'text' => __('Password'),
			'class' => $labelClass
		)
	));
	echo $this->Form->input('status', array(
		'label' => array(
			'text' => __('Status'),
			'class' => $labelClass
		),
		'type' => 'select',
		'options' => AppModel::$slbStatus
	));
?>
<div class="form-group">
	<div class="col-md-12 pull-right">
		<p class="alert-danger">
			<?php echo __('* Leave blank password if dont want to change'); ?>
		</p>
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