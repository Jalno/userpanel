<?php
use \packages\base;
use \packages\base\frontend\theme;
?><!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title><?php echo $this->getTitle(); ?></title>
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<?php
		$description = $this->getDescription();
		if($description){
			echo("<meta content=\"{$description}\" name=\"description\" />");
		}
		$this->loadCSS();
		?>
		<!--[if IE 7]>
		<link rel="stylesheet" href="<?php echo theme::url('assets/plugins/font-awesome/css/font-awesome-ie7.min.css'); ?>">
		<![endif]-->
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body class="login example1 rtl">
		<div class="main-login col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
			<div class="logo">CLIP<i class="clip-clip"></i>ONE</div>