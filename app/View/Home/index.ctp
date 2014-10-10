<?php
	echo $this->Html->image($avatar["User"]["avatar"], array(
		'class' => 'user-profile-img'
	));
?>
<h2><?php echo __('Hello, ') . $this->Session->read("UserSession.userName"); ?></h2>
<hr />
<h3><?php echo __('Activities'); ?></h3>
<?php
	if (count($activities) > 0) :
		foreach ($activities as $activity) :
?>
	<ul>
		<li>
			<?php
				echo __('Learned ' . count($activity["Word"]) . ' words in "' . $activity["Category"]["name"] .'"');
			?>
		</li>
	</ul>
<?php
		endforeach;
	else :
		echo __('No yet activities :/!');
	endif;
?>