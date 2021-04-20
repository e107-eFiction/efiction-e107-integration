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
        
        /* {EFICTION_CAPTION} */
    	public function sc_efiction_caption($parm)
    	{
        
    		$text = $this->var['caption'];
    		return $text;
    	}
        
        /* {EFICTION_SORTBEGIN} */ 
    	public function sc_efiction_sortbegin($parm)
    	{
    		$text = $this->var['sortbegin'];
    		return $text;
    	}
        /* {EFICTION_CATEGORYMENU} */
    	public function sc_efiction_categorymenu($parm)
    	{
    		$text = $this->var['categorymenu'];
    		return $text;
    	}        
        /* {EFICTION_CHARACTERMENU1} */
    	public function sc_efiction_charactermenu1($parm)
    	{
    		$text = $this->var['charactermenu1'];
    		return $text;
    	}           
        /* {EFICTION_CHARACTERMENU2} */
    	public function sc_efiction_charactermenu2($parm)
    	{
    		$text = $this->var['charactermenu2'];
    		return $text;
    	}            
        /* {EFICTION_PAIRINGSMENU} */
    	public function sc_efiction_pairingsmenu($parm)
    	{
    		$text = $this->var['pairingsmenu'];
    		return $text;
    	}          
        /* {EFICTION_RATINGMENU} */
    	public function sc_efiction_ratingmenu($parm)
    	{
    		$text = $this->var['ratingmenu'];
    		return $text;
    	}   
        /* {EFICTION_CLASSMENU} */
    	public function sc_efiction_classmenu($parm)
    	{
    		$text = $this->var['classmenu'];
    		return $text;
    	}    
        /* {EFICTION_SORTMENU} */
    	public function sc_efiction_sortmenu($parm)
    	{
    		$text = $this->var['sortmenu'];
    		return $text;
    	} 
        /* {EFICTION_COMPLETEMENU} */
    	public function sc_efiction_completemenu($parm)
    	{
    		$text = $this->var['completemenu'];
    		return $text;
    	}              
        /* {EFICTION_SORTEND} */
    	public function sc_efiction_sortend($parm)
    	{
    		$text = $this->var['sortend'];
    		return $text;
    	}    
        /* {EFICTION_ALPHALINKS} */
    	public function sc_efiction_alphalinks($parm)
    	{
    		$text = $this->var['alphalinks'];
    		return $text;
    	}  
        /* {EFICTION_OUTPUT} */
    	public function sc_efiction_output($parm)
    	{ 
    		$text = $this->var['output'];
    		return $text;
    	} 
        /* {EFICTION_OTHERRESULTS} */
    	public function sc_efiction_otherresults($parm)
    	{
    		$text = $this->var['otherresults'];
    		return $text;
    	}  
        /* {EFICTION_SERIESBLOCK} */
    	public function sc_efiction_seriesblock($parm)
    	{
    		$text = $this->var['seriesblock'];
    		return $text;
    	}          
 
    }
