<?php

if (!defined('e107_INIT')) { exit; }
 
$STORYFORM_WRAPPER['layout']['STORY_EDIT_CATEGORY'] = '<div class="row"><div class="col-md-12">{---}</div></div>';

$STORYFORM_WRAPPER['layout']['STORY_EDIT_AUTHOR'] = '
<div class="form-group"><label for="uid" class="col-form-label">{LAN=_AUTHOR}:</label>{---}</div>';

$STORYFORM_WRAPPER['layout']['STORY_EDIT_COAUTHORS'] = '
<div class="form-group"><label for="uid" class="col-form-label">{LAN=_COAUTHORS}:</label>{---}</div>';

$STORYFORM_TEMPLATE['story']  = '
<div class="row">
  	<div class="col-lg-6 col-md-12 col-sm-12">
  	 	<div class="title"><h3>{LAN=LAN_REQUIRED_INFORMATION}</h3></div> 
		{STORY_EDIT_CATEGORY}
		<input type="hidden" name="formname" value="stories"> 
		<div class="row">
			<div class="col-md-6">
			{STORY_EDIT_AUTHOR}
			</div>
			<div class="col-md-6">
			{STORY_EDIT_COAUTHORS}
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12"><label for="title" class="col-form-label">{LAN=_TITLE}</label>
				{STORY_EDIT_TITLE}
			</div>
			<div class="form-group col-md-12"><label for="summary" class="col-form-label">{LAN=_SUMMARY}</label>
				{STORY_EDIT_SUMMARY}
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-6"><label for="rid" class="col-form-label">{LAN=_RATING}</label>
				{STORY_EDIT_RATING}
			</div>
			<div class="form-group col-md-6"><label for="complete" class="col-form-label">{LAN=_COMPLETE}: </label><br>
				{STORY_EDIT_COMPLETE}
			</div>			
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				{STORY_EDIT_FEATURED}
			</div>
			<div class="form-group col-md-6">
				{STORY_EDIT_VALIDATED}
			</div>
		</div>
	</div>
    <div class="col-lg-6 col-md-12 col-sm-12">
        {STORY_EDIT_CODEBLOCK=storyform_start}
    </div>
  </div>      
<div>
<div class="row"> 
	<div class="col-lg-12 col-md-12 col-sm-12">  
		<div class="title"><h3>More information:</h3></div>
		<div class="form-group"><label for="title" class="col-form-label">{LAN=_STORYNOTES}</label>
		{STORY_EDIT_CHARACTERS}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">  
		<div class="form-group"><label for="title" class="col-form-label">{LAN=_STORYNOTES}</label>
		{STORY_EDIT_CLASSES}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="form-group"><label for="title" class="col-form-label">{LAN=_STORYNOTES}</label>
			{STORY_EDIT_STORYNOTES}
		</div>    
  	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12">
	{STORY_EDIT_CODEBLOCK=storyform}
	</div>
</div>
'; 

$STORYFORM_TEMPLATE['chapter']  = '
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="title"><h3>{LAN=LAN_REQUIRED_INFORMATION}</h3></div>
    <div class="form-group"><label for="title" class="col-form-label">{LAN=_STORYTEXTTEXT}</label>   
            {STORY_EDIT_STORYTEXT}
    </div>
  </div>
<div>';