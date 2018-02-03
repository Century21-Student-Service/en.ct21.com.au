<section class="section-content">
  <div class="container clearfix">


    <div class="main-content">
      <div id="page-title">
        <h1>News</h1><div class="subtitle">Keep updated to our latest news!</div>			</div>
      <div class="posts-grid posts-grid-2 clearfix">
<?php foreach ($news as $n): ?>
        <article class="post-grid post type-post status-publish format-standard has-post-thumbnail hentry">
          <div class="post-thumb">
            <a href="<?php echo uri('news/' . $n->getId()) ?>">
              <img width="360" height="224" src="<?php echo uri($n->getImage()) ?>" alt="<?php echo htmlentities($n->getTitle()) ?>">
            </a>
          </div>

          <div class="post-body">
            <h2 class="entry-title">
              <a rel="bookmark" href="<?php echo uri($n->getImage()) ?>"><?php echo $n->getTitle() ?></a>
            </h2>
            <div class="post-excerpt entry-summary">
              <p><?php echo $n->getSummary() ?></p>
            </div>
          </div>

          <footer class="post-meta">
            <span class="post-date">
              <time class="entry-date"><?php echo date('jS F Y', $n->getDate()) ?></time>
            </span>
          </footer>
        </article>
        <?php endforeach; ?>
      </div>

      <div class="pagination clearfix">
        <div class="text">Page <?php echo $current_page ?> of <?php echo $total_page ?></div>
        <div class="links">
          <?php echo $pager ?>
        </div>
      </div>		
    </div>

    <?php echo $sidebar_right ?>

  </div>
</section>