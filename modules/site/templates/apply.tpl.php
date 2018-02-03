<section class="section-content">
  <div class="container clearfix">
    <article id="post-487" class="post-487 page type-page status-publish hentry">
      <div class="entry-content full-width-content">
        <div class="dm3-two-third">
          <h1 class="entry-title">Apply your course</h1>
          <form action="" method="post">
            <?php echo Message::renderMessages(); ?>
            <p class="field-full-width">
              <label>Family Name <span class="required">*</span></label>
              <input type="text" size="40" value="" name="family_name" required="required">
            </p>
            <p class="field-full-width">
              <label>Given Name <span class="required">*</span></label>
              <input type="text" size="40" value="" name="given_name" required="required">
            </p>
            <p class="field-full-width">
              <label>Date of Birth</label><br />
              <select name="dob_year">
                <?php for ($i = 1975; $i < 2011; $i++): ?>
                  <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php endfor; ?>
              </select>
              <select name="dob_month" >
                <?php for ($i = 1; $i < 13; $i++): ?>
                  <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php endfor; ?>
              </select>
              <select name="dob_day" >
                <?php for ($i = 1; $i < 32; $i++): ?>
                  <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php endfor; ?>
              </select>
            </p>
            <p class="field-full-width">
              <label>Address</label>
              <input type="text" size="240" value="" name="address">
            </p>
            <p class="field-full-width">
              <label>Post Code</label>
              <input type="text" size="4" value="" name="postcode">
            </p>
            <p class="field-full-width">
              <label>Telephone</label>
              <input type="text" value="" name="telephone">
            </p>
            <p class="field-full-width">
              <label>Mobile/Cellular <span class="required">*</span></label>
              <input type="text" value="" name="mobile" required="required">
            </p>
            <p class="field-full-width">
              <label>Email <span class="required">*</span></label>
              <input type="email" value="" name="email" required="required">
            </p>
            <p class="field-full-width">
              <label>Highest Qualification or Current Study Level</label>
              <input type="text" value="" name="qulification">
            </p>
            <p class="field-full-width">
              <label>Institute of Graduation or Institute of Current Studying</label>
              <input type="text" value="" name="institiue">
            </p>
            <p class="field-full-width">
              <label>IELTS (If Applicable)</label>
              <input type="text" value="" name="ielts">
            </p>
            <p class="field-full-width">
              <label>Country of Intend to Study</label><br />
              <select name="country">
                <option value="Australia">Australia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="U.S.A">U.S.A</option>
                <option value="Japan">Japan</option>
                <option value="China">China</option>
              </select>
            </p>
            <p class="field-full-width">
              <label>Institute of Intend to Study</label>
              <input type="text" value="" name="intent_institute">
            </p>
            <p class="field-full-width">
              <label>Course of Intend to Study <span class="required">*</span></label>
              <input type="text" value="" name="intent_course" required="required">
            </p>
            <p class="field-full-width">
              <label>Note</label>
              <textarea rows="8" cols="40" name="note"></textarea>
            </p>
            <p>
              <input class="button" type="submit" value="Submit" name="submit">
            </p>
          </form>
        </div>
        <?php echo $full_page_sidebar_right; ?>
        <div class="clear"></div>
      </div>
    </article>

  </div>
</section>