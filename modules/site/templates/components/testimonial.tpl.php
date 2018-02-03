<section style="background-color:#f5f5f5;" class="section-content section-bg">
  <div class="container clearfix">
    <div class="entry-content">
      <div class="title1 clearfix">
        <div class="text">
          <h2>What our clients say about us</h2>
        </div> 
        <div class="sub-title">At <?php echo $settings['sitename'] ?>, we put our clients at the centre of everything. Your needs is what we care the most.</div>
      </div>
      <div class="lecturers-grid clearfix">
<?php $i=0; foreach (Testimonial::findAll() as $testimonial): ?>
        <div class="lecturer column-<?php echo ($i+1)%2 == 0 ? 2 : 1 ?>" <?php if ($i > 3): ?>style="display:none"<?php endif; ?>>
          <div class="author-photo">
            <img width="150" height="150" src="<?php echo uri($testimonial->getImage()) ?>" alt="Testimonial by <?php echo htmlentities($testimonial->getName()) ?>">
          </div>
          <div class="summary">
            <h3><?php echo $testimonial->getName() ?></h3>
            <div class="author-description"><?php echo $testimonial->getComment() ?></div>
            <div class="author-from">
              - <?php echo $testimonial->getFrom() ?>
            </div>
          </div>
        </div>
<?php $i++; endforeach; ?>
      </div>
      <div style="text-align: center;">
        <a id="showmore" href="#" class="button">Show more</a>
      </div>
      <script type="text/javascript">
        $('#showmore').click(function(){
          $('.lecturer:hidden').fadeIn('slow');
          $(this).hide();
          return false;
        });
      </script>
    </div>
  </div>
</section>
