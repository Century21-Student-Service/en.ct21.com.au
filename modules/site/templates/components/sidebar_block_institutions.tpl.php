<aside class="widget widget_categories">
  <h3 class="widget-title">Other institutions in <?php echo $institution->getCountry()->getName() ?></h3>
  <ul>
<?php foreach (Institution::findAllByCountryId($institution->getCountry()->getId()) as $i): ?>
    <?php  if ($institution->getId() == $i->getId()) {continue;} ?>
    <li class="cat-item"><a href="<?php echo uri('institution/'.$i->getId()) ?>" ><?php echo $i->getTitle() ?></a></li>
<?php endforeach; ?>
  </ul>
</aside>