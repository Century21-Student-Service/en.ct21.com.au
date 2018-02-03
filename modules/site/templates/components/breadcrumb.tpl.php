<div class="breadcrumb">
<?php $i = 0; foreach ($items as $name => $uri): $i++; ?>
  <?php if ($uri): ?>
    <a href="<?php echo $uri ?>"><?php echo $name ?></a>
    <?php echo $i == sizeof($items) ? '' : '&rsaquo;' ?>
  <?php else: ?>
    <?php echo $name ?>
  <?php endif; ?>
<?php endforeach; ?>
</div>