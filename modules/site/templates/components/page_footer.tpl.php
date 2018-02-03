<footer id="page-footer">
  <div class="container clearfix">
    <div class="copy">© All rights reserved, <?php echo $settings['sitename'] ?>, 2015</div>
    <button type="button" id="back-to-top"><span class="fa fa-angle-up"></span></button>
    <nav id="footer-nav">
      <ul id="menu-footer-menu" class="menu">
<?php foreach (Menu::findByName('页脚底部菜单')->getRootItem()->getChildren() as $item): ?>
        <li class="menu-item menu-item-type-post_type menu-item-object-page page_item">
          <a href="<?php echo strpos($item->getUri(), 'http') === 0 ? $item->getUri() : uri($item->getUri()) ?>"><?php echo $item->getName() ?></a>
        </li>
<?php endforeach; ?>
      </ul>
    </nav>
  </div>
</footer>