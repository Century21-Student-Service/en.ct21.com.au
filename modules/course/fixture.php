<?php

require_once __DIR__ . DS . '..' . DS . '..' . DS . 'bootstrap.php';

if (is_cli()) {
  $course = new Course();
  $course->setTitle('超值英语课程每周仅$145');
  $course->setCountryId(1);
  $course->setUrl('http://www.unsw.edu.au');
  $course->setWeight(0);
  $course->setContent('
<h3>学费：</h3>
<ol>
<li>普通英语课程 (报读五周以上)：<br />
A) 早班：星期一至星期五（8:15am – 12:30pm）, 每周学费$180
<br />
B) 午班 ：星期一至星期五（12:45pm – 5:00pm）, 每周学费$145
<br />
C) 晚班 ：星期一至星期五（5:15pm – 09:30pm）, 每周学费$160
</li>

<li>雅思预备课程(读五周以上)：<br />
A) 早班 : 星期一至星期四,  (8:45am – 2:30pm) ，每周学费$190
<br />
B) 晚班 : 星期一至星期五, (4:00pm – 8:30pm  ) ，每周学费$190
</li>
</ol>

<h3>院校介绍：</h3>
<p>
位于新南威尔士州悉尼市，是澳大利亚一所历史悠久的私立学院。学院提供英语方面的课程，包括通用英语，雅思预备英语课程，学术英语课程。同时，学院还提供商务三级证书，商务四级证书和商务文凭的职业教育商专课程。 
</p>
');
  $course->save();
  
  
  
  $course = new Course();
  $course->setTitle('证书和文凭课程, 每三个月学费仅A$1,300,半年仅$2300');
  $course->setCountryId(1);
  $course->setWeight(1);
  $course->setContent('
<p>三级证书，四级证书，管理文凭课程，每三个月仅$1300，六个月学费一次付清只需 $2,300</p>
<p>
A) 三级证书，Certificate III in Busines:
<br />
六个月学费分两次支付： $1,300 / 3 个月
<br />
六个月学费一次付清只需 $2,300 / 6 个月
<br />
早班 ：星期三至星期四, (8:30am – 5:00pm)
<br />
晚班 :  星期一至星期三, (5:00pm – 10:00pm )
<br />
</p>
<p>
B) 四级证书，Certificate III in Busines:
<br />
九个月学费可分3次支付： $1,300 / 3个月
<br />
早班 : 星期一至星期二  (8:00am – 5:00pm ) + 星期三 (8:00am – 12:00pm)
<br />
晚班 : 星期一至星期四, (5:00pm – 10:00pm )
<br />
</p>
<p>
C) 管理学文凭,  Diploma of Management
<br />
九个月学费可分3次支付： $1,300 /  3个月
<br />
早班 : 星期一至星期二  (8:00am – 5:00pm ) + 星期三 (8:00am – 12:00pm)
<br />
晚班 : 星期一至星期四  (5:00pm – 10:00pm )
<br />
</p>

<h3>院校介绍：</h3>
<p>
位于悉尼市中心，近Town Hall火车站，是一所有着悠久历史的私立学院。学院不仅提供各种专业的三级证书，四级证书和文凭课程，还提供全方位的英语课程，包括通用英语，雅思准备课程，学术英语等。其学费在悉尼是最具竞争力的。 
</p>
');
  $course->save();
}