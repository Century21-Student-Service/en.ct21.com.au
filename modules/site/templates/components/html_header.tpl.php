<!DOCTYPE html>
<!--[if IEMobile 7]><html class="iem7"  lang="<?php echo get_language(); ?>" dir="ltr"><![endif]-->
<!--[if lte IE 6]><html class="lt-ie9 lt-ie8 lt-ie7"  lang="<?php echo get_language(); ?>" dir="ltr"><![endif]-->
<!--[if (IE 7)&(!IEMobile)]><html class="lt-ie9 lt-ie8"  lang="<?php echo get_language(); ?>" dir="ltr"><![endif]-->
<!--[if IE 8]><html class="lt-ie9"  lang="<?php echo get_language(); ?>" dir="ltr"><![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html lang="<?php echo get_language(); ?>" dir="ltr"><!--<![endif]-->

<head profile="http://www.w3.org/1999/xhtml/vocab">
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<?php if (module_enabled('meta')): ?>
  <?php $meta_uri = isset($meta_uri) ? $meta_uri : Meta::getCurrentUri() ?>
  <?php $meta = Meta::findByUri($meta_uri) ?>
  <?php if ($meta): ?>
    <meta name="copyright" content="<?php echo htmlentities($meta->getCopyright()) ?>" />
    <meta name="desciption" content="<?php echo htmlentities($meta->getDescription()) ?>" />
    <meta name="keywords" content="<?php echo htmlentities($meta->getKeywords()) ?>" />
  <?php endif; ?>
<?php endif; ?>


  <title><?php echo isset($title) ? $title : ''; ?></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script type="text/javascript">
  var site = jQuery();
  site.settings = <?php echo HTML::renderSettingsInJson() ?>;
  site.settings.subroot = '<?php echo get_sub_root(); ?>';
</script>

<?php HTML::renderOutHeaderUpperRegistry(); ?>  
<?php Asset::printTopAssets('frontend'); ?>
<?php HTML::renderOutHeaderLowerRegistry(); ?>

  
<?php Asset::renderAllDynamicAssets('js', 'frontend') ?>
<?php Asset::renderAllDynamicAssets('css', 'frontend') ?>
  
</head>

<body class="<?php if (isset($body_class)) {echo $body_class; }?>">

