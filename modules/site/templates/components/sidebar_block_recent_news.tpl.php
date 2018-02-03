<aside class="widget widget_recent_entries">
  <h3 class="widget-title">Recent news</h3>
  <ul>
<?php foreach(News::findAll(4) as $news): ?>
    <li>
      <a href="<?php echo uri('news/' . $news->getId()) ?>"><?php echo $news->getTitle() ?></a>
      <span class="post-date"><?php echo date('jS F Y', $news->getDate()) ?></span>
    </li>
<?php endforeach; ?>
  </ul>
</aside>