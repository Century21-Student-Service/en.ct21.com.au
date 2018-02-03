<aside class="widget widget_categories">
  <h3 class="widget-title">Apply for oversea study</h3>
  <ul>
<?php foreach (Country::findAll() as $country): ?>
    <li class="cat-item"><a href="<?php echo uri('country/'.$country->getId()) ?>" ><?php echo $country->getName() ?></a>
<?php endforeach; ?>
  </ul>
</aside>