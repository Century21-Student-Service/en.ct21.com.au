
<?php if (module_enabled('meta')): ?>
  <?php Meta::autoCreateByUri(isset($meta_uri) ? $meta_uri : false) ?>
<?php endif; ?>

<?php HTML::renderOutFooterUpperRegistry(); ?>
<?php Asset::printBottomAssets('frontend'); ?>
<?php HTML::renderOutFooterLowerRegistry(); ?>


</body>

</html>
