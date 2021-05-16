<?php


/*
{REVIEW_ODDEVEN}
{REVIEW_REVIEWER}
{REVIEW_MEMBER}
{REVIEW_RATING}
{REVIEW_REPORTTHIS}
{REVIEW_REVIEWDATE}
{REVIEW_CHAPTER}
{REVIEW_CHAPTER}
{REVIEW_ADMINOPTIONS}
*/

class plugin_efiction_reviewblock_shortcodes extends e_shortcode
{
 
 
    /* {REVIEW_LISTING} */
    public function sc_review_listing($parm = null)
	{
      $text = $this->var['listing'];   
      return $text;     
    }
    
    /* {REVIEW_ODDEVEN} */
    public function sc_review_oddeven($parm = null)
	{
      $text = $this->var['oddeven'];
      return $text;     
    }
    /* {REVIEW_REVIEWER} */
    public function sc_review_reviewer($parm = null)
	{
      $text = $this->var['reviewer'];
      return $text; 
    }
    /* {REVIEW_MEMBER} */
    public function sc_review_member($parm = null)
	{
      $text = $this->var['member'];
      return $text; 
    }
    /* {REVIEW_RATING} */
    public function sc_review_rating($parm = null)
	{
      $text = ratingpics($this->var['rating']);
      return $text; 
    }    
    /* {REVIEW_REPORTTHIS} */
    public function sc_review_reportthis($parm = null)
	{
      $text = $this->var['reportthis'];
      return $text; 
    }    
    /* {REVIEW_REVIEWDATE} */
    public function sc_review_reviewdate($parm = null)
	{
      $dateformat = efiction::settings('dateformat');
 
      $text = date("$dateformat", $this->var['date']);
      return $text; 
    }    
    /* {REVIEW_CHAPTER} */
    public function sc_review_chapter($parm = null)
	{
      $text = e107::getParser()->toHTML($this->var['chapter'], true, 'BODY');
      return $text; 
    }    
    /* {REVIEW_REVIEW} */
    public function sc_review_review($parm = null)
	{
      print_a($this->var['review']);
      $text = '';
      $text = e107::getParser()->toHTML($this->var['review'], true, 'BODY');
      return $text;   
    }    
    /* {REVIEW_ADMINOPTIONS} */
    public function sc_review_adminoptions($parm = null)
	{
      $text = $this->var['adminoptions'];
      return $text; 
    }    
    

}
