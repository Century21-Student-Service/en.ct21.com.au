<section class="section-content">
  <div class="container clearfix">
    <article class="page type-page status-publish hentry">
      <div class="entry-content full-width-content">
        <div class="dm3-two-third">
          
          <?php echo $breadcrumb; ?>
          
          <h1 class="entry-title"><?php echo $page->getTitle() ?></h1>
          <?php echo $page->getContent() ?>
          
          <?php if ($page->getUri() == 'apply'): ?>
          <p style='text-align: center;'><a href="/apply-form" class="button">Apply Now</a></p>
          <?php endif; ?>
        </div>
        <?php echo $full_page_sidebar_right; ?>
        <div class="clear"></div>
      </div>
    </article>

  </div>
</section>