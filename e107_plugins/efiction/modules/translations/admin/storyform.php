<?php
// ----------------------------------------------------------------------
// Copyright (c) 2010 by Kirstyn Amanda Fox
// Based on DisplayWorld for eFiction 3.0
// Copyright (c) 2005 by Tammy Keefer
// Valid HTML 4.01 Transitional
// Based on eFiction 1.1
// Copyright (C) 2003 by Rebecca Smallwood.
// http://efiction.sourceforge.net/
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------


if (!defined('e107_INIT')) { exit; }


if(file_exists(_BASEDIR."modules/translations/languages/{$language}.php")) include_once(_BASEDIR."modules/translations/languages/{$language}.php");
else include_once(_BASEDIR."modules/translations/languages/en.php");
 
    $writer = $stories['writer'];  
    $original_title = $stories['original_title']; 
    $original_url = $stories['original_url']; 
    $preklad_url = $stories['preklad_url']; 
    $multichapter = $stories['multichapter'];
    $source = $stories['source'];
 
    $writerquery = "SELECT cw_author_id, cw_author_name FROM ".TABLEPREFIX."fanfiction_writers ORDER BY cw_author_name ";
    $writersarray = e107::getDb()->retrieve($writerquery, true);
	foreach($writersarray AS $writerresult) {
		$writers[$writerresult['cw_author_id']] = $writerresult['cw_author_name'];
    }
 
    $output .= '<div class="title"><h3>Doplňujúce info</h3></div>';
    $output .= '<div class="row">';
	$output .= '<div class="form-group col-md-6">
					<label for="writer" class="col-form-label">'._ORIGINAL_WRITER.'</label>
						<div>
						'.e107::getForm()->select('writer', $writers, $writer,  array( 'required'=> 1 , 'data-width'=>'100%', 'class'=>'form-control select2-single' ), _ORIGINAL_WRITER).'
						</div>
				</div>';
                
   	$output .= '<div class="form-group col-md-6">
				    <label for=\"multichapter\">Kapitolovka</label>
					<div>
					'.e107::getForm()->radio_switch('multichapter', $multichapter, _YES, _NO).'
					</div>
			    </div>';
    $output .= '</div>';     
                             
    $output .= '<div class="form-group">
				<label for="original_title" class="col-form-label">'._ORIGINAL_TITLE.'</label>
					<div>
					'.e107::getForm()->text('original_title', htmlentities($original_title), 200, array('size' => 'large', 'required' => 1, 'id'=>'original_title')).'
					</div>
			  </div>';
	$output .= '<div class="form-group">
				<label for="original_url" class="col-form-label">'._ORIGINAL_URL.'</label>
					<div>
					'.e107::getForm()->text('original_url', htmlentities($original_url), 200, array('size' => 'large', 'required' => 1, 'id'=>'original_url')).'
					</div>
			  </div>';
    $output .= '<div class="form-group">
				<label for="preklad_url" class="col-form-label">'._PREKLAD_URL.'</label>
					<div>
					'.e107::getForm()->url('preklad_url', htmlentities($preklad_url), 200, array('size' => 'large', 'required' => 1, 'id'=>'preklad_url')).'
					</div>
			  </div>';
   
                
    $sources['none'] =  'Neurčený';
    $sources['hpkizi'] =  'HPKIZI';    
    $sources['mimo'] =  'Mimo HPKizi Universe';   
    $sources['efiction'] =  'Priamy cez efiction';
    $sources['chyba'] =  'Chyba';
                    
 	$output .= '<div class="form-group">
					<label for="source" class=" col-form-label">Zdroj:</label>
						<div>
						'.e107::getForm()->select('source', $sources, $source, array( 'class'=> 'custom-select-box', 'required' => 1)).'
						</div>
				</div>';               
 