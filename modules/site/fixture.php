<?php

require_once __DIR__ . DS . '..' . DS . '..' . DS . 'bootstrap.php';
$settings = Vars::getSettings();

if (is_cli()) {
  // about us
  $page = new Page();
  $page->setUri('about');
  $page->setTitle('About Us');
  $page->setReserved(1);
  $page->setContent('
<p>Established in 1995, Century 21 Student Service Centre is a professional, well-established and highly reputable education consulting & student service company. Over the past decade, the Centre has successfully assisted over ten thousands of international students to study in a wide range of education sectors in many counties.</p>

<p>The aim of our services is to provide international students with a clear pathway, in which their goals in education, career & lives can be attained successfully through high quality and appropriate education advice.</p>

<p>We represent hundreds of public and private schools and education institutions all around the world, including: Australia, New Zealand, China, Japan, Korea, Canada, USA, Switzerland, France, Germany, Austria, U.K., Ireland and Singapore. Courses cover all education sectors: Primary and High School, University (Bachelor, Master, PHD, and Foundation courses), Vocational/Polytechnic Courses, TAFE, Languages, Arts, Music and many others.</p>

<p>In addition, our staffs come from many different countries and speak many languages, including English, Chinese (Mandarin, Cantonese), Japanese and Korean. All our staffs hold bachelor or master degrees from Australian, New Zealand Canada, U.K. and other western countries’ universities. We can counsel students in their own languages and fully understand their educational & cultural backgrounds and concerns. Through our well understanding of many countries education system and strength of institutes, and our professional knowledge and experience, we always give our students expertise and professional advice and best arrangement, to lay the foundation of successful in education for our students.</p>

<p>Our students come from many different countries and regions, including China, Hong Kong, Japan, Taiwan, Malaysia, other Asian countries and Europe. We have successfully arranged courses and enrolments for over ten thousand international students to study in Australia, New Zealand, Japan, China, Canada, UK and Ireland.</p>

<p>Through our long-standing professional and conscientious services, we have built up our reputation and established a high degree of trust with students, their parents and institutions. We have a very high success rate for school and student visa applications, all of these factors have led to an excellent service for our students. In 2007, 2008, and 2009, we have been continually award for “Top Performance Agent” by NSW Department of Education and Training for the excellence performance in representing TAFE NSW and NSW Government Schools.</p>

<p>Our business is improving & expanding continuously, in order to provide high quality services for students. We have set up branch office in Shanghai in June 1999, then branch office in Fuzhou, China in 2005 and branch office in Chengdu, China in 2007, This indeed provides better and closer services to Chinese students and further expands the "study abroad" education market in China.</p>

<p>At the same time, we have representative offices in different regions and countries located in Japan, Korea and Hong Kong etc., in order to offer more convenient services for the students there.</p>

<p>At the beginning of a new millennium, we would like to cooperate with you to explore the enormous future of 21st century.</p>
');
  $page->save();
  
  // our services
  $page = new Page();
  $page->setUri('services');
  $page->setTitle('Our Services');
  $page->setReserved(1);
  $page->setContent('
<h3>Study Abroad Advisory</h3>
<p>We offer a totally free advisory service in different countries for students to study overseas - information about the environment, education standards, school entry requirements, visa criteria and application procedures. Also, we can recommend suitable countries, institutes and courses for students.</p>

<h3>Institute Information</h3>
<p>We offer the most up-to-date schools or institutions information in relation to the availability of courses, courses outline, entry requirements, tuition fee details etc.</p>

<h3>Institutes and Courses Analysis</h3>
<p>We offer specialised advice and analysis about an institutions background and strengths. Including the graduate performances in various institutes, job market trend analysis etc. To help students choose the right institute course.</p>

<h3>School & Institution Applications and Enrolments</h3>
<p>We offer professional and efficient service for students to apply and enroll in schools and courses abroad. Also included are the school and course application procedures, changing courses, payment of tuition fee, acquiring certificate of enrolment etc.</p>

<h3>Student Visa Information for Relevant Countries</h3>
<p>We offer the most up-to-date information about student visa policies, procedures and requirements for the relevant counties, and assess students against the visa criteria.</p>

<h3>Student Visa Applying</h3>
<p>We offer a specialised and conscientious services for students applying for student visas, backed by our professional experience and knowledge. This includes handling the whole visa procedure for students - organising and preparing applications and documents, lodging visa applications, communicating with visa officers on behalf of students</p>

<h3>Australia Institutes/Schools Applying and Assistance for Student Visa Applying</h3>
<p>We specialize in Australian institute/school requirements, which cover electronic Certificates of Enrolment (COES), course changes, etc, and this is based on our wide and solid relation with Australian schools and institutions for overseas students.</p>
<p>Also, We are specialize in student visa applications for Australia, including applying for student visas from overseas, extending student visas in Australia, course transfers and student work rights.</p>

<h3>Advice for Education Pathway</h3>
<p>We offer specialised advice for the students to complete their study and acquire their ideal qualification, through a pathway of the best institution and course arrangement, in order to save the time and money for the students</p>

<h3>Life Care Service and Guardian Service</h3>
<p>We provide a life care service for overseas students who come to Australia and China, and need the assistance after arriving for the convenience and safety of their life, eg: 24 hours emergency call, accommodation arrangement and airport pick up, open bank account. Signing lease contract with real estate agent and so on.</p>
<p>Meanwhile, we offer a guardian service to the students who are applying to study in Australia and whose age is under 18, prepare all guardian documents for the students and look after students while they are in Australia.</p>

<h3>Parents Guardian Visa and Student Dependant Visa</h3>
<p>We offer assistance in application for the parents of students who wish to look after or visit their children in Australia and New Zealand.</p>
<p>Also, we can help the student’s dependant to apply for the student dependant visa to come to Australia and New Zealand to join with the student.</p>
<h3>Accommodation Arrangement and Airport pick-up</h3>
<p>We offer assistance to students in arranging accommodation (homestay or dormitory) and airport pick ups when students arrive or afterwards</p>

<h3>Further Help</h3>
<p>It is our pleasure to give further advice and help to students who have studying and living problems overseas.</p>

<h3>Organising Study Tour</h3>
<p>We offer study tour arrangements and care services for students to many countries such as Australia, China and Japan etc.</p>');
  $page->save();
  
  // contact us
  $page = new Page();
  $page->setController('site/form/contact');
  $page->setUri('contact');
  $page->setTitle('Contact');
  $page->setReserved(1);
  $page->setContent('
<h3>'.$settings['sitename'].'</h3>
          <p>Our headquarter is located in Sydney CBD with easy access by public transportation. We open Monday to Friday from 9AM to 5PM, Saturday to Sunday from 9AM to 1PM. We are present on all business hours on phone. You can also reach us by email or filling up the contact form below.</p>
');
  $page->save();
  
  // student service
  $page = new Page();
  $page->setUri('services/student');
  $page->setTitle('Student service');
  $page->setReserved(0);
  $page->setContent('
<h3>We help you to apply for educational institution</h3>
          <p>Some content goes here.</p>
');
  $page->save();
  
  // immigration service
  $page = new Page();
  $page->setUri('services/immigration');
  $page->setTitle('Immigration service');
  $page->setReserved(0);
  $page->setContent('
<h3>We help you to Immigrate</h3>
          <p>Some content goes here.</p>
');
  $page->save();
}