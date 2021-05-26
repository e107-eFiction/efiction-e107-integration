<?php

e107::lan('efiction');
e107::lan('efiction', true);



$efiction = e107::getSingleton('efiction', e_PLUGIN.'efiction/efiction.class.php');
$efiction->init();
$eAuthors = e107::getSingleton('eauthors', e_PLUGIN.'efiction/authors.class.php');
$eAuthors->init(); 
   
 