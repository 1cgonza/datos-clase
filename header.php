<?php
$mainInfo = get_blog_details(1);
?><!DOCTYPE html>
<!--[if lte IE 11]><html <?php language_attributes(); ?> class="no-js lte-ie11"> <![endif]-->
<!--[if gte IE 11]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="cleartype" content="on">
<?php wp_head(); ?>
</head>

<body <?php body_class('gridWrapper'); ?>>
  <header class="siteHeader middle m-90 t-90 d-90 ld-90">
    <?php
    $siteName = get_bloginfo('name');
    
    if (is_home()) : ?>
    <h1 class="siteTitle"><?php echo $siteName; ?></h1>
    <?php else : ?>
    <h1 class="siteTitle"><a href="<?php echo home_url(); ?>"><?php echo $siteName; ?></a></h1>
    <?php endif ?>
  </header>

  <main class="siteMain gridEleCenter m-90 t-90 d-90 ld-90" role="main">