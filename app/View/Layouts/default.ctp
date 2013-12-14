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

$cakeDescription = __d('cake_dev', 'Mr. Belmont');
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

		echo $this->Html->css('cake.belmont');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link($cakeDescription, BASE_URL); ?></h1>
		</div>
		<center>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<center>
			<div class="footerInner">
				<div class="footerLeft">
					Site coded & designed by Tim Belmont.<br />
					Proudly developed using <a href="http://www.cakephp.org" target="_BLANK">CakePHP</a>.
				</div>
				<div class="footerRight">
					E-Mail: <a href="mailto:Timothy_Belmont@lyndhurst.k12.nj.us">Timothy_Belmont@lyndhurst.k12.nj.us</a><br />
					Twitter: <a href="http://www.twitter.com/BelmontEnglish">@BelmontEnglish</a>
				</div>
				<div class="clear">
				</div>
			</div>
			</center>
		</div>
		</center>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
