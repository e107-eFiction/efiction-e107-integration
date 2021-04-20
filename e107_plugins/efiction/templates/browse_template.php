<?php

if (!defined('e107_INIT')) { exit; }


$BROWSE_TEMPLATE['index']['caption'] = '{EFICTION_CAPTION}'; 
$BROWSE_TEMPLATE['index']['start'] = '';
$BROWSE_TEMPLATE['index']['body'] = 
'
<div class="row">   
    <div class="col-md-12">	 
		{EFICTION_OUTPUT} 
    </div>
</div>
';  
$BROWSE_TEMPLATE['index']['end'] = '';
$BROWSE_TEMPLATE['index']['tablerender'] = 'blocks_center'; 
 
/* 
$BROWSE_WRAPPER['series']['STORY_EDIT_COAUTHORS'] = '
<div class="form-group"><label for="uid" class="col-form-label">{LAN=_COAUTHORS}:</label>{---}</div>';
*/
 
$BROWSE_TEMPLATE['series']['caption'] = ''; 
$BROWSE_TEMPLATE['series']['start'] = '';
$BROWSE_TEMPLATE['series']['body'] = 
'
<div class="row">
    <div class="col-md-4">
    			<section class="property-search-section">
    				<div class="auto-container">
    					<div class="property-search-tabs tabs-box">
    						<div class="tabs-content">
    							<!--Tab / Active Tab-->
    							<div class="tab active-tab" id="sale">                         
    								<div class="property-search-form">
    									<div id="sortform">
                                            {EFICTION_SORTBEGIN} 
    										<div class="row">
    											{EFICTION_CATEGORYMENU}
    											{EFICTION_CHARACTERMENU1} {EFICTION_CHARACTERMENU2} {EFICTION_PAIRINGSMENU} {EFICTION_RATINGMENU} 
                                                {EFICTION_CLASSMENU} 
                                                {EFICTION_SORTMENU} 
                                                {EFICTION_COMPLETEMENU} 
    										</div>
                                            {EFICTION_SORTEND}
    									</div>									
    								</div> 
    							</div>
    						</div>							
    					</div>
    				</div>
    			</section>
    </div>            
    <div class="col-md-8">
		{EFICTION_ALPHALINKS}
		{EFICTION_OUTPUT}{EFICTION_OTHERRESULTS}
		{EFICTION_SERIESBLOCK}
    </div>
</div>
';  
$BROWSE_TEMPLATE['series']['end'] = ''; 
 
$BROWSE_TEMPLATE['categories'] = $BROWSE_TEMPLATE['index'];  
$BROWSE_TEMPLATE['ratings'] = $BROWSE_TEMPLATE['index']; 
$BROWSE_TEMPLATE['characters'] = $BROWSE_TEMPLATE['index'];
$BROWSE_TEMPLATE['original_authors'] = $BROWSE_TEMPLATE['index'];
$BROWSE_TEMPLATE['original_titles'] = $BROWSE_TEMPLATE['index'];
$BROWSE_TEMPLATE['titles'] = $BROWSE_TEMPLATE['index'];


