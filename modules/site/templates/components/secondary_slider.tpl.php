<section class="section-slider">
  <div class="flexslider fw-slider" data-autoscroll="8">
    <ul class="slides">
<?php foreach ($country->getSlideImagesArray() as $carousel): ?>
      <li class="slide overlay active">
        <div class="slide-image">
          <img src="<?php echo uri($carousel, false) ?>" alt="<?php echo htmlentities($country->getName()); ?>">
        </div>
      </li>
<?php endforeach; ?>
    </ul>
  </div>
</section>