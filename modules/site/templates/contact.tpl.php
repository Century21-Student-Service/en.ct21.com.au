<section class="section-content">
  <div class="container clearfix">
    <article id="post-487" class="post-487 page type-page status-publish hentry">
      <div id="page-title">
        <h1 class="entry-title"><?php echo $pagetitle ?></h1>
      </div>

      <div class="entry-content full-width-content">
<?php echo $googlemap; ?>
        <div class="dm3-two-third">
          <?php echo $content ?>
          <div class="dm3-divider-dotted"></div>
          <h3 id="contact-form">Send us an email</h3>
          <div role="form" lang="en-US" dir="ltr">
            <?php echo Message::renderMessages() ?>
            <div class="screen-reader-response"></div>
            <form id="contact" action="<?php echo uri('contact') ?>" method="post" class="wpcf7-form" novalidate="novalidate">
              <p class="field-one-half">
                <label>Name <span class="required">*</span></label><span class="wpcf7-form-control-wrap your-name"><input type="text" name="contact[name]" value="" size="40" required="required" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" /></span>
              </p>
              <p class="field-one-half">
                <label>Email <span class="required">*</span></label><span class="wpcf7-form-control-wrap your-email"><input type="email" required="required" name="contact[email]" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" /></span>
              </p>
              <div class="clear"></div>
              <p class="field-full-width">
                <label>Message <span class="required">*</span></label><span class="wpcf7-form-control-wrap your-message"><textarea required="required" name="contact[message]" cols="40" rows="8" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false"></textarea></span>
              </p>
              <p><input name="submit" type="submit" value="Submit" class="wpcf7-form-control wpcf7-submit button" /></p>
              <div class="wpcf7-response-output wpcf7-display-none"></div>
              <?php Form::loadSpamToken('#contact', 'global contact form') ?>
            </form>
          </div>
        </div>
        <?php echo $full_page_sidebar_right; ?>
        <div class="clear"></div>
      </div>
    </article>

  </div>
</section>