<?php
/**
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BlogNova
 * @subpackage Blognova
 * @since Blog Nova 0.1
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?> data-theme="light" data-nav="sticky" data-layout="alternate">

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<?php

			/**
			 * After body tag open.
			 *
			 * @hooked blognova_header_template();
			 */
			do_action( 'wp_body_open' ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound

			