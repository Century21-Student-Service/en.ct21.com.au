<aside class="widget widget_categories">
  <h3 class="widget-title">Other recommended courses in <?php echo $course->getCountry()->getName() ?></h3>
  <ul>
<?php foreach (Course::findAllByCountryId($course->getCountry()->getId()) as $i): ?>
    <?php  if ($course->getId() == $i->getId()) {continue;} ?>
    <li><i class="fa fa-book"></i> <a href="<?php echo uri('course/'.$i->getId()) ?>" ><?php echo $i->getTitle() ?></a></li>
<?php endforeach; ?>
  </ul>
</aside>