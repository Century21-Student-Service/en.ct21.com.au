<section style="background-color:#f5f5f5;" class="section-content section-bg"><div class="container clearfix">
    <div class="entry-content">
      <div class="dm3-one-half">
        <h2>Latest news</h2>
<?php $i = 0; $allnews = News::findAll(3); ?>
<?php foreach ($allnews as $news): $i++; ?>
        <div class="news <?php echo $i == 1 ? 'first' : ($i == sizeof($allnews) ? 'last' : '') ?>">
          <div class="left"><img src="<?php echo $news->getThumbnail() ?>"></div>
          <div class="right">
            <p><?php echo date('jS M Y', $news->getDate()) ?></p>
            <h3><a href="<?php echo uri('news/'.$news->getId()) ?>"><?php echo $news->getTitle() ?></a></h3>
          </div>
        </div>
<?php endforeach; ?>
        <div style="clear: both; position: absolute; bottom: 0px; right: 5px; color:#555; font-weight: bold;">
          <a href="<?php echo uri('news') ?>">Check all news &raquo;</a>
        </div>
      </div>
      <div class="dm3-one-half dm3-column-last" id="video-container">
        <iframe width="560" height="315" src="<?php echo $youtube_url ?>" frameborder="0" allowfullscreen></iframe>
        <div id="shortcuts">

              <div class="dm3-box-icon dm3-box-icon-center">
                <div class="dm3-box-icon-icon">
                  <span class="fa fa-search"></span>
                </div>
                <div class="dm3-box-icon-content">
                  <?php echo Block::findByName('Course search') ?>
                </div>
              </div>

        </div>
      </div>
      
      <div class="clear"></div>
    </div>
  </div>
</section>