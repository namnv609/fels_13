<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $title_for_layout; ?> - Framgia E-learning System</title>
		<meta name="description" content="website description" />
		<meta name="keywords" content="website keywords, website keywords" />
		<meta http-equiv="content-type" content="text/html; charset=windows-1252" />
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine&amp;v1" />
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" />
		<?php
			echo $this->Html->css(array(
				'style'
			));
		?>
	</head>
	<body>
		<div id="main">
			<div id="header">
				<div id="logo">
					<h1>Framgia<a href="<?php echo SITE_URL; ?>"> E-learning System</a></h1>
					<div class="slogan">&nbsp;</div>
				</div>
				<div id="menubar">
					<ul id="menu">
						<!-- put class="current" in the li tag for the selected page - to highlight which page you're on -->
						<li>
							<?php echo $this->Html->link(__('Home'), '/'); ?>
						</li>
						<li>
							<?php echo $this->Html->link(__('Words'), '/word-list'); ?>
						</li>
						<li>
							<?php echo $this->Html->link(__('Categories'), '/categories'); ?>
						</li>
						<li>
							<?php echo $this->Html->link(__('Hello, ') . $this->Session->read('UserSession.userName'), '/profile'); ?>
						</li>
						<li>
							<?php echo $this->Html->link(__('Logout'), '/logout'); ?>
						</li>
					</ul>
				</div>
			</div>
			<div id="site_content">
				<div id="sidebar_container">
					<img class="paperclip" src="img/paperclip.png" alt="paperclip" />
					<div class="sidebar">
						<!-- insert your sidebar items here -->
						<h3>Latest News</h3>
						<h4>What's the News?</h4>
						<h5>1st July 2011</h5>
						<p>Put your latest news item here, or anything else you would like in the sidebar!<br /><a href="#">Read more</a></p>
					</div>
					<img class="paperclip" src="img/paperclip.png" alt="paperclip" />
					<div class="sidebar">
						<h3>Newsletter</h3>
						<p>If you would like to receive our newletter, please enter your email address and click 'Subscribe'.</p>
						<form method="post" action="#" id="subscribe">
							<p style="padding: 0 0 9px 0;"><input class="search" type="text" name="email_address" value="your email address" onclick="javascript: document.forms['subscribe'].email_address.value = ''" /></p>
							<p><input class="subscribe" name="subscribe" type="submit" value="Subscribe" /></p>
						</form>
					</div>
					<img class="paperclip" src="img/paperclip.png" alt="paperclip" />
					<div class="sidebar">
						<h3>Latest Blog</h3>
						<h4>Website Goes Live</h4>
						<h5>1st July 2011</h5>
						<p>We have just launched our new website. Take a look around, we'd love to know what you think.....<br /><a href="#">read more</a></p>
					</div>
				</div>
				<div id="content">
					<?php echo $this->fetch('content'); ?>
				</div>
			</div>
			<div id="footer">
				<p>Copyright &copy; 2014 Framgia Vietnam</p>
			</div>
		</div>
	</body>
</html>