<?php

$object = new Application();

// bootstrap field widgets
FormWidgetPlupfile::bootstrap('passport');
FormWidgetPlupfile::bootstrap('graduation_certificate');
FormWidgetPlupfile::bootstrap('degree_certificate');
FormWidgetPlupfile::bootstrap('academic_transcripts');
FormWidgetPlupfile::bootstrap('ielts_transcripts');
  
// handle form submission
if (isset($_POST['submit'])) {
  $error_flag = false;

  /// validation
  
  // validation for $name
  $name = isset($_POST["name"]) ? strip_tags($_POST["name"]) : null;
  if (empty($name)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "name is required.", "zh" => "请填写name"))));
    $error_flag = true;
  }
  
  // validation for $dob
  $dob = isset($_POST["dob"]) ? strip_tags($_POST["dob"]) : null;
  if (empty($dob)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "dob is required.", "zh" => "请填写dob"))));
    $error_flag = true;
  }
  
  // validation for $address
  $address = isset($_POST["address"]) ? strip_tags($_POST["address"]) : null;  
  // validation for $postcode
  $postcode = isset($_POST["postcode"]) ? strip_tags($_POST["postcode"]) : null;  
  // validation for $phone
  $phone = isset($_POST["phone"]) ? strip_tags($_POST["phone"]) : null;  
  // validation for $mobile
  $mobile = isset($_POST["mobile"]) ? strip_tags($_POST["mobile"]) : null;
  if (empty($mobile)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "mobile is required.", "zh" => "请填写mobile"))));
    $error_flag = true;
  }
  
  // validation for $qq
  $qq = isset($_POST["qq"]) ? strip_tags($_POST["qq"]) : null;  
  // validation for $email
  $email = isset($_POST["email"]) ? strip_tags($_POST["email"]) : null;
  if (empty($email)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "email is required.", "zh" => "请填写email"))));
    $error_flag = true;
  }
  
  // validation for $education
  $education = isset($_POST["education"]) ? strip_tags($_POST["education"]) : null;
  if (empty($education)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "education is required.", "zh" => "请填写education"))));
    $error_flag = true;
  }
  
  // validation for $graduate_institution
  $graduate_institution = isset($_POST["graduate_institution"]) ? strip_tags($_POST["graduate_institution"]) : null;
  if (empty($graduate_institution)) {
    Message::register(new Message(Message::DANGER, i18n(array("en" => "graduate_institution is required.", "zh" => "请填写graduate_institution"))));
    $error_flag = true;
  }
  
  // validation for $ielts
  $ielts = isset($_POST["ielts"]) ? strip_tags($_POST["ielts"]) : null;  
  // validation for $apply_country
  $apply_country = isset($_POST["apply_country"]) ? strip_tags($_POST["apply_country"]) : null;  
  // validation for $apply_institution
  $apply_institution = isset($_POST["apply_institution"]) ? strip_tags($_POST["apply_institution"]) : null;  
  // validation for $apply_course
  $apply_course = isset($_POST["apply_course"]) ? strip_tags($_POST["apply_course"]) : null;  
  // validation for $comment
  $comment = isset($_POST["comment"]) ? $_POST["comment"] : null;
//  if (empty($comment)) {
//    Message::register(new Message(Message::DANGER, i18n(array("en" => "comment is required.", "zh" => "请填写comment"))));
//    $error_flag = true;
//  }
  
  // validation for $passport
  $passport = isset($_POST["passport"]) ? strip_tags(trim($_POST["passport"])) : null;
  // check upload_dir
  if (!is_dir(WEBROOT . DS . "files/application")) {
    mkdir(WEBROOT . DS . "files/application");
  }
  if (!is_writable(WEBROOT . DS . "files/application")) {
    $error_flag = true;
    Message::register(new Message(Message::DANGER, i18n(array("en" => "Upload dir is not writable.", "zh" => "上传文件夹不可写"))));
  } else {
    $files = explode("\n", trim($passport));
    // check max_file_number
    if (sizeof($files) > 10) {
      Message::register(new Message(Message::DANGER, i18n(array("en" => "Max file allowed to be uploed is 10. Please reduce uploaed files.", "zh" => "您最多可以上传10个文件，请减少上传的文件数量"))));
      $error_flag = true;
    }
    // check file extension
    foreach ($files as $file) {
      $file = trim($file);
      if (sizeof($files) == 1 && $file == "") {
        break;
      }
      $tokens = explode(".", $file);
      $extension = array_pop($tokens);
      if (!in_array(strtolower($extension), array('jpg','png','gif','zip','doc','docx','pdf'))) {
        Message::register(new Message(Message::DANGER, i18n(array("en" => "Only file with extension jpg,png,gif,zip,doc,docx,pdf is allowed. Please restrict your files with these types.", "zh" => "上传文件仅支持jpg,png,gif,zip,doc,docx,pdf，请检查您的上传文件"))));
        $error_flag = true;
        break;
      }
    }
  }
  
  // validation for $graduation_certificate
  $graduation_certificate = isset($_POST["graduation_certificate"]) ? strip_tags(trim($_POST["graduation_certificate"])) : null;
  // check upload_dir
  if (!is_dir(WEBROOT . DS . "files/application")) {
    mkdir(WEBROOT . DS . "files/application");
  }
  if (!is_writable(WEBROOT . DS . "files/application")) {
    $error_flag = true;
    Message::register(new Message(Message::DANGER, i18n(array("en" => "Upload dir is not writable.", "zh" => "上传文件夹不可写"))));
  } else {
    $files = explode("\n", trim($graduation_certificate));
    // check max_file_number
    if (sizeof($files) > 10) {
      Message::register(new Message(Message::DANGER, i18n(array("en" => "Max file allowed to be uploed is 10. Please reduce uploaed files.", "zh" => "您最多可以上传10个文件，请减少上传的文件数量"))));
      $error_flag = true;
    }
    // check file extension
    foreach ($files as $file) {
      $file = trim($file);
      if (sizeof($files) == 1 && $file == "") {
        break;
      }
      $tokens = explode(".", $file);
      $extension = array_pop($tokens);
      if (!in_array(strtolower($extension), array('jpg','png','gif','zip','doc','docx','pdf'))) {
        Message::register(new Message(Message::DANGER, i18n(array("en" => "Only file with extension jpg,png,gif,zip,doc,docx,pdf is allowed. Please restrict your files with these types.", "zh" => "上传文件仅支持jpg,png,gif,zip,doc,docx,pdf，请检查您的上传文件"))));
        $error_flag = true;
        break;
      }
    }
  }
  
  // validation for $degree_certificate
  $degree_certificate = isset($_POST["degree_certificate"]) ? strip_tags(trim($_POST["degree_certificate"])) : null;
  // check upload_dir
  if (!is_dir(WEBROOT . DS . "files/application")) {
    mkdir(WEBROOT . DS . "files/application");
  }
  if (!is_writable(WEBROOT . DS . "files/application")) {
    $error_flag = true;
    Message::register(new Message(Message::DANGER, i18n(array("en" => "Upload dir is not writable.", "zh" => "上传文件夹不可写"))));
  } else {
    $files = explode("\n", trim($degree_certificate));
    // check max_file_number
    if (sizeof($files) > 10) {
      Message::register(new Message(Message::DANGER, i18n(array("en" => "Max file allowed to be uploed is 10. Please reduce uploaed files.", "zh" => "您最多可以上传10个文件，请减少上传的文件数量"))));
      $error_flag = true;
    }
    // check file extension
    foreach ($files as $file) {
      $file = trim($file);
      if (sizeof($files) == 1 && $file == "") {
        break;
      }
      $tokens = explode(".", $file);
      $extension = array_pop($tokens);
      if (!in_array(strtolower($extension), array('jpg','png','gif','zip','doc','docx','pdf'))) {
        Message::register(new Message(Message::DANGER, i18n(array("en" => "Only file with extension jpg,png,gif,zip,doc,docx,pdf is allowed. Please restrict your files with these types.", "zh" => "上传文件仅支持jpg,png,gif,zip,doc,docx,pdf，请检查您的上传文件"))));
        $error_flag = true;
        break;
      }
    }
  }
  
  // validation for $academic_transcripts
  $academic_transcripts = isset($_POST["academic_transcripts"]) ? strip_tags(trim($_POST["academic_transcripts"])) : null;
  // check upload_dir
  if (!is_dir(WEBROOT . DS . "files/application")) {
    mkdir(WEBROOT . DS . "files/application");
  }
  if (!is_writable(WEBROOT . DS . "files/application")) {
    $error_flag = true;
    Message::register(new Message(Message::DANGER, i18n(array("en" => "Upload dir is not writable.", "zh" => "上传文件夹不可写"))));
  } else {
    $files = explode("\n", trim($academic_transcripts));
    // check max_file_number
    if (sizeof($files) > 10) {
      Message::register(new Message(Message::DANGER, i18n(array("en" => "Max file allowed to be uploed is 10. Please reduce uploaed files.", "zh" => "您最多可以上传10个文件，请减少上传的文件数量"))));
      $error_flag = true;
    }
    // check file extension
    foreach ($files as $file) {
      $file = trim($file);
      if (sizeof($files) == 1 && $file == "") {
        break;
      }
      $tokens = explode(".", $file);
      $extension = array_pop($tokens);
      if (!in_array(strtolower($extension), array('jpg','png','gif','zip','doc','docx','pdf'))) {
        Message::register(new Message(Message::DANGER, i18n(array("en" => "Only file with extension jpg,png,gif,zip,doc,docx,pdf is allowed. Please restrict your files with these types.", "zh" => "上传文件仅支持jpg,png,gif,zip,doc,docx,pdf，请检查您的上传文件"))));
        $error_flag = true;
        break;
      }
    }
  }
  
  // validation for $ielts_transcripts
  $ielts_transcripts = isset($_POST["ielts_transcripts"]) ? strip_tags(trim($_POST["ielts_transcripts"])) : null;
  // check upload_dir
  if (!is_dir(WEBROOT . DS . "files/application")) {
    mkdir(WEBROOT . DS . "files/application");
  }
  if (!is_writable(WEBROOT . DS . "files/application")) {
    $error_flag = true;
    Message::register(new Message(Message::DANGER, i18n(array("en" => "Upload dir is not writable.", "zh" => "上传文件夹不可写"))));
  } else {
    $files = explode("\n", trim($ielts_transcripts));
    // check max_file_number
    if (sizeof($files) > 10) {
      Message::register(new Message(Message::DANGER, i18n(array("en" => "Max file allowed to be uploed is 10. Please reduce uploaed files.", "zh" => "您最多可以上传10个文件，请减少上传的文件数量"))));
      $error_flag = true;
    }
    // check file extension
    foreach ($files as $file) {
      $file = trim($file);
      if (sizeof($files) == 1 && $file == "") {
        break;
      }
      $tokens = explode(".", $file);
      $extension = array_pop($tokens);
      if (!in_array(strtolower($extension), array('jpg','png','gif','zip','doc','docx','pdf'))) {
        Message::register(new Message(Message::DANGER, i18n(array("en" => "Only file with extension jpg,png,gif,zip,doc,docx,pdf is allowed. Please restrict your files with these types.", "zh" => "上传文件仅支持jpg,png,gif,zip,doc,docx,pdf，请检查您的上传文件"))));
        $error_flag = true;
        break;
      }
    }
  }
  /// proceed submission
  
  // proceed for $name
  $object->setName($name);
  
  // proceed for $dob
  $object->setDob($dob);
  
  // proceed for $address
  $object->setAddress($address);
  
  // proceed for $postcode
  $object->setPostcode($postcode);
  
  // proceed for $phone
  $object->setPhone($phone);
  
  // proceed for $mobile
  $object->setMobile($mobile);
  
  // proceed for $qq
  $object->setQq($qq);
  
  // proceed for $email
  $object->setEmail($email);
  
  // proceed for $education
  $object->setEducation($education);
  
  // proceed for $graduate_institution
  $object->setGraduateInstitution($graduate_institution);
  
  // proceed for $ielts
  $object->setIelts($ielts);
  
  // proceed for $apply_country
  if (!empty($apply_country)) {
    $object->setApplyCountry($apply_country);
  }
  
  // proceed for $apply_institution
  $object->setApplyInstitution($apply_institution);
  
  // proceed for $apply_course
  $object->setApplyCourse($apply_course);
  
  // proceed for $comment
  $object->setComment($comment);
  
  // proceed for $passport
  $files = explode("\n", trim($passport));
  $rtn = array();
  foreach ($files as $file) {
    $file = trim($file);
    // for cache file, we move it to its proper location 
    if (strpos($file, str_replace(WEBROOT . DS, "", CACHE_DIR)) === 0) {
      $oldname = WEBROOT . DS . $file;
      $newname = WEBROOT . DS . "files/application" . str_replace(CACHE_DIR, "", WEBROOT . DS . $file);
      rename($oldname, $newname);
      $file = str_replace(WEBROOT . DS, "", $newname);
    }
    $rtn[] = $file;
  }
  $object->setPassport(implode("\n", $rtn));
  
  // proceed for $graduation_certificate
  $files = explode("\n", trim($graduation_certificate));
  $rtn = array();
  foreach ($files as $file) {
    $file = trim($file);
    // for cache file, we move it to its proper location 
    if (strpos($file, str_replace(WEBROOT . DS, "", CACHE_DIR)) === 0) {
      $oldname = WEBROOT . DS . $file;
      $newname = WEBROOT . DS . "files/application" . str_replace(CACHE_DIR, "", WEBROOT . DS . $file);
      rename($oldname, $newname);
      $file = str_replace(WEBROOT . DS, "", $newname);
    }
    $rtn[] = $file;
  }
  $object->setGraduationCertificate(implode("\n", $rtn));
  
  // proceed for $degree_certificate
  $files = explode("\n", trim($degree_certificate));
  $rtn = array();
  foreach ($files as $file) {
    $file = trim($file);
    // for cache file, we move it to its proper location 
    if (strpos($file, str_replace(WEBROOT . DS, "", CACHE_DIR)) === 0) {
      $oldname = WEBROOT . DS . $file;
      $newname = WEBROOT . DS . "files/application" . str_replace(CACHE_DIR, "", WEBROOT . DS . $file);
      rename($oldname, $newname);
      $file = str_replace(WEBROOT . DS, "", $newname);
    }
    $rtn[] = $file;
  }
  $object->setDegreeCertificate(implode("\n", $rtn));
  
  // proceed for $academic_transcripts
  $files = explode("\n", trim($academic_transcripts));
  $rtn = array();
  foreach ($files as $file) {
    $file = trim($file);
    // for cache file, we move it to its proper location 
    if (strpos($file, str_replace(WEBROOT . DS, "", CACHE_DIR)) === 0) {
      $oldname = WEBROOT . DS . $file;
      $newname = WEBROOT . DS . "files/application" . str_replace(CACHE_DIR, "", WEBROOT . DS . $file);
      rename($oldname, $newname);
      $file = str_replace(WEBROOT . DS, "", $newname);
    }
    $rtn[] = $file;
  }
  $object->setAcademicTranscripts(implode("\n", $rtn));
  
  // proceed for $ielts_transcripts
  $files = explode("\n", trim($ielts_transcripts));
  $rtn = array();
  foreach ($files as $file) {
    $file = trim($file);
    // for cache file, we move it to its proper location 
    if (strpos($file, str_replace(WEBROOT . DS, "", CACHE_DIR)) === 0) {
      $oldname = WEBROOT . DS . $file;
      $newname = WEBROOT . DS . "files/application" . str_replace(CACHE_DIR, "", WEBROOT . DS . $file);
      rename($oldname, $newname);
      $file = str_replace(WEBROOT . DS, "", $newname);
    }
    $rtn[] = $file;
  }
  $object->setIeltsTranscripts(implode("\n", $rtn));
  $object->setCreatedAt(time());
  if ($error_flag == false) {
    if ($object->save()) {
      Message::register(new Message(Message::SUCCESS, i18n(array("en" => "Thanks for your application. We will come back to you as soon as possible.", "zh" => "记录保存成功"))));
      sendemailAdmin('Apply for course', '<p>A new application for course has just been submitted: <br /><a href="http://en.ct21.com.au/admin/application/edit/'.$object->getId().'">http://en.ct21.com.au/admin/application/edit/'.$object->getId().'</a></p>');
      HTML::forwardBackToReferer();
    } else {
      Message::register(new Message(Message::DANGER, i18n(array("en" => "Record failed to save", "zh" => "记录保存失败"))));
    }
  }
}



$html = new HTML();

$html->renderOut('core/backend/html_header', array(
  'title' => i18n(array(
  'en' => 'Create Application',
  'zh' => 'Create 申请',
  )),
));
$html->output('<div id="wrapper">');
$html->renderOut('core/backend/header');


$html->renderOut('application/backend/application_create', array(
  'object' => $object
));


$html->output('</div>');

$html->renderOut('core/backend/html_footer');

exit;

