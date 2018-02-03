<section class="section-slider">
  <div class="flexslider fw-slider" data-autoscroll="8">
    <ul class="slides">
<?php foreach ($carousels as $carousel): ?>
      <li class="slide overlay active">
        <div class="slide-image">
          <img src="<?php echo $carousel->getImage() ?>" alt="<?php echo htmlentities($carousel->getTitle()); ?>">
        </div>
        <div class="slide-caption light left">
          <div class="container">
            <div class="caption-inner">
              <h2 class="slide-title"><?php echo $carousel->getTitle() ?></h2>
              <div class="slide-description"><?php echo $carousel->getContent() ?></div>
              <div class="buttons">
                <a class="button button-white" href="<?php echo $carousel->getButtonLink() ?>"><?php echo $carousel->getButtonText() ?></a>
              </div>
            </div>
          </div>
        </div>
      </li>
<?php endforeach; ?>
    </ul>
  </div>
</section>