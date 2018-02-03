<?php

require_once __DIR__ . DS . '..' . DS . '..' . DS . 'bootstrap.php';

if (is_cli()) {
  $institution = new Institution();
  $institution->setTitle('NAVITAS English');
  $institution->setCountryId(1);
  $institution->setImage('modules/site/assets/images/i-navitas.jpg');
  $institution->setContent('
<h2 class="dax_normal">About our Sydney centre</h2> <h3 class="dax_normal">See our centre in action</h3> <p>Watch this video to find out more about our Navitas English centre in Sydney, and to see it in action.</p>  <h3 class="dax_normal">What can I do in Sydney?</h3> <p>The majestic Sydney Opera House is only 15 minutes\' walk away and holds many world-class musical and theatre performances all year round, as well as more affordable cultural and comedic events to suit all budgets. The Harbour Bridge and Museum of Contemporary Art are only 10 minutes’ walk away; if you like adventure you can\'t go past a Bridge Climb at dusk and for culture the MCA has many great free exhibitions to dazzle your senses.</p> <p>A short walk will also bring to you Sydney\'s oldest established area, The Rocks, which delivers amazing pubs, cobbled streets and great markets and shops. And a walk in the opposite direction will bring to you Pitt Street Mall, the home of shopping in Sydney.</p> <p>And to top it off, Sydney aims to please when dining out. Whether it\'s fine dining restaurant overlooking the harbour for a special occasion, or a bustling food court for dumplings in Chinatown, there is something for every taste and budget.</p>
<h2 class="dax_normal">Learn about Sydney</h2> <h3 class="dax_normal">Population</h3> <p>Sydney:&nbsp;4.5 million<br> City:&nbsp;177,000</p> <h3 class="dax_normal">Climate</h3> <p>Summer: 18.3 - 25.6°C<br> Winter: 8.7 - 17.0°C</p> <h3 class="dax_normal">Public transport</h3> <p>Navitas English Sydney is located directly above Wynyard Green train station and directly across from Wynyard bus station in central Sydney. The Circular Quay ferries (right near the Opera House) are also just a 10 minute walk away.</p> <p>For more information on transport in Sydney, see 131500.com.au (NSW Transport Info). Google Maps now also features public transport for Sydney.</p> <ul class="block_list single">     <li><a target="_blank" href="http://www.131500.com.au/">NSW Transport Info</a></li> </ul> <h3 class="dax_normal">More information</h3> <p>Use these links to find more information about Sydney, tourist attractions, local events, and more.</p> <ul class="block_list single">     <li><a target="_blank" href="http://en.wikipedia.org/wiki/Sydney">Sydney (Wikipedia)</a></li>     <li><a target="_blank" href="http://www.sydney.com/">Sydney.com</a></li>     <li><a target="_blank" href="http://www.australia.com/explore/cities/sydney.aspx">Sydney (Tourism Australia)</a></li>     <li><a href="http://navitasenglish.com/accommodation-sydney.html">Independent Accommodation Options</a></li> </ul>
');
  $institution->setUrl('http://navitasenglish.com/');
  $institution->setWeight(0);
  $institution->save();
  
  
  
  $institution = new Institution();
  $institution->setTitle('SIIT - Sydney Institute of Interpreting & Translating');
  $institution->setCountryId(1);
  $institution->setImage('modules/site/assets/images/i-siit.jpg');
  $institution->setContent('
<h2>Brief Introduction to SIIT </h2>
<p>Sydney Institute of Interpreting and Translating (SIIT) is a registered training organisation for training interpreters and translators.</p>
<p>The programs offered at SIIT have been specifically designed to cater for the needs of students who are interested in careers as interpreters and translators. With dedicated trainers and caring administrative staff, SIIT provides students with a nurturing and conducive atmosphere for their studies and career development.<br>
</p>
<p><strong>Mission Statement: </strong></p>
<ol>
<li>SIIT ensures that students are trained in the most effective and professional manner in their chosen career paths as professional interpreters and translators;</li>
<li>SIIT provides appropriate training and resources in the areas of interpreting and translating;</li>
<li>SIIT assists students in gaining employment and achieving their career goals in the areas of interpreting and translating;</li>
<li>SIIT helps students further their academic studies in the areas of interpreting and translating.</li>
</ol>
<p><strong>Location ：Sydney</strong></p>
<p>Located on Level 5, 841 George Street Sydney 2000.</p>
<p><strong>Location ：Brisbane</strong></p>
<p>Located on Level 1, 344 Queen St, Brisbane, QLD 4000.</p>
');
  $institution->setUrl('http://www.siit.nsw.edu.au');
  $institution->setWeight(1);
  $institution->save();
}