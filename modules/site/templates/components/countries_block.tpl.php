<section class="section-content">
  <div class="container clearfix">
    <div class="entry-content">
      <div class="title1 clearfix">
        <div class="text">
          <h2><?php echo $title ?></h2>
        </div> 
      </div>
      <div class="courses-carousel owl-carousel">
<?php foreach ($countries as $country): ?>
        <article class="post-grid post-142 ib_educator_course type-ib_educator_course status-publish has-post-thumbnail hentry ib_educator_category-business ib_educator_category-entrepreneurship">
          <div class="post-thumb">
            <a href="<?php echo uri('country/' . $country->getId()) ?>">
              <img width="360" height="224" src="<?php echo uri($country->getImage()) ?>" class="attachment-ib-educator-grid wp-post-image" alt="<?php echo htmlentities($country->getName()) ?>"  />
            </a>
          </div>
          <div class="post-body">
            <h2 class="entry-title">
              <a href="<?php echo uri('country/' . $country->getId()) ?>"><?php echo $country->getName() ?></a>
            </h2>
        </article>
<?php endforeach; ?>
      </div>
    </div>
  </div>
</section>