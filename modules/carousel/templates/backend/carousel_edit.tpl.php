<div id="page-wrapper">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header"><?php i18n_echo(array(
        'en' => 'Carousel',
        'zh' => '首页横幅',
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
          
<form class="form-horizontal" role="form" method="POST" action="<?php echo uri('admin/carousel/edit/' . $object->getId()) ?>">
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='title'>title <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['title']) ? strip_tags($_POST['title']) : '') : $object->getTitle()))) ?>' type='text' class='form-control' id='title' name='title' required />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group' id='image'>
  <label class='col-sm-2 control-label'>image <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <textarea name='image' style='display: none;'></textarea>
    <div class='file-fields'></div>

  </div>
</div>
<div class='hr-line-dashed'></div>

<?php
  // get json string of prepopulated image links
  $prepopulate = $object->isNew() ? '' : $object->getImage();
  if ($prepopulate != '') {
    $tokens = explode("\n", trim($prepopulate));
    $prepopulate = array();
    foreach ($tokens as $token) {
      $prepopulate[] = trim($token, "\n\r");
    }
  }
?>

<script>
  $(function(){
    var container = $('#image');

    // initial value to pop
    var initial_images = <?php echo $prepopulate == '' ? '""' : json_encode($prepopulate); ?>;
    if (initial_images != '') {
      for (var i in initial_images) {
        img = initial_images[i];
        var html = addImageRow(img, false);
        $('.file-fields', container).append(html);
      }
    } else {
      var html = addImageRow(false, true);
      $('.file-fields', container).append(html);
    }

    updateHiddenTextarea(container);
    // action when click select file button
    $(document).on('click', '#image .select', function(){
      var tr = $(this).parents('.file-field');
      $('input[type=file]', tr).click();
      $('.upload', tr).prop('disabled', false);
    });
    // action when file filed is changed (we do validation here)
    $(document).on('change', '#image input[type=file]', function(){
      var tr = $(this).parents('.file-field');
      var file = this.files[0];
      if (!file.type.match(/^image/)) {
        alert('<?php echo i18n(array('en' => 'Upload file needs to be an image file', 'zh' => '上传文件需为图片文件')) ?>');
      } else if (file.size > (4 * 1000 * 1000)) {
        alert('<?php echo i18n(array('en' => 'File size should be less than', 'zh' => '文件大小应小于')) . ' 4MB' ?>');
      } else {
        var reader = new FileReader();
        reader.onload = (function(e){
          $('.preview', tr).html('<img src="'+e.target.result+'" style="height:150px;" />');
        });
        reader.readAsDataURL(this.files[0]);
      }
    });
    // action when adding an new image row
    $(document).on('click', '#image .add', function(){
      var html = addImageRow(false, true);
      $('.file-fields', container).append(html);
    });
    // action when uploading image via ajax
    $(document).on('click', '#image .upload', function(){
      var tr = $(this).parents('.file-field');
      var file_field = $('input[type=file]', tr);
      var file = file_field[0].files[0];

      var formData = new FormData();
      formData.append('file', file, file.name);
      $('.btn', tr).prop('disabled', true);
      $('.upload i', tr).removeClass('fa-upload').addClass('fa-spin').addClass('fa-spinner');
      $.ajax({
        url: '<?php echo uri("modules/carousel/controllers/backend/carousel_form_field_image.php" ,false) ?>',
        type: 'POST',
        data: formData,
        cache: false,
        dataType: 'json',
        processData: false, // Don't process the files
        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        success: function(data, textStatus, jqXHR) {
          if (typeof(data.error) !== 'undefined') {
            alert('<?php echo i18n(array('en' => 'Error: ', 'zh' => '错误: ')) ?>' + data.error);
          } else {
            tr.html(addImageRow(data.uri, false));;
            $('.remove',tr).data('uri', data.uri);
            updateHiddenTextarea(container);
          }
          $('.btn', tr).prop('disabled', false);
          $('.upload i', tr).removeClass('fa-spin').removeClass('fa-spinner').addClass('fa-upload');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('<?php echo i18n(array('en' => 'ajax error: ', 'zh' => 'ajax失败')) ?>: ' + textStatus);
          $('.btn', tr).prop('disabled', false);
          $('.upload i', tr).removeClass('fa-spin').removeClass('fa-spinner').addClass('fa-upload');
        }
      });
    });
    // action when removing an image
    $(document).on('click', '#image .remove', function(){
      var tr = $(this).parents('.file-field');
      if (typeof($(this).data('uri')) !== 'undefined') {
        var img = $(this).data('uri');
        $('.btn', tr).prop('disabled', true);
        $('.remove i', tr).addClass('fa-spin').addClass('fa-spinner').removeClass('fa-remove');
        // ajax to remove the image
        $.ajax({
          url: '<?php echo uri("modules/carousel/controllers/backend/carousel_form_field_image"."_remove.php" ,false) ?>?path=' + encodeURIComponent(img),
          type: 'POST',
          dataType: 'json',
          success: function(data, textStatus, jqXHR) {
            if (typeof(data.error) !== 'undefined') {
              alert('<?php echo i18n(array('en' => 'Error: ', 'zh' => '错误: ')) ?>' + data.error);
tr.html(addImageRow(false, true));
              updateHiddenTextarea(container);
            } else {
tr.html(addImageRow(false, true));
              updateHiddenTextarea(container);
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            alert('<?php echo i18n(array('en' => 'ajax error: ', 'zh' => 'ajax失败')) ?>: ' + textStatus);
            $('.btn', tr).prop('disabled', false);
            $('.remove i', tr).removeClass('fa-spin').removeClass('fa-spinner').addClass('fa-remove');
            updateHiddenTextarea(container);  
          }
        });
      } else {

      }
    });

    // functions
    function addImageRow(img, isnew) {
      var img_html = img ? '<img src="/<?php echo get_sub_root() ?>'+img+'" style="height:150px;" />' : '<div style="height:150px;width:200px;background-color:#AAA;"></div>';
      var upload_button = isnew ? 
        '<button type="button" class="btn btn-default btn-sm upload" disabled><i class="fa fa-upload"></i></button>' :
        '<!-- <button type="button" class="btn btn-default btn-sm upload" disabled><i class="fa fa-upload"></i></button> -->';
      var select_button = isnew ?
        '<button type="button" class="btn btn-default btn-sm select"><i class="fa fa-file"></i></button>' :
        '<!-- <button type="button" class="btn btn-default btn-sm select"><i class="fa fa-file"></i></button> -->';
      var data_uri = isnew ? '' : 'data-uri="'+img+'"';
      return ('\n\
    <div class="file-field" style="margin-bottom:6px; position:relative;">\n\
      <div class="preview">'+img_html+'</div>\n\
      <div class="btn-group" style="position:absolute; bottom:5px; left:5px; " aria-label="...">\n\
        <input type="file" class="btn btn-default btn-sm" style="display:none;" />\n\
        '+select_button+'\n\
        '+upload_button+'\n\
        <button type="button" class="btn btn-default btn-sm remove" '+data_uri+'><i class="fa fa-remove"></i></button>\n\
      </div>\n\
    </div>');
    }

    function updateHiddenTextarea(container) {
      var html = '';
      $('.preview img', container).each(function(){
        var uri = $(this).attr('src');
        // remove subroot
        var subroot = '<?php echo get_sub_root() ?>';
        uri = uri.substr(subroot.length+1, uri.length-1);
        html = html + uri + "\n";
      });
      $('textarea', container).val(html);
    }
  });
</script>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='content'>content <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <textarea class='form-control' rows='5' id='content' name='content' required><?php echo ($object->isNew() ? (isset($_POST['content']) ? htmlentities($_POST['content']) : '') : htmlentities($object->getContent())) ?></textarea>
  </div>
</div>
<div class='hr-line-dashed'></div>

<script type='text/javascript' src='/libraries/ckeditor/ckeditor.js'></script>
<script type='text/javascript'>CKEDITOR.replace('content', {
  toolbar: [
    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
    { name: 'paragraph', groups: [ 'list', 'indent', 'align' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
    { name: 'links', items: [ 'Link', 'Unlink' ] },
    { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'Iframe' ] },
    '/',
    { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
    { name: 'colors', items: [ 'TextColor' ] },
    { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
    { name: 'tools', items: [ 'Maximize' ] }
  ]
}
);</script>  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='button_text'>button_text <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['button_text']) ? strip_tags($_POST['button_text']) : '') : $object->getButtonText()))) ?>' type='text' class='form-control' id='button_text' name='button_text' required />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='button_link'>button_link <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['button_link']) ? strip_tags($_POST['button_link']) : '') : $object->getButtonLink()))) ?>' type='text' class='form-control' id='button_link' name='button_link' required />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='weight'>weight </label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['weight']) ? strip_tags($_POST['weight']) : '') : $object->getWeight()))) ?>' type='text' class='form-control' id='weight' name='weight' />
  </div>
</div>
<div class='hr-line-dashed'></div>

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

