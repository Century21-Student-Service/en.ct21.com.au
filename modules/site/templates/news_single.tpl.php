<section class="section-content">
  <div class="container clearfix">
    <div class="main-content">
      <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-news category-programming tag-floating-images">
        <h1 class="entry-title"><?php echo $news->getTitle() ?></h1>
        <div class="post-thumb">
          <img width="620" height="384" src="<?php echo uri($news->getImage()) ?>">
        </div>

        <div class="entry-content">
          <?php echo $news->getContent() ?>
        </div>

        <footer class="post-meta">
          <span class="post-date">
            <time class="entry-date"><?php echo date('jS M Y', $news->getDate()) ?></time>
          </span>
        </footer>
      </article>
    </div>

    <?php echo $sidebar_right ?>
  </div>
</section>