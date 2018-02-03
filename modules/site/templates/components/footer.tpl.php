<footer id="footer-widgets">
  <div class="container clearfix">
    <div class="widgets widgets-1 one-fourth">
      <aside class="widget widget_text" id="text-3"><h3 class="widget-title">About Us</h3>
        <div class="textwidget">
          <?php echo Block::findByName('Footer Left') ?>
        </div>
      </aside>
    </div>

    <div class="widgets widgets-2 one-fourth">
      <aside class="widget widget_nav_menu" id="nav_menu-3"><h3 class="widget-title">Links</h3><div class="menu-links-container">
          <ul class="menu" id="menu-links">
<?php foreach (Menu::findByName('底部LINKS')->getRootItem()->getChildren() as $item): ?>
            <li class="menu-item menu-item-type-post_type menu-item-object-page">
              <a href="<?php echo strpos($item->getUri(), 'http') === 0 ? $item->getUri() : uri($item->getUri()) ?>"><?php echo $item->getName() ?></a>
            </li>
<?php endforeach; ?>
          </ul>
        </div>
      </aside>
    </div>

    <div class="widgets widgets-3 one-fourth">
      <aside class="widget widget_recent_entries" id="recent-posts-4">		<h3 class="widget-title">News</h3>
        <ul>
<?php foreach (News::findAll(3) as $news): ?>
          <li>
            <a href="<?php echo uri('news/' . $news->getId()) ?>"><?php echo $news->getTitle() ?></a>
          </li>
<?php endforeach; ?>
        </ul>
      </aside>
    </div>

    <div class="widgets widgets-4 one-fourth">
      <aside class="widget widget-educator-contact" id="widget_educator_contact-3">
        <h3 class="widget-title">Get in Touch</h3>
        <div class="text">
          <p><?php echo Block::findByName('Footer Right') ?></p>
        </div>
      </aside>
    </div>
  </div>
</footer>

