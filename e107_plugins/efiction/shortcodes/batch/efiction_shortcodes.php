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

    class plugin_efiction_efiction_shortcodes extends e_shortcode
    {
        public function __construct()
        {     
        }
        
        
        
        /* {BROWSE_CAPTION} */
    	public function sc_browse_caption($parm)
    	{
        
    		$text = $this->var['caption'];
    		return $text;
    	}
        
        /* {BROWSE_SORTBEGIN} */ 
    	public function sc_browse_sortbegin($parm)
    	{
    		$text = $this->var['sortbegin'];
    		return $text;
    	}
        /* {BROWSE_CATEGORYMENU} */
    	public function sc_browse_categorymenu($parm)
    	{
    		$text = $this->var['categorymenu'];
    		return $text;
    	}        
        /* {BROWSE_CHARACTERMENU1} */
    	public function sc_browse_charactermenu1($parm)
    	{
    		$text = $this->var['charactermenu1'];
    		return $text;
    	}           
        /* {BROWSE_CHARACTERMENU2} */
    	public function sc_browse_charactermenu2($parm)
    	{
    		$text = $this->var['charactermenu2'];
    		return $text;
    	}            
        /* {BROWSE_PAIRINGSMENU} */
    	public function sc_browse_pairingsmenu($parm)
    	{
    		$text = $this->var['pairingsmenu'];
    		return $text;
    	}          
        /* {BROWSE_RATINGMENU} */
    	public function sc_browse_ratingmenu($parm)
    	{
    		$text = $this->var['ratingmenu'];
    		return $text;
    	}   
        /* {BROWSE_CLASSMENU} */
    	public function sc_browse_classmenu($parm)
    	{
    		$text = $this->var['classmenu'];
    		return $text;
    	}    
        /* {BROWSE_SORTMENU} */
    	public function sc_browse_sortmenu($parm)
    	{
    		$text = $this->var['sortmenu'];
    		return $text;
    	} 
        /* {BROWSE_COMPLETEMENU} */
    	public function sc_browse_completemenu($parm)
    	{
    		$text = $this->var['completemenu'];
    		return $text;
    	}              
        /* {BROWSE_SORTEND} */
    	public function sc_browse_sortend($parm)
    	{
    		$text = $this->var['sortend'];
    		return $text;
    	}    
        /* {BROWSE_ALPHALINKS} */
    	public function sc_browse_alphalinks($parm)
    	{
  
    		$alphalinks =  build_alphalinks("browse.php?".$this->var['terms']."&amp;", $this->var['let']) ;
    		return $alphalinks;
    	}  
        /* {BROWSE_OUTPUT} */
    	public function sc_browse_output($parm)
    	{ 
    		$text = $this->var['output'];
    		return $text;
    	} 
        /* {BROWSE_OTHERRESULTS} */
    	public function sc_browse_otherresults($parm)
    	{
    		$text = $this->var['otherresults'];
    		return $text;
    	}  
        /* {BROWSE_SERIESBLOCK} */
    	public function sc_browse_seriesblock($parm)
    	{
    		$text = $this->var['seriesblock'];
    		return $text;
    	}          
        /* {BROWSE_PAGELINKS} */
    	public function sc_browse_pagelinks($parm)
    	{
            global $itemsperpage ;
         
       
            $pagelinks = '';
 
            if($this->var['numrows'] > $itemsperpage) {  
              $pagelinks = build_pagelinks("browse.php?".$this->var['terms']."&amp;",  $this->var['numrows'], $this->var['offset'] );
            }
 
    		return $pagelinks;
    	}  
        
        /*{BROWSE_SEARCHFORM}*/
       	public function sc_browse_searchform($parm)
    	{
 
            if($parm['type'] == "series" ) {
              $searchform_template =   e107::getTemplate('efiction', 'browse', "searchform");
              $search_vars['BROWSE_SORTBEGIN'] = $this->sc_browse_sortbegin($parm);
              $search_vars['BROWSE_CATEGORYMENU'] = $this->sc_browse_categorymenu($parm);
              $search_vars['BROWSE_CHARACTERMENU1'] = $this->sc_browse_charactermenu1($parm);
              $search_vars['BROWSE_CHARACTERMENU2'] = $this->sc_browse_charactermenu2($parm);            
              $search_vars['BROWSE_PAIRINGSMENU'] = $this->sc_browse_pairingsmenu($parm);
              $search_vars['BROWSE_RATINGMENU'] = $this->sc_browse_ratingmenu($parm);            
              $search_vars['BROWSE_CLASSMENU'] = $this->sc_browse_classmenu($parm);       
              $search_vars['BROWSE_SORTMENU'] = $this->sc_browse_sortmenu($parm);       
              $search_vars['BROWSE_COMPLETEMENU'] = $this->sc_browse_completemenu($parm);       
              $search_vars['BROWSE_SORTEND'] = $this->sc_browse_sortend($parm);                          
              $text = e107::getParser()->simpleParse($searchform_template['index'], $search_vars);
            }
            else {
              $searchform_template =   e107::getTemplate('efiction', 'browse', "searchform");
              $search_vars['BROWSE_SORTBEGIN'] = $this->sc_browse_sortbegin($parm);
              $search_vars['BROWSE_CATEGORYMENU'] = $this->sc_browse_categorymenu($parm);
              $search_vars['BROWSE_CHARACTERMENU1'] = $this->sc_browse_charactermenu1($parm);
              $search_vars['BROWSE_CHARACTERMENU2'] = $this->sc_browse_charactermenu2($parm);            
              $search_vars['BROWSE_PAIRINGSMENU'] = $this->sc_browse_pairingsmenu($parm);
              $search_vars['BROWSE_RATINGMENU'] = $this->sc_browse_ratingmenu($parm);            
              $search_vars['BROWSE_CLASSMENU'] = $this->sc_browse_classmenu($parm);       
              $search_vars['BROWSE_SORTMENU'] = $this->sc_browse_sortmenu($parm);       
              $search_vars['BROWSE_COMPLETEMENU'] = $this->sc_browse_completemenu($parm);       
              $search_vars['BROWSE_SORTEND'] = $this->sc_browse_sortend($parm);                          
              $text = e107::getParser()->simpleParse($searchform_template['index'], $search_vars);                  
            }
    		return $text;
    	}  
        
    }
