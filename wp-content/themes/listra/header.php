<!DOCTYPE html>

<html lang="<?php echo get_locale(); ?>" xmlns="http://www.w3.org/1999/xhtml">

  <head>

    <title><?php echo get_bloginfo('name').( (!is_front_page()) ? ' - '.get_the_title() : '' ); ?></title>

    <meta charset="<?php echo get_bloginfo('charset'); ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="author" content="Wesley Andrade - github.com/wesandradealves">

    <meta name="description" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:type" content="website">

    <meta property="og:title" content="<?php echo get_bloginfo('name'); ?>">

    <meta property="og:description" content="<?php echo get_bloginfo('description'); ?>">

    <meta property="og:url" content="<?php echo home_url(); ?>">

    <meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>">

    <meta property="og:image" content="">

    <!-- <meta name="apple-mobile-web-app-capable" content="yes"> -->

    <meta name="HandheldFriendly" content="true">

    <link rel="canonical" href="<?php echo get_permalink(); ?>">

    <!-- <link rel="apple-touch-icon" href=""> -->

    <!-- <link rel="shortcut icon" type="image/png" href=""> -->

    <?php wp_head(); ?>

  </head>

    <body <?php body_class(); ?>>    

    <div id="wrap">

      <header id="header">
          <?php echo  get_template_part('template-parts/logo'); ?>
      </header>

      <main id="main">

