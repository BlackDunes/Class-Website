<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'The Belmont Admin Panel');
?>
<!DOCTYPE html>
<html>
<head>
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,900,300italic,400italic,600italic,900italic|Acme' rel='stylesheet' type='text/css'>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.belmont.admin');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link($cakeDescription, BASE_URL.'panel/'); ?></h1>
		</div>
		<center>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->element('navbar'); ?>
			<div id="mainArea">
				<?php echo $this->fetch('content'); ?>
			</div>
			<div class="clear"></div>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
		</center>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
