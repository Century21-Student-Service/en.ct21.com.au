<div id="page-toolbar">
  <div class="container clearfix">
    <div class="toolbar-items">
      <div class="item">
        <div class="inner">
          Phone: +61 2 9267 6047 | info@ct21.com.au
        </div>
      </div>

    </div>

    <ul class="toolbar-social">
      <li class="facebook">
        <a target="_blank" title="Facebook" href="https://www.facebook.com/Cr21SSC">
          <span class="fa fa-facebook"></span>
        </a>
      </li>
      <li class="google-plus">
        <a target="_blank" title="Google+" href="https://plus.google.com/u/0/112700728169168801572/posts">
          <span class="fa fa-google-plus"></span>
        </a>
      </li>
      <li class="google-plus">
        <a target="_blank" title="Google+" href="https://plus.google.com/109424761457074541592/posts">
          <span class="fa fa-google-plus"></span>
        </a>
      </li>
      <li class="twitter">
        <a target="_blank" title="Twitter" href="https://twitter.com/Century21_SSC">
          <span class="fa fa-twitter"></span>
        </a>
      </li>
      <!--
      <li class="linkedin">
        <a target="_blank" title="Linkedin" href="https://linkedin.com/">
          <span class="fa fa-linkedin"></span>
        </a>
      </li>
      -->
      <li class="youtube">
        <a target="_blank" title="Youtube" href="https://www.youtube.com/channel/UCZK6kVB6Q5_RA6g8PKm4Xaw">
          <span class="fa fa-youtube"></span>
        </a>
      </li>
      <!--
      <li class="vimeo">
        <a target="_blank" title="Vimeo" href="http://vimeo.com/">
          <span class="fa fa-vimeo-square"></span>
        </a>
      </li>
      <li class="instagram">
        <a target="_blank" title="Instagram" href="http://instagram.com">
          <span class="fa fa-instagram"></span>
        </a>
      </li>
      -->
    </ul>
  </div>
</div>


<header id="page-header"  class="fixed-header">
  <div id="page-header-inner">
    <div id="header-container">
      <div class="container clearfix">
        <div id="main-logo">
          <a href="<?php echo uri('') ?>">
            <img src="<?php echo uri('modules/site/assets/images/ct21logo.png') ?>" alt="<?php echo $settings['sitename'] ?>">
          </a>
        </div>


        <nav id="main-nav">
          <ul id="menu-main-menu" class="menu">
<?php foreach (Menu::findByName('主菜单')->getRootItem(10)->getChildren() as $item): ?>
            <li class="menu-item <?php echo_link_active_class('/^'.$item->getUri().'$/', get_cur_page_url(), 'current-menu-item') ?> <?php if (sizeof($item->getChildren())): ?>menu-item-has-children<?php endif; ?>">
              <a href="<?php echo strpos($item->getUri(), 'http') === 0 ? $item->getUri() : uri($item->getUri()) ?>"><?php echo $item->getName() ?></a>
              <?php if (sizeof($item->getChildren())): ?>
              <ul class="sub-menu">
              <?php foreach ($item->getChildren() as $c): ?>
                <li class="menu-item <?php echo_link_active_class('/^'.$c->getUri().'$/', get_cur_page_url(), 'current-menu-item') ?> <?php if (sizeof($c->getChildren())): ?>menu-item-has-children<?php endif; ?>">
                  <a href="<?php echo strpos($c->getUri(), 'http') === 0 ? $c->getUri() : uri($c->getUri()) ?>"><?php echo $c->getName() ?></a>
                  <?php if (sizeof($c->getChildren())): ?>
                  <ul class="sub-menu">
                    <?php foreach ($c->getChildren() as $cc): ?>
                    <li class="menu-item <?php echo_link_active_class('/^'.$cc->getUri().'$/', get_cur_page_url(), 'current-menu-item') ?> <?php if (sizeof($cc->getChildren())): ?>menu-item-has-children<?php endif; ?>">
                      <a href="<?php echo strpos($cc->getUri(), 'http') === 0 ? $cc->getUri() : uri($cc->getUri()) ?>"><?php echo $cc->getName() ?></a>
                      <?php if (sizeof($cc->getChildren())): ?>
                      <ul class="sub-menu">
                        <?php foreach ($cc->getChildren() as $ccc): ?>
                          <li class="menu-item <?php echo_link_active_class('/^'.$ccc->getUri().'$/', get_cur_page_url(), 'current-menu-item') ?> <?php if (sizeof($ccc->getChildren())): ?>menu-item-has-children<?php endif; ?>">
                            <a href="<?php echo strpos($ccc->getUri(), 'http') === 0 ? $ccc->getUri() : uri($ccc->getUri()) ?>"><?php echo $ccc->getName() ?></a>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                      <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                  </ul>
                  <?php endif; ?>
                </li>
              <?php endforeach; ?>
              </ul>
              <?php endif; ?>
            </li>
<?php endforeach; ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</header>
