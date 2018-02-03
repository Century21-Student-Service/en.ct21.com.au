<div id="page-wrapper">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header"><?php i18n_echo(array(
        'en' => 'Course',
        'zh' => '推荐课程',
      )); ?></h1>
    </div>
  </div>
  
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading"><?php i18n_echo(array(
            'en' => 'Create', 
            'zh' => '创建'
        )) ?></div>
        <div class="panel-body">
          
        <?php echo Message::renderMessages(); ?>
          
<form class="form-horizontal" role="form" method="POST" action="<?php echo uri('admin/course/create') ?>">
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='title'>title <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['title']) ? strip_tags($_POST['title']) : '') : $object->getTitle()))) ?>' type='text' class='form-control' id='title' name='title' required />
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label'>country_id <span style="color: rgb(185,2,0); font-weight: bold;">*</span></label>
  <div class='col-sm-10'>
    <select class='form-control' id='country_id' name='country_id'>
<?php foreach (Country::findAll() as $country): ?>
      <option value='<?php echo $country->getId() ?>' <?php echo ($object->isNew() ? (isset($_POST['country_id']) ? ($_POST['country_id'] == $country->getId() ? 'selected="selected"' : '') : '') : ($object->getCountryId() == $country->getId() ? "selected='selected'" : "")) ?>><?php echo $country->getName() ?></option>
<?php endforeach; ?>
    </select>
  </div>
</div>
<div class='hr-line-dashed'></div>
  
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
  <label class='col-sm-2 control-label' for='url'>url </label>
  <div class='col-sm-10'>
    <input value='<?php echo htmlentities(str_replace('\'', '"', ($object->isNew() ? (isset($_POST['url']) ? strip_tags($_POST['url']) : '') : $object->getUrl()))) ?>' type='text' class='form-control' id='url' name='url' />
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
      'en' => 'Create', 
      'zh' => '创建'
  )) ?>" class="btn btn-default">
</form>
          
        </div>
      </div>
    </div>
  </div>
</div>

