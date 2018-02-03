<section class="section-content">
  <div class="container clearfix">
    <div class="main-content">
      
      <?php echo $breadcrumb ?>
      
      <article class="ib-edu-course-single ib_educator_course type-ib_educator_course status-publish has-post-thumbnail hentry ib_educator_category-business ib_educator_category-entrepreneurship">
        <h1><?php echo $course->getTitle() ?></h1>
        <div class="course-content entry-content">
          <?php echo $course->getContent() ?>
        </div>
      </article>
    </div>

    <?php echo $sidebar_right; ?>

  </div>
</section>