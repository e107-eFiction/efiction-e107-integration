<?php

if (!defined('e107_INIT')) { exit; }
 
/* global look of blocks is in efiction_template and global shortcode {EFICTION_BLOCK_CONTENT=info} */
 
/* template for stylink content of info block */
$BLOCKS_TEMPLATE['info']['start'] = "<div id='infoblock'>";
$BLOCKS_TEMPLATE['info']['end'] = "</div>";
$BLOCKS_TEMPLATE['info']['tablerender'] = 'menu';
$BLOCKS_TEMPLATE['info']['content'] = 
" 
<div><span class='label'>{LAN=_MEMBERS}: </span>{TOTALMEMBERS}</div>
<div><span class='label'>{LAN=_SERIES}: </span>{TOTALSERIES}</div>
<div><span class='label'>{LAN=_STORIES}: </span>{TOTALSTORIES}</div>
<div><span class='label'>{LAN=_CHAPTERS}: </span>{TOTALCHAPTERS}</div>
<div><span class='label'>{LAN=_WORDCOUNT}: </span>{TOTALWORDS}</div>
<div><span class='label'>{LAN=_AUTHORS}: </span>{TOTALAUTHORS}</div>
<div><span class='label'>{LAN=_REVIEWS}: </span>{TOTALREVIEWS}</div>
<div><span class='label'>{LAN=_REVIEWERS}: </span>{TOTALREVIEWERS}</div>
<div><span class='label'>{LAN=_NEWESTMEMBER}: </span>{NEWESTMEMBER}</div>
{BLOCKINFO_CODEBLOCK}
{LOGGEDINAS}
<div>{SUBMISSIONS}</div><div class='cleaner'>&nbsp;</div> 
</div>"
;
    
    
    
 