<?php
	$inputOptions = array(
		'div'	=> FALSE,
		'error'	=> FALSE
	);
	
	$flashMessage = $this->Session->flash();
	?>
<!DOCTYPE html>
<html lang="vi-VN">
	<head>
		<meta charset="utf-8" />
		<meta name="author" content="NamNV609" />
		<title><?php echo $title_for_layout; ?></title>
		<?php
			echo $this->Html->css(array(
				'admin/login'
			));
		?>
	</head>
	<body>
		<div class="wrap">
			<div id="content">
				<div id="main">
					<div class="full_w">
						<?php
							echo $this->Form->create(
								'User',
								array(
									'url' => '/login',
									'autocomplete' => 'off',
									'inputDefaults' => array(
										'div' => FALSE,
										'class' => 'text'
									)
								)
							);
							echo $this->CustomForm->validationSummary($flashMessage);

							echo $this->Form->input('email', array(
									'class' => 'text',
									'autofocus' => 'autofocus',
									'label' => __('Email')
								)
							);
							echo $this->Form->input('password', array(
									'type' => 'password',
									'label' => __('Password')
								)
							);
							echo $this->Form->button(__('Login'), array(
									'class' => 'ok'
								)
							);
							echo $this->Html->link(__("Don't have account? Register here"), '/register');
						?>
					</div>
					<div class="footer">
						&raquo; <?php echo $this->Html->link(__('Framgia E-learning System'), 'http://framgia.com'); ?> | NamNV609
					</div>
				</div>
			</div>
		</div>
	</body>
</html>