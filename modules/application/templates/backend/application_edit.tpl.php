<div id="page-wrapper">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header"><?php i18n_echo(array(
        'en' => 'Application',
        'zh' => '申请',
      )); ?></h1>
    </div>
  </div>
  
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading"><?php i18n_echo(array(
            'en' => 'Edit', 
            'zh' => '编辑'
        )) ?></div>
        <div class="panel-body">
          
        <?php echo Message::renderMessages(); ?>
          
<form class="form-horizontal" role="form" method="POST" action="<?php echo uri('admin/application/edit/' . $object->getId()) ?>">
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='name'>name <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['name']) ? strip_tags($_POST['name']) : '') : $object->getName()))) ?>' type='text' class='form-control' id='name' name='name' required />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='dob'>dob <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['dob']) ? strip_tags($_POST['dob']) : '') : $object->getDob()))) ?>' type='text' class='form-control' id='dob' name='dob' required />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='address'>address </label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['address']) ? strip_tags($_POST['address']) : '') : $object->getAddress()))) ?>' type='text' class='form-control' id='address' name='address' />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='postcode'>postcode </label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['postcode']) ? strip_tags($_POST['postcode']) : '') : $object->getPostcode()))) ?>' type='text' class='form-control' id='postcode' name='postcode' />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='phone'>phone </label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['phone']) ? strip_tags($_POST['phone']) : '') : $object->getPhone()))) ?>' type='text' class='form-control' id='phone' name='phone' />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='mobile'>mobile <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['mobile']) ? strip_tags($_POST['mobile']) : '') : $object->getMobile()))) ?>' type='text' class='form-control' id='mobile' name='mobile' required />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='qq'>qq </label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['qq']) ? strip_tags($_POST['qq']) : '') : $object->getQq()))) ?>' type='text' class='form-control' id='qq' name='qq' />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='email'>email <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['email']) ? strip_tags($_POST['email']) : '') : $object->getEmail()))) ?>' type='text' class='form-control' id='email' name='email' required />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='education'>education <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['education']) ? strip_tags($_POST['education']) : '') : $object->getEducation()))) ?>' type='text' class='form-control' id='education' name='education' required />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='graduate_institution'>graduate_institution <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['graduate_institution']) ? strip_tags($_POST['graduate_institution']) : '') : $object->getGraduateInstitution()))) ?>' type='text' class='form-control' id='graduate_institution' name='graduate_institution' required />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='ielts'>ielts </label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['ielts']) ? strip_tags($_POST['ielts']) : '') : $object->getIelts()))) ?>' type='text' class='form-control' id='ielts' name='ielts' />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label'>apply_country </label>
  <div class='col-sm-10'>
    <select class='form-control' id='apply_country' name='apply_country'>
      <option value='Australia' <?php echo ($object->isNew() ? (isset($_POST['apply_country']) ? ($_POST['apply_country'] == 'Australia' ? 'selected="selected"' : '') : '') : ($object->getApplyCountry() == "Australia" ? "selected='selected'" : "")) ?>>Australia</option>
      <option value='Newzealand' <?php echo ($object->isNew() ? (isset($_POST['apply_country']) ? ($_POST['apply_country'] == 'Newzealand' ? 'selected="selected"' : '') : '') : ($object->getApplyCountry() == "Newzealand" ? "selected='selected'" : "")) ?>>New zealand</option>
    </select>
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='apply_institution'>apply_institution </label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['apply_institution']) ? strip_tags($_POST['apply_institution']) : '') : $object->getApplyInstitution()))) ?>' type='text' class='form-control' id='apply_institution' name='apply_institution' />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='apply_course'>apply_course </label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['apply_course']) ? strip_tags($_POST['apply_course']) : '') : $object->getApplyCourse()))) ?>' type='text' class='form-control' id='apply_course' name='apply_course' />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='comment'>comment <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <textarea class='form-control' rows='5' id='comment' name='comment' required><?php echo ($object->isNew() ? (isset($_POST['comment']) ? htmlentities($_POST['comment']) : '') : htmlentities($object->getComment())) ?></textarea>
  </div>
</div>
<div class='hr-line-dashed'></div>
  
    <div class="form-group">
      <label for="passport" class="col-sm-2 control-label">passport </label>
      <div class="col-sm-10">
        <textarea name="passport" id="passport" rows="5" class="form-control"><?php echo isset($_POST["passport"]) ? htmlentities($_POST["passport"]) : htmlentities($object->getPassport()); ?></textarea>

        <div id="passport_uploader" class="uploader" style="display: none;">
            <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
        </div>

      </div>
    </div>
    <div class="hr-line-dashed"></div>

  
<!-- js code for #passport_uploader -->
<script type="text/javascript">
$(function() {
  /** define var **/
  var max_file_number = 10;
  
  /** build file list from textarea **/
  textareaToFilelist($('#passport'), max_file_number);
  
  /** bind file delete action **/
  $('#passport').parents('.form-group').first().on('click', '.delete', function(){
    $(this).prop('disabled', true);
    var filelist = $(this).parents('.file-container').first();
    $.post('/modules/application/controllers/backend/application_form_field_passport_remove.php', {
      fid: $(this).parents('li').first().attr('id'),
      furi: $(this).data('furi')
    }, function(data){
      if (data.error !== undefined) {
        alert("Failed to delete file. Error: "+data.error);
      }
      
      filelist = $('#'+data.fid).parents('.file-container');
      $('#'+data.fid).remove();
      filelistToTextarea(filelist, max_file_number);
    }, 'json');
    return false;
  });
  
  /** plupload Queue initialization **/
  
  $("#passport_uploader").pluploadQueue({
      // General settings
      runtimes : 'html5,flash,silverlight,html4',
      url : "/modules/application/controllers/backend/application_form_field_passport_upload.php",
      chunk_size : '1mb',
      rename : false,
      dragdrop: true,

      filters : {
          max_file_size : '1mb',
          mime_types: [
              {title : "Allowed files", extensions : "jpg,png,gif,zip,doc,docx,pdf"}
          ]
      },
      flash_swf_url : '/libraries/plupload/js/Moxie.swf',
      silverlight_xap_url : '/libraries/plupload/js/Moxie.xap',
      unique_names : true, // generate an unique file name for the uploaded file and send it as an additional argument - name, to server handling script
      multiple_queues : true // Re-activate the widget after each upload procedure.
      ,multi_selection : false
  });
  var uploader = $('#passport_uploader').pluploadQueue();

  // when upload complete
  uploader.bind('UploadComplete', function(uploader, files){
    // append plup file list to textarea
    while (files[0] !== undefined) {
      if (files[0].status == plupload.DONE) {
        var existing_content = jQuery.trim($('#passport').val());
        var to_be_added = (existing_content == '' ? '' : "\n") + 'files/cache/' + files[0].target_name.toLowerCase();
        $('#passport').val(existing_content + to_be_added);
      }
      // and remove it from plup file list
      uploader.removeFile(files[0]);
    }
    // refresh file list
    textareaToFilelist($('#passport'), max_file_number);
  });

  // when file(s) added
  uploader.bind('FilesAdded', function(uploader, files){
    var content = jQuery.trim($('#passport').val());
    if (content == '') {
      var existing_files = [];
    } else {
      var existing_files = content.split("\n");
    }
    var added_files = uploader.files;
    if (existing_files.length + added_files.length > max_file_number) {
      alert('<?php echo i18n(array("en" => "Too many files selected. Max allowed upload limit is ","zh" => "您选择的文件过多了，最大允许的上传数为")) ?> ' + max_file_number + ' <?php echo i18n(array("en" => "files", "zh" => "")); ?>.' + ' <?php echo i18n(array("en" => "Only ", "zh" => "您上传的文件仅有")) ?>' + (max_file_number - existing_files.length) + ' <?php echo i18n(array("en" => "of your selected files are accepted", "zh" => "个文件被接受")) ?>.');
      for (i=uploader.files.length-1; i>(max_file_number - existing_files.length - 1); i--) {
        uploader.removeFile(uploader.files[i]);
      }
    }
  });

});
</script>
<!-- END OF js code for #passport_uploader -->
  
    <div class="form-group">
      <label for="graduation_certificate" class="col-sm-2 control-label">graduation_certificate </label>
      <div class="col-sm-10">
        <textarea name="graduation_certificate" id="graduation_certificate" rows="5" class="form-control"><?php echo isset($_POST["graduation_certificate"]) ? htmlentities($_POST["graduation_certificate"]) : htmlentities($object->getGraduationCertificate()); ?></textarea>

        <div id="graduation_certificate_uploader" class="uploader" style="display: none;">
            <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
        </div>

      </div>
    </div>
    <div class="hr-line-dashed"></div>

  
<!-- js code for #graduation_certificate_uploader -->
<script type="text/javascript">
$(function() {
  /** define var **/
  var max_file_number = 10;
  
  /** build file list from textarea **/
  textareaToFilelist($('#graduation_certificate'), max_file_number);
  
  /** bind file delete action **/
  $('#graduation_certificate').parents('.form-group').first().on('click', '.delete', function(){
    $(this).prop('disabled', true);
    var filelist = $(this).parents('.file-container').first();
    $.post('/modules/application/controllers/backend/application_form_field_graduation_certificate_remove.php', {
      fid: $(this).parents('li').first().attr('id'),
      furi: $(this).data('furi')
    }, function(data){
      if (data.error !== undefined) {
        alert("Failed to delete file. Error: "+data.error);
      }
      
      filelist = $('#'+data.fid).parents('.file-container');
      $('#'+data.fid).remove();
      filelistToTextarea(filelist, max_file_number);
    }, 'json');
    return false;
  });
  
  /** plupload Queue initialization **/
  
  $("#graduation_certificate_uploader").pluploadQueue({
      // General settings
      runtimes : 'html5,flash,silverlight,html4',
      url : "/modules/application/controllers/backend/application_form_field_graduation_certificate_upload.php",
      chunk_size : '1mb',
      rename : false,
      dragdrop: true,

      filters : {
          max_file_size : '1mb',
          mime_types: [
              {title : "Allowed files", extensions : "jpg,png,gif,zip,doc,docx,pdf"}
          ]
      },
      flash_swf_url : '/libraries/plupload/js/Moxie.swf',
      silverlight_xap_url : '/libraries/plupload/js/Moxie.xap',
      unique_names : true, // generate an unique file name for the uploaded file and send it as an additional argument - name, to server handling script
      multiple_queues : true // Re-activate the widget after each upload procedure.
      ,multi_selection : false
  });
  var uploader = $('#graduation_certificate_uploader').pluploadQueue();

  // when upload complete
  uploader.bind('UploadComplete', function(uploader, files){
    // append plup file list to textarea
    while (files[0] !== undefined) {
      if (files[0].status == plupload.DONE) {
        var existing_content = jQuery.trim($('#graduation_certificate').val());
        var to_be_added = (existing_content == '' ? '' : "\n") + 'files/cache/' + files[0].target_name.toLowerCase();
        $('#graduation_certificate').val(existing_content + to_be_added);
      }
      // and remove it from plup file list
      uploader.removeFile(files[0]);
    }
    // refresh file list
    textareaToFilelist($('#graduation_certificate'), max_file_number);
  });

  // when file(s) added
  uploader.bind('FilesAdded', function(uploader, files){
    var content = jQuery.trim($('#graduation_certificate').val());
    if (content == '') {
      var existing_files = [];
    } else {
      var existing_files = content.split("\n");
    }
    var added_files = uploader.files;
    if (existing_files.length + added_files.length > max_file_number) {
      alert('<?php echo i18n(array("en" => "Too many files selected. Max allowed upload limit is ","zh" => "您选择的文件过多了，最大允许的上传数为")) ?> ' + max_file_number + ' <?php echo i18n(array("en" => "files", "zh" => "")); ?>.' + ' <?php echo i18n(array("en" => "Only ", "zh" => "您上传的文件仅有")) ?>' + (max_file_number - existing_files.length) + ' <?php echo i18n(array("en" => "of your selected files are accepted", "zh" => "个文件被接受")) ?>.');
      for (i=uploader.files.length-1; i>(max_file_number - existing_files.length - 1); i--) {
        uploader.removeFile(uploader.files[i]);
      }
    }
  });

});
</script>
<!-- END OF js code for #graduation_certificate_uploader -->
  
    <div class="form-group">
      <label for="degree_certificate" class="col-sm-2 control-label">degree_certificate </label>
      <div class="col-sm-10">
        <textarea name="degree_certificate" id="degree_certificate" rows="5" class="form-control"><?php echo isset($_POST["degree_certificate"]) ? htmlentities($_POST["degree_certificate"]) : htmlentities($object->getDegreeCertificate()); ?></textarea>

        <div id="degree_certificate_uploader" class="uploader" style="display: none;">
            <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
        </div>

      </div>
    </div>
    <div class="hr-line-dashed"></div>

  
<!-- js code for #degree_certificate_uploader -->
<script type="text/javascript">
$(function() {
  /** define var **/
  var max_file_number = 10;
  
  /** build file list from textarea **/
  textareaToFilelist($('#degree_certificate'), max_file_number);
  
  /** bind file delete action **/
  $('#degree_certificate').parents('.form-group').first().on('click', '.delete', function(){
    $(this).prop('disabled', true);
    var filelist = $(this).parents('.file-container').first();
    $.post('/modules/application/controllers/backend/application_form_field_degree_certificate_remove.php', {
      fid: $(this).parents('li').first().attr('id'),
      furi: $(this).data('furi')
    }, function(data){
      if (data.error !== undefined) {
        alert("Failed to delete file. Error: "+data.error);
      }
      
      filelist = $('#'+data.fid).parents('.file-container');
      $('#'+data.fid).remove();
      filelistToTextarea(filelist, max_file_number);
    }, 'json');
    return false;
  });
  
  /** plupload Queue initialization **/
  
  $("#degree_certificate_uploader").pluploadQueue({
      // General settings
      runtimes : 'html5,flash,silverlight,html4',
      url : "/modules/application/controllers/backend/application_form_field_degree_certificate_upload.php",
      chunk_size : '1mb',
      rename : false,
      dragdrop: true,

      filters : {
          max_file_size : '1mb',
          mime_types: [
              {title : "Allowed files", extensions : "jpg,png,gif,zip,doc,docx,pdf"}
          ]
      },
      flash_swf_url : '/libraries/plupload/js/Moxie.swf',
      silverlight_xap_url : '/libraries/plupload/js/Moxie.xap',
      unique_names : true, // generate an unique file name for the uploaded file and send it as an additional argument - name, to server handling script
      multiple_queues : true // Re-activate the widget after each upload procedure.
      ,multi_selection : false
  });
  var uploader = $('#degree_certificate_uploader').pluploadQueue();

  // when upload complete
  uploader.bind('UploadComplete', function(uploader, files){
    // append plup file list to textarea
    while (files[0] !== undefined) {
      if (files[0].status == plupload.DONE) {
        var existing_content = jQuery.trim($('#degree_certificate').val());
        var to_be_added = (existing_content == '' ? '' : "\n") + 'files/cache/' + files[0].target_name.toLowerCase();
        $('#degree_certificate').val(existing_content + to_be_added);
      }
      // and remove it from plup file list
      uploader.removeFile(files[0]);
    }
    // refresh file list
    textareaToFilelist($('#degree_certificate'), max_file_number);
  });

  // when file(s) added
  uploader.bind('FilesAdded', function(uploader, files){
    var content = jQuery.trim($('#degree_certificate').val());
    if (content == '') {
      var existing_files = [];
    } else {
      var existing_files = content.split("\n");
    }
    var added_files = uploader.files;
    if (existing_files.length + added_files.length > max_file_number) {
      alert('<?php echo i18n(array("en" => "Too many files selected. Max allowed upload limit is ","zh" => "您选择的文件过多了，最大允许的上传数为")) ?> ' + max_file_number + ' <?php echo i18n(array("en" => "files", "zh" => "")); ?>.' + ' <?php echo i18n(array("en" => "Only ", "zh" => "您上传的文件仅有")) ?>' + (max_file_number - existing_files.length) + ' <?php echo i18n(array("en" => "of your selected files are accepted", "zh" => "个文件被接受")) ?>.');
      for (i=uploader.files.length-1; i>(max_file_number - existing_files.length - 1); i--) {
        uploader.removeFile(uploader.files[i]);
      }
    }
  });

});
</script>
<!-- END OF js code for #degree_certificate_uploader -->
  
    <div class="form-group">
      <label for="academic_transcripts" class="col-sm-2 control-label">academic_transcripts </label>
      <div class="col-sm-10">
        <textarea name="academic_transcripts" id="academic_transcripts" rows="5" class="form-control"><?php echo isset($_POST["academic_transcripts"]) ? htmlentities($_POST["academic_transcripts"]) : htmlentities($object->getAcademicTranscripts()); ?></textarea>

        <div id="academic_transcripts_uploader" class="uploader" style="display: none;">
            <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
        </div>

      </div>
    </div>
    <div class="hr-line-dashed"></div>

  
<!-- js code for #academic_transcripts_uploader -->
<script type="text/javascript">
$(function() {
  /** define var **/
  var max_file_number = 10;
  
  /** build file list from textarea **/
  textareaToFilelist($('#academic_transcripts'), max_file_number);
  
  /** bind file delete action **/
  $('#academic_transcripts').parents('.form-group').first().on('click', '.delete', function(){
    $(this).prop('disabled', true);
    var filelist = $(this).parents('.file-container').first();
    $.post('/modules/application/controllers/backend/application_form_field_academic_transcripts_remove.php', {
      fid: $(this).parents('li').first().attr('id'),
      furi: $(this).data('furi')
    }, function(data){
      if (data.error !== undefined) {
        alert("Failed to delete file. Error: "+data.error);
      }
      
      filelist = $('#'+data.fid).parents('.file-container');
      $('#'+data.fid).remove();
      filelistToTextarea(filelist, max_file_number);
    }, 'json');
    return false;
  });
  
  /** plupload Queue initialization **/
  
  $("#academic_transcripts_uploader").pluploadQueue({
      // General settings
      runtimes : 'html5,flash,silverlight,html4',
      url : "/modules/application/controllers/backend/application_form_field_academic_transcripts_upload.php",
      chunk_size : '1mb',
      rename : false,
      dragdrop: true,

      filters : {
          max_file_size : '1mb',
          mime_types: [
              {title : "Allowed files", extensions : "jpg,png,gif,zip,doc,docx,pdf"}
          ]
      },
      flash_swf_url : '/libraries/plupload/js/Moxie.swf',
      silverlight_xap_url : '/libraries/plupload/js/Moxie.xap',
      unique_names : true, // generate an unique file name for the uploaded file and send it as an additional argument - name, to server handling script
      multiple_queues : true // Re-activate the widget after each upload procedure.
      ,multi_selection : false
  });
  var uploader = $('#academic_transcripts_uploader').pluploadQueue();

  // when upload complete
  uploader.bind('UploadComplete', function(uploader, files){
    // append plup file list to textarea
    while (files[0] !== undefined) {
      if (files[0].status == plupload.DONE) {
        var existing_content = jQuery.trim($('#academic_transcripts').val());
        var to_be_added = (existing_content == '' ? '' : "\n") + 'files/cache/' + files[0].target_name.toLowerCase();
        $('#academic_transcripts').val(existing_content + to_be_added);
      }
      // and remove it from plup file list
      uploader.removeFile(files[0]);
    }
    // refresh file list
    textareaToFilelist($('#academic_transcripts'), max_file_number);
  });

  // when file(s) added
  uploader.bind('FilesAdded', function(uploader, files){
    var content = jQuery.trim($('#academic_transcripts').val());
    if (content == '') {
      var existing_files = [];
    } else {
      var existing_files = content.split("\n");
    }
    var added_files = uploader.files;
    if (existing_files.length + added_files.length > max_file_number) {
      alert('<?php echo i18n(array("en" => "Too many files selected. Max allowed upload limit is ","zh" => "您选择的文件过多了，最大允许的上传数为")) ?> ' + max_file_number + ' <?php echo i18n(array("en" => "files", "zh" => "")); ?>.' + ' <?php echo i18n(array("en" => "Only ", "zh" => "您上传的文件仅有")) ?>' + (max_file_number - existing_files.length) + ' <?php echo i18n(array("en" => "of your selected files are accepted", "zh" => "个文件被接受")) ?>.');
      for (i=uploader.files.length-1; i>(max_file_number - existing_files.length - 1); i--) {
        uploader.removeFile(uploader.files[i]);
      }
    }
  });

});
</script>
<!-- END OF js code for #academic_transcripts_uploader -->
  
    <div class="form-group">
      <label for="ielts_transcripts" class="col-sm-2 control-label">ielts_transcripts </label>
      <div class="col-sm-10">
        <textarea name="ielts_transcripts" id="ielts_transcripts" rows="5" class="form-control"><?php echo isset($_POST["ielts_transcripts"]) ? htmlentities($_POST["ielts_transcripts"]) : htmlentities($object->getIeltsTranscripts()); ?></textarea>

        <div id="ielts_transcripts_uploader" class="uploader" style="display: none;">
            <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
        </div>

      </div>
    </div>
    <div class="hr-line-dashed"></div>

  
<!-- js code for #ielts_transcripts_uploader -->
<script type="text/javascript">
$(function() {
  /** define var **/
  var max_file_number = 10;
  
  /** build file list from textarea **/
  textareaToFilelist($('#ielts_transcripts'), max_file_number);
  
  /** bind file delete action **/
  $('#ielts_transcripts').parents('.form-group').first().on('click', '.delete', function(){
    $(this).prop('disabled', true);
    var filelist = $(this).parents('.file-container').first();
    $.post('/modules/application/controllers/backend/application_form_field_ielts_transcripts_remove.php', {
      fid: $(this).parents('li').first().attr('id'),
      furi: $(this).data('furi')
    }, function(data){
      if (data.error !== undefined) {
        alert("Failed to delete file. Error: "+data.error);
      }
      
      filelist = $('#'+data.fid).parents('.file-container');
      $('#'+data.fid).remove();
      filelistToTextarea(filelist, max_file_number);
    }, 'json');
    return false;
  });
  
  /** plupload Queue initialization **/
  
  $("#ielts_transcripts_uploader").pluploadQueue({
      // General settings
      runtimes : 'html5,flash,silverlight,html4',
      url : "/modules/application/controllers/backend/application_form_field_ielts_transcripts_upload.php",
      chunk_size : '1mb',
      rename : false,
      dragdrop: true,

      filters : {
          max_file_size : '1mb',
          mime_types: [
              {title : "Allowed files", extensions : "jpg,png,gif,zip,doc,docx,pdf"}
          ]
      },
      flash_swf_url : '/libraries/plupload/js/Moxie.swf',
      silverlight_xap_url : '/libraries/plupload/js/Moxie.xap',
      unique_names : true, // generate an unique file name for the uploaded file and send it as an additional argument - name, to server handling script
      multiple_queues : true // Re-activate the widget after each upload procedure.
      ,multi_selection : false
  });
  var uploader = $('#ielts_transcripts_uploader').pluploadQueue();

  // when upload complete
  uploader.bind('UploadComplete', function(uploader, files){
    // append plup file list to textarea
    while (files[0] !== undefined) {
      if (files[0].status == plupload.DONE) {
        var existing_content = jQuery.trim($('#ielts_transcripts').val());
        var to_be_added = (existing_content == '' ? '' : "\n") + 'files/cache/' + files[0].target_name.toLowerCase();
        $('#ielts_transcripts').val(existing_content + to_be_added);
      }
      // and remove it from plup file list
      uploader.removeFile(files[0]);
    }
    // refresh file list
    textareaToFilelist($('#ielts_transcripts'), max_file_number);
  });

  // when file(s) added
  uploader.bind('FilesAdded', function(uploader, files){
    var content = jQuery.trim($('#ielts_transcripts').val());
    if (content == '') {
      var existing_files = [];
    } else {
      var existing_files = content.split("\n");
    }
    var added_files = uploader.files;
    if (existing_files.length + added_files.length > max_file_number) {
      alert('<?php echo i18n(array("en" => "Too many files selected. Max allowed upload limit is ","zh" => "您选择的文件过多了，最大允许的上传数为")) ?> ' + max_file_number + ' <?php echo i18n(array("en" => "files", "zh" => "")); ?>.' + ' <?php echo i18n(array("en" => "Only ", "zh" => "您上传的文件仅有")) ?>' + (max_file_number - existing_files.length) + ' <?php echo i18n(array("en" => "of your selected files are accepted", "zh" => "个文件被接受")) ?>.');
      for (i=uploader.files.length-1; i>(max_file_number - existing_files.length - 1); i--) {
        uploader.removeFile(uploader.files[i]);
      }
    }
  });

});
</script>
<!-- END OF js code for #ielts_transcripts_uploader -->

  <input type="submit" name="submit" value="<?php i18n_echo(array(
      'en' => 'Edit', 
      'zh' => '编辑'
  )) ?>" class="btn btn-default">
</form>
          
        </div>
      </div>
    </div>
  </div>
</div>

