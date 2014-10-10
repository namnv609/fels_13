<p><?php echo __('Bellow is your profile information. You can update'); ?></p>
<p><?php echo $this->Session->flash(); ?></p>
<?php
	echo $this->Form->create('User', array(
		'url' => '/profile/update',
		'inputDefaults' => array(
			'div' => FALSE,
			'class' => 'contact',
			'between' => '<p>',
			'after' => '</p>'
		),
		'autocomplete' => 'off',
		'type' => 'file'
	));
?>
<div class="form_settings">
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('email', array(
			'disabled' => 'disabled'
		));
		echo $this->Form->input('avatar', array(
			'type' => 'file'
		));
		echo $this->Form->input('password', array(
			'value' => '',
			'label' => __('New password')
		));
	?>
	<label>&nbsp;</label>
	<p><?php echo __('* Leave blank password if dont want to change'); ?></p>
	<p>
		<label>&nbsp;</label>
		<?php
			echo $this->Form->button(__('Update'), array(
				'class' => 'submit',
				'label' => "&nbsp;"
			));
		?>
	</p>
</div>
<?php
	echo $this->Form->end();
?>