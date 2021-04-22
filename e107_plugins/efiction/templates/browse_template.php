<?php

if (!defined('e107_INIT')) { exit; }


$BROWSE_TEMPLATE['index']['caption'] = '{BROWSE_CAPTION}'; 
$BROWSE_TEMPLATE['index']['start'] = '';
$BROWSE_TEMPLATE['index']['body'] = 
'
<div class="row my-3">   
    <div class="col-md-12">	 
		{BROWSE_OUTPUT} 
    </div>
</div>
';  
$BROWSE_TEMPLATE['index']['end'] = '';
$BROWSE_TEMPLATE['index']['tablerender'] = 'blocks_center'; 


$BROWSE_TEMPLATE['searchform']['index']  = '
<section class="property-search-section">
<div class="auto-container">
	<div class="property-search-tabs tabs-box">
		<div class="tabs-content">
			<!--Tab / Active Tab-->
			<div class="tab active-tab" id="sale">                         
				<div class="property-search-form">
					<div id="sortform">
                                {BROWSE_SORTBEGIN} 
						<div class="row">
							{BROWSE_CATEGORYMENU}
							{BROWSE_CHARACTERMENU1} {BROWSE_CHARACTERMENU2} {BROWSE_PAIRINGSMENU} {BROWSE_RATINGMENU} 
                                    {BROWSE_CLASSMENU} 
                                    {BROWSE_SORTMENU} 
                                    {BROWSE_COMPLETEMENU} 
						</div>
                                {BROWSE_SORTEND}
					</div>									
				</div> 
			</div>
		</div>							
	</div>
</div>
</section>'; 

$BROWSE_TEMPLATE['categories'] = $BROWSE_TEMPLATE['index'];  
$BROWSE_TEMPLATE['ratings'] = $BROWSE_TEMPLATE['index']; 
$BROWSE_TEMPLATE['original_authors'] = $BROWSE_TEMPLATE['index'];
$BROWSE_TEMPLATE['original_titles'] = $BROWSE_TEMPLATE['index'];
$BROWSE_TEMPLATE['titles'] = $BROWSE_TEMPLATE['index'];
$BROWSE_TEMPLATE['recent'] = $BROWSE_TEMPLATE['index'];
$BROWSE_TEMPLATE['home'] = $BROWSE_TEMPLATE['index'];

 
$BROWSE_WRAPPER['series']['BROWSE_SEARCHFORM'] = '
<div class="col-md-4">{---}</div>';
 
 
$BROWSE_TEMPLATE['series']['caption'] = ''; 
$BROWSE_TEMPLATE['series']['start'] = '';
$BROWSE_TEMPLATE['series']['body'] = 
'
<div class="row my-3">      
    <div class="col-md-12">
		{BROWSE_ALPHALINKS}
		{BROWSE_OUTPUT}{BROWSE_OTHERRESULTS}
		{BROWSE_SERIESBLOCK}
        {BROWSE_PAGELINKS}
    </div>
</div>
';  
$BROWSE_TEMPLATE['series']['end'] = '';
$BROWSE_TEMPLATE['series']['searchform'] = $BROWSE_TEMPLATE['index']['searchform'] ;  
  
$BROWSE_TEMPLATE['characters']['caption'] = ''; 
$BROWSE_TEMPLATE['characters']['start'] = '';
$BROWSE_TEMPLATE['characters']['body'] = 
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
                                            {BROWSE_SORTBEGIN} 
    										<div class="row">
    											{BROWSE_CATEGORYMENU}
    											{BROWSE_CHARACTERMENU1} {BROWSE_CHARACTERMENU2} {BROWSE_PAIRINGSMENU} {BROWSE_RATINGMENU} 
                                                {BROWSE_CLASSMENU} 
                                                {BROWSE_SORTMENU} 
                                                {BROWSE_COMPLETEMENU} 
    										</div>
                                            {BROWSE_SORTEND}
    									</div>									
    								</div> 
    							</div>
    						</div>							
    					</div>
    				</div>
    			</section>
    </div>            
    <div class="col-md-8">
		{BROWSE_ALPHALINKS}
		{BROWSE_OUTPUT}{BROWSE_OTHERRESULTS}
		{BROWSE_SERIESBLOCK}
        {BROWSE_PAGELINKS}
    </div>
</div>
';  
$BROWSE_TEMPLATE['characters']['end'] = ''; 
$BROWSE_TEMPLATE['characters']['searchform'] = $BROWSE_TEMPLATE['index']['searchform'] ;  