<div id="page-wrapper">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header"><?php i18n_echo(array(
        'en' => 'Meta tag',
        'zh' => 'Meta tag',
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
          
<form class="form-horizontal" role="form" method="POST" action="<?php echo uri('admin/meta/edit/' . $object->getId()) ?>">
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='copyright'>copyright </label>
  <div class='col-sm-10'>
    <textarea class='form-control' rows='5' id='copyright' name='copyright'><?php echo ($object->isNew() ? (isset($_POST['copyright']) ? htmlentities($_POST['copyright']) : '') : htmlentities($object->getCopyright())) ?></textarea>
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='description'>description </label>
  <div class='col-sm-10'>
    <textarea class='form-control' rows='5' id='description' name='description'><?php echo ($object->isNew() ? (isset($_POST['description']) ? htmlentities($_POST['description']) : '') : htmlentities($object->getDescription())) ?></textarea>
  </div>
</div>
<div class='hr-line-dashed'></div>
  
<div class='form-group'>
  <label class='col-sm-2 control-label' for='keywords'>keywords </label>
  <div class='col-sm-10'>
    <textarea class='form-control' rows='5' id='keywords' name='keywords'><?php echo ($object->isNew() ? (isset($_POST['keywords']) ? htmlentities($_POST['keywords']) : '') : htmlentities($object->getKeywords())) ?></textarea>
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

