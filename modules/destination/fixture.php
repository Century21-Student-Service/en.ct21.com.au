<?php

require_once __DIR__ . DS . '..' . DS . '..' . DS . 'bootstrap.php';

if (is_cli()) {
  $country = new Country();
  $country->setName('Australia');
  $country->setImage('modules/site/assets/images/australia.jpg');
  $country->setBannerImage('modules/site/assets/images/australia_banner.jpg');
  $country->setContent('
<h2>Special Tuition Fee Offer</h2>
<p>Through our long-standing professional and conscientious services, we have built up our reputation and established a high degree of trust with students, their parents and institutions. We have a very high success rate for student visa applications, and all these factors have led to an excellent service for our students</p>
<h2>Study in Austalia</h2>
<ul>
<li>Australia\'s English Language Intensive Courses for Overseas Students (ELICOS)</li>
<li>School Education in Australia</li>
<li>Vocational Education and Training (VET) in Australia</li>
<li>Foundation Programs in Australian Universities</li>
<li>Higher Education in Australia</li>
</ul>
<h2>Recommend School</h2>
<ul>
<li>English Language Schools</li>
<li>High Schools</li>
<li>VET institutions</li>
<li>Foundation Programs</li>
<li>Australia Universities</li>
<li>Martin College</li>
</ul>
');
  $country->save();
  
  $country = new Country();
  $country->setName('New Zealand');
  $country->setImage('modules/site/assets/images/newzealand.jpg');
  $country->setBannerImage('modules/site/assets/images/newzealand.jpg');
  $country->setContent('
<h2>A brief summary</h2>
<p>Children attend nursery schools at about five years old and at seven they start their six years of primary education. After completing year 6, at around 13 years old, they then pursue their four years of junior secondary education, which they complete in year 10. They then take another 3 year to complete their senior high school. Students at around 17 or 18 may embark on their higher education at the Universities, Polytechnics, Colleges of Education or private training institutes.</p>
');
  $country->save();
  
  $country = new Country();
  $country->setName('Japan');
  $country->setImage('modules/site/assets/images/japan.jpg');
  $country->setBannerImage('modules/site/assets/images/japan_banner.jpg');
  $country->setContent('
<h2>Study in Japan</h2>
<p>Educational System of Japan
Japan\'s educational system is similar as US. It has altogether nine years of compulsory education including six years of primary school education and three years of secondary school education...
Language schools
Japanese schools have a learning period of 1 year, 1.5 years and 2 years and the semester mostly starts from April and October of the year (or January and July will also be allowable in some schools)....
University (bachelor degree)
a 4-year course for most majors, except for medical science, dentistry and veterinary medicine that will last for 6 years...

Postgraduate courses
including masters\' courses and doctorate courses that last for 2 and 3 years respectively....
Short-term college
courses normally take 2 to 3 years and mostly focus on domestic science, humanities, education and society...
Technological academies
Technological academies with professional courses are also called “Special Schools”. These schools belong to higher educational institutions that teach occupational skills and technology that are....
Technical secondary schools
With an aim to foster the necessary vocational abilities, technical secondary schools focus on the 5-year education of junior high school graduates (courses in relation to trader require an additional 6...</p>
');
  $country->save();
  
  $country = new Country();
  $country->setName('USA');
  $country->setImage('modules/site/assets/images/usa.jpg');
  $country->setBannerImage('modules/site/assets/images/usa_banner.jpg');
  $country->setContent('
<h2>Introduction to Educational System of the USA</h2>
<p>Postsecondary education institutions in the United States generally are ofthree broad types, each of which includes both public and private institutions: (1)two-year colleges, usually called community, junior, or technical colleges; (2) fouryearcolleges, which usually offer either four years of general undergraduate education (liberal arts) or a combination of general and preprofessional education; and (3) comprehensive universities, which offer both undergraduate and graduate education as well as professional degrees. Institutional titles can be confusing, however, because states have different regulations and traditions. For example, many institutions called "universities" do not offer degrees beyond the master\'s degree; some offer no degrees beyond the bachelor\'s degree. Some "colleges" offer doctorates. A few prestigious comprehensive research universities in the country are known as "institutes" (for example, California Institute of Technology and Massachusetts Institute of Technology). In addition, there are institutions called colleges, institutes, or universities that are not accredited but that offer degrees and certificates.</p>
');
  $country->save();
  
  $country = new Country();
  $country->setName('China');
  $country->setImage('modules/site/assets/images/china.jpg');
  $country->setBannerImage('modules/site/assets/images/china_banner.jpg');
  $country->setContent('
<h2>An Introduction to China</h2>
<p>China is staggeringly vast and a land of great diversity.It is the world\'s most populous nation and the third largest country, almost a continent in itself.
</p>
<p>
Stretching from its southern borders in the Himalayas to the deserts of Mongolia in the north, and from the East China Sea through the Yangzi River Valley plains, to the Tibetan Plateau in the western mainland, China covers an area of 9.6 million square kilometers or 3.7 million square miles...</p>
<p>
China encompasses over 5000 islands and comprises five autonomous regions and twenty-two provinces, as well as Hong Kong and Macau, which are now known as “Special Administrative Regions”.The seat of government is Beijing, an enormous city of 11 million people.In Beijing, like all of China\'s urban metropolises, life contrasts immensely with that of the peasant farmers in rural areas.Because of its size, China\'s climate is very diverse, ranging from an unbearable 48oC in the northwest summer to a freezing cold minus 40oC in the winter in the far north.
</p>
<p>
The official language in China is Mandarin, as spoken in Beijing, but there are also many different dialects to listen for.Chinese food, and much of the ingredients used to create it, is like no other cuisine, and again this differs greatly between regions.Art in China is also stunningly unique, perhaps best typified by its calligraphy, created with ink and brush and held in extremely high esteem by the Chinese.
</p>
<h2>Education System of China</h2>
<p>
The education system or terms in China is similar as Japan and Korea. The higher education system or terms is similar as U.S.A.
</p>
<p>
School education of China includes preschool, primary school, secondary school, high school and university at both the undergraduate and postgraduate level.
</p>
<p>
The following is the school age requirement and the fixed school terms at different levels.
Kindergartens take children above three years old with a term of three school years.
Primary and Junior high schools provide a total of nine years of compulsory education.Primary school is usually six years and junior high school is usually three years, or just nine years inclusive of both primary and junior schooling in some areas. School age for primary schools is usually six and 13 for secondary schools.
</p>
<p>
School age for common Senior High schools is 15 or 16, with a term of three school years, secondary vocational schools usually provide three or four years education and technical schools provide three years education.
</p>
');
  $country->save();
//  
//  $country = new Country();
//  $country->setName('Singapo');
//  $country->setImage('modules/site/assets/images/singapo.jpg');
//  $country->setBannerImage('modules/site/assets/images/singapo_banner.jpg');
//  $country->setContent('
//<h2>Educational System of Korea</h2>
//<p>Education in Singapore is managed by the Ministry of Education (MOE), which controls the development and administration of state schools receiving government funding, but also has an advisory and supervisory role in respect of private schools. For both private and state schools, there are variations in the extent of autonomy in their curriculum, scope of government aid and funding, tuition burden on the students, and admission policy.
//</p>
//<p>
//Education spending usually makes up about 20 percent of the annual national budget, which subsidises state education and government-assisted private education for Singaporean citizens and funds the Edusave programme, the costs for which are significantly higher for non-citizens. In 2000 the Compulsory Education Act codified compulsory education for children of primary school age (excepting those with disabilities), and made it a criminal offence for parents to fail to enroll their children in school and ensure their regular attendance. Exemptions are allowed for homeschooling or full-time religious institutions, but parents must apply for exemption from the Ministry of Education and meet a minimum benchmark.</p>
//');
//  $country->save();
//  
//  $country = new Country();
//  $country->setName('Canada');
//  $country->setImage('modules/site/assets/images/canada.jpg');
//  $country->setBannerImage('modules/site/assets/images/canada_banner.jpg');
//  $country->setContent('
//<h2>Introduction to Canadian Educational System</h2>
//<p>Inheriting the meticulous teaching style of Britain, Canada is world-renowned for its high quality education and attracts a multitude of overseas students each year. Meanwhile, each province of Canada has established its own suitable and independent educational system. The Canadian educational system features 6-8 years of primary school education, 4-7 years of high school education, 3-4 years of college education, 1-3 years of master education and 1-3 years of doctor education.</p>
//');
//  $country->save();
//  
//  $country = new Country();
//  $country->setName('England');
//  $country->setImage('modules/site/assets/images/england.jpg');
//  $country->setBannerImage('modules/site/assets/images/england_banner.jpg');
//  $country->setContent('
//<h2>Study in UK </h2>
//<h3>University foundation programs</h3>
//<p>British schools also provide university foundation courses that are specially established for overseas students who can not directly advance to study for a bachelor degree. Completion of the foundation courses will qualify students for college and universities.</p>
//
//<h3>Higher education</h3>
//<p>High national diploma (HND): it is equivalent to the college diploma in many countries and obtaining this diploma will qualify students for a one-year graduate study, upon its completion the student will be awarded a bachelor\'s degree.</p>
//
//<h3>Bachelor Degree</h3>
//<p>now more than 90 universities and 150-plus colleges provide graduate or postgraduate courses with such common degrees as Bachelor of Arts, Master of Business Administration (MBA), Bachelor of Education, Bachelor of Science (BSc), Bachelor of Engineering, Bachelor of Law, Bachelor of Medicine etc. Graduate courses normally take three years (The Scottish honorary diploma will take 4 years). Medical science, dentistry, architecture and veterinary science may take anywhere between five to seven years.</p>
//
//<h3>Master Degree</h3>
//<p>the postgraduate courses in Britain mainly fall into two categories, i.e. one that is class based which normally takes 12 months, including class teaching, topic discussion, exams and consecutive comments and thesis, etc.; the other type of course is a Research Course.? Such courses provide optimal opportunities for students who want to develop their professional interests. Normally, students, under the guidance of a teacher, can decide and start their research. In this case, independent research capability is very important for students taking the Research Course. In general, these students shall engage in full-time research work for 1-2 year(s) on campus.</p>
//
//<h3>Doctor of Philosophy (PhD)</h3>
//<p>the schooling length of a PhD is variable depending on the courses but normally will take 3 years. The student needs to have a master degree first of all to study a PhD. However, the students who have a bachelor’s degree and want to study a PhD may now consider the 2000 continuous academic project that involves postgraduate and doctoral study. This new length of schooling adopted by ten outstanding universities in Britain features module-type teaching method where students may research by themselves and thus it better satisfies the requirements of high-caliber talents. Its courses take 4 years to complete. </p>
//');
//  $country->save();
}