<?php

// ----------------------------------------------------------------------
// Copyright (c) 2007 by Tammy Keefer
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

/*
* e107 website system
*
* Copyright (C) 2008-2013 e107 Inc (e107.org)
* Released under the terms and conditions of the
* GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
*
* e107 efiction Plugin
*
* #######################################
* #     e107 website system plugin      #
* #     by Jimako                    	 #
* #     https://www.e107sk.com          #
* #######################################
*/

class plugin_efiction_series_shortcodes extends e_shortcode
{
	public function __construct()
	{
	}
    
    
    /* {SERIE_VIEW_ADDTOFAVES} */
	public function sc_serie_view_addtofaves($parm)
	{
		$favorites =  efiction::settings('favorites');
        if(isMEMBER && $favorites) {
    		$addtofaves = "[<a href=\"member.php?action=favse&amp;uid=".USERUID."&amp;add=".$this->var['seriesid']."\">"._ADDSERIES2FAVES."</a>]";
    		if($this->var['isopen'] < 2) {
    			$addtofaves .= " [<a href=\"viewuser.php?action=favau&amp;uid=".USERUID."&amp;author=".$this->var['uid']."\">"._ADDAUTHOR2FAVES."</a>]";
    		}
        }
        return $addtofaves;
	} 
    
    
    /* {SERIE_VIEW_CATEGORY} */
	public function sc_serie_view_category($parm)
	{
		$category = $this->var['catid'] ? catlist($this->var['catid']) : _NONE;
        return $category;
	}
    
    /* {SERIE_VIEW_CHARACTERS} */
	public function sc_serie_view_characters($parm)
	{
		$characters = $this->var['characters'] ? charlist($this->var['characters']) : _NONE;
        return $characters;
	}
    
    /* {SERIE_VIEW_CLASSIFICATION} */
	public function sc_serie_view_classification($parm)
	{
		
        	$allclasslist = "";
        	if($stories['classes']) {
        		unset($storyclasses);
        		foreach(explode(",", $stories['classes']) as $c) {
        			$storyclasses[$classlist["$c"]['type']][] = "<a href='browse.php?type=class&amp;type_id=".$classlist["$c"]['type']."&amp;classid=$c'>".$classlist[$c]['name']."</a>";
        		}
        	}
        	foreach($classtypelist as $num => $c) {
        		if(isset($storyclasses[$num])) {
        			 $c['name'] = implode(", ", $storyclasses[$num]);
        			$allclasslist .= "<span class='label'>".$c['title'].": </span> ".implode(", ", $storyclasses[$num])."<br />";
        		}
        		else {
        			$c['name'] = _NONE;
        			$allclasslist .= "<span class='label'>".$c['title'].": </span> "._NONE."<br />";
        		}
        	}
    
        $classification = $allclasslist;
        return $classification;
	} 
    
    /* {SERIE_VIEW_SERIESHEADER} */
	public function sc_serie_seriesheader($parm)
	{
	 
		return $seriesheader;
	}
	
    /* {SERIE_VIEW_ODDEVEN} */
	public function sc_serie_view_oddeven($parm)
	{
        if(!isset($this->var['count'])) $this->var['count'] = 0;
        $oddeven =  ($this->var['count'] % 2 ? "odd" : "even");
		return $oddeven;
	}
        
	/* {SERIE_VIEW_LINK} */
	public function sc_serie_view_link($parm)
	{
		$serie = $this->var;
		$url = 'viewstory.php?sid='.$serie['sid'].'&amp;serie='.$serie['inorder'];
		return $url;
	}


    
    /* {SERIE_VIEW_NUMREVIEWS} */
	public function sc_serie_view_numreviews($parm)
	{
		$numreviews = '';
        $reviewsallowed =  efiction::settings('reviewsallowed');
        if($reviewsallowed == "1") $numreviews =  "<a href=\"reviews.php?type=SE&amp;item=".$this->var['seriesid']."\">".$this->var['reviews']."</a>";
 
    	return $numreviews;
	}      
    
    /* {SERIE_VIEW_NUMSTORIES} */
	public function sc_serie_view_numstories($parm)
	{
        $numstories = $this->var['numstories'];
        return $numstories;
	}
    
    /* {SERIE_VIEW_PARENTSERIES} */
	public function sc_serie_view_parentseries($parm)
	{
     	$parents = e107::getDb()->retrieve("SELECT s.title, s.seriesid FROM #fanfiction_inseries as i, 
         #fanfiction_series as s WHERE s.seriesid = i.seriesid AND i.subseriesid = '".$this->var['seriesid']."'", true);
    	$plinks = array( );
    	foreach($parents AS $p) {
    		$plinks[] = "<a href=\"viewseries.php?seriesid=".$p['seriesid']."\">".$p['title']."</a>";
    	}
    	$parentseries = count($plinks) ? implode(", ", $plinks) : _NONE;
        return $parentseries;
	}      
    
    /* {SERIE_VIEW_REVIEWS} */
	public function sc_serie_view_reviews($parm)
	{
		$reviews = '';
        $reviewsallowed =  efiction::settings('reviewsallowed');
        if($reviewsallowed == "1") $reviews =  "<a href=\"reviews.php?type=SE&amp;item=".$this->var['seriesid']."\">"._REVIEWS."</a>";
        return $reviews;
	}        
 
	/* {SERIE_VIEW_SCORE} */
	public function sc_serie_view_score($parm)
	{
        $score = ratingpics($this->var['rating']);
    	return $score;
	} 
    
    /* {SERIE_VIEW_SUMMARY}
    {SERIE_VIEW_SUMMARY: limit=100}
    {SERIE_VIEW_SUMMARY: limit=full}
    */
    public function sc_serie_view_summary($parm)
    {
        $stories = $this->var;
        $text = e107::getParser()->toHTML($this->var['summary'], true, 'TITLE');
	 
        $limit = ($stories['sumlength'] > 0 ? $stories['sumlength'] : 75);  
        if (!empty($parm['limit'])) {
            $limit = $parm['limit'];
        }
        if ($limit == 'full') {
            return $text;
        } else {
            $text = e107::getParser()->truncate($stories['summary'], $limit);
            return $text;
        }
    }
    

	/* {SERIE_TITLE} */
	public function sc_serie_title($parm)
	{
		$title = e107::getParser()->toHTML($this->var['title'], true, 'TITLE');
		return $title;
	}
    
	/* {SERIE_URL} */
	public function sc_serie_url($parm)
	{
		$text = "viewseries.php?seriesid=".$this->var['seriesid'];
		return $text;
	}
    
    /* {SERIE_VIEW_TITLE} */
	public function sc_serie_view_title($parm)
	{
		$title = e107::getParser()->toHTML($this->var['title'], true, 'TITLE');
        $text = "<a href=\"viewseries.php?seriesid=".$this->var['seriesid']."\">".$title."</a>";
		return $text;
	}
    
    /* SERIE_VIEW_CODEBLOCK */
    public function sc_serie_view_codeblock($parm)
    {
        if ($parm == 'seriesblock') {
            $stories = $this->var;
            $codequery = "SELECT * FROM #fanfiction_codeblocks WHERE code_type = 'seriesblock'";
            $codes = e107::getDb()->retrieve($codequery, true);
            foreach ($codes as $code) {
                //example:  include(_BASEDIR."modules/translations/admin/storyform.php"
                eval($code['code_text']);
            }
            $text = $output;
            $output = '';
            return $text;
       } 
    }
 
    
    /* {SERIE_VIEW_OPEN} */
	public function sc_serie_view_open($parm)
	{
		if(!isset($seriesType)) $seriesType = array(_CLOSED, _MODERATED, _OPEN);
        $open = $seriesType[$this->var['isopen']];
        return $open;
	}
    
 

        
    /* {SERIE_VIEW_REPORTTHIS} */
	public function sc_serie_view_reportthis($parm)
	{
	    $reportthis = "[<a href=\"report.php?action=report&amp;url=manageseries.php?seriesid=".$this->var['seriesid']."\">"._REPORTTHIS."</a>]";
    	return $reportthis;
	}     
    
    
    /* {SERIE_VIEW_ADMINOPTIONS} */
	public function sc_serie_view_adminoptions($parm)
	{
	    if((isADMIN && uLEVEL < 4) || (USERUID != 0 && USERUID == $this->var['uid'])) {
		$adminoptions =  "<div class=\"adminoptions\"><span class='label'>"._ADMINOPTIONS.":</span> 
          [<a href=\"manageseries.php?action=add&amp;add=stories&amp;seriesid=".$this->var['seriesid']."\">"._ADD2SERIES."</a>] 
          [<a href=\"manageseries.php?action=edit&amp;seriesid=".$this->var['seriesid']."\">"._EDIT."</a>] 
          [<a href=\"manageseries.php?action=delete&amp;seriesid=".$this->var['seriesid']."\">"._DELETE."</a>] </div>";
          
	    }
       	else if($this->var['isopen'] == 2 && USERUID) 
           $adminoptions = "[<a href=\"manageseries.php?action=add&amp;add=stories&amp;seriesid=".$this->var['seriesid']."\">"._ADD2SERIES."</a>]" ;
    
        return $adminoptions;
	}      
    
     /* {SERIE_VIEW_COMMENT} */
	public function sc_serie_view_comment($parm)
	{
		return $reportthis;
	}   
  
      /* {SERIE_VIEW_AUTHOR} */
      public function sc_serie_view_author($parm)
      {
 
          $author = "<a href=\"viewuser.php?uid=".$this->var['uid']."\">".stripslashes($this->var['penname'])."</a>";
          return $author;
      }  
 

	/* {SERIE_EDIT_BUTTON} */
	public function sc_serie_edit_button($parm)
	{
		$serie = $this->var;
		$text = "<a class='btn btn-success' href=\"stories.php?action=editserie&amp;chapid=".$serie['chapid'].($this->admin ? '&amp;admin=1&amp;uid='.$serie['uid'] : '')."\">"._EDIT.'</a>';
		return $text;
	}

	/* {SERIE_DELETE_BUTTON} */
	public function sc_serie_delete_button($parm)
	{
		$serie = $this->var;
		$text = "<a class='btn btn-danger'  href=\"stories.php?action=delete&amp;chapid=".$serie['chapid'].($this->admin ? '&amp;admin=1&amp;uid='.$serie['uid'] : '')."\">"._DELETE.'</a>';
		return $text;
	}
    
    /* {SERIE_IMAGE_PATH} */
    public function sc_serie_image_path($parm)
    {
 
        $serie_icon = $this->var['image']; 
        $src =  e107::getParser()->replaceConstants($serie_icon, 'full');
        return $src; 
    }
    
    /* {SERIE_IMAGE} */
    public function sc_serie_image($parm)
    {
 
        $serie_icon = $this->var['image']; 
        $icon = e107::getParser()->toImage($serie_icon); 
        return $icon; 
    }
}
