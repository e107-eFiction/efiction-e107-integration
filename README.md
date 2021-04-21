# eFiction e107 integration

- installed e107 and efiction on the same level 

Note:
for other solution use e107 bridge or alt_auth plugin. It is not enough for me now. 

# Latest version:

https://github.com/e107-eFiction/efiction-plugins-for-e107

## Version 1.0.0

New starter point for futher integration. 

## Version 1.0.1
- replaced _CHARSET
- replaced $_SESSION with e107 session handler

## Version 1.0.2
- categories as multicheck
- new edit form, fully templated + shortcodes
- fixed viewstories - with coauthors used story were displayed more times
- removed custom SK LANs and moved them to module, now SK and EN strings are the same


##  removing .tpl 
**index.tpl**
- [ ] added default template the same asi index.tpl
- [ ] added global shortcodes for block caption and block content
- [ ] index.php is clean now




Too much changes:

**browser.php**
- [ ] authors.php  not used here
- [ ] categories.php
- [ ] characters.php
- [ ] class.php
- [ ] featured.php - manually changed to $tpl
- [ ] home.php - manually changed to $tpl
- [ ] ratings.php
- [ ] recent.php - manually changed to $tpl
- [ ] series.php
- [ ] titles.php  - manually changed to $tpl
- [ ] toplists.php   not used here

**index for option list - 2 level browsing**
- [x] categories.php
- [x] characters.php
- [x] class.php
- [x] ratings.php
- [ ] toplists.php

**caption as shortcode**
- [x] authors.php  - used with authors.php
- [x] categories.php
- [x] characters.php
- [x] class.php
- [x] featured.php
- [x] home.php
- [x] ratings.php
- [x] recent.php
- [x] series.php
- [x] titles.php
- [x] toplists.php


**Integration**

- [x] using class2.php
- [x] _BASEDIR - after moving to plugin correct value is define ("_BASEDIR", e_PLUGIN."efiction/"); 
- [x] front languages
 
 
**categories as multicheck**
- [ ] check for explode array_filter(explode(",", $_POST['catid']), "isNumber")

**moving storyform to shortcodes**
- [ ] check _AUTHOR - LAN_AUTHOR


**seriesblock.php**
- [ ] template
- [ ] shortcode
- [ ] browse/series.php
- [ ] modules/challenges
- [ ] toplists/default.php
- [ ] user/favse.php
- [ ] user/reviewsby.php 
- [ ] user/seriesby.php 
- [ ] viewseries.php 

#### User/registration system

_Important_: Don't use e107 EUA in any case. It complicates things. 

- [x] replaced sessions 
- [x] separating users and authors, separated USERID and USERUID, isMEMBER is only for authors
- [x] added fanfiction_authors table to efiction plugin for adding user_id field, maybe will be removed, but with thousands users is easier manage authors directly 
- [ ] check delete authors functionality
- [ ] add delete or set level 4 for deleted e107 user
- [ ] check in clanmmember plugin for creating clanmember... it is similar solution
 

**user panels list**
- [ ] contact
- [ ] editbio
- [ ] editprefs
- [ ] favau
- [ ] favlist - used in viewuser.php
- [ ] favse
- [ ] favst
- [x] login - DELETED, managed by e107
- [x] logout - DELETED, managed by e107
- [x] lostpassword - DELETED, managed by e107
- [ ] manageimages 
- [ ] manfavs
- [ ] profile
- [ ] queries
- [x] register - DELETED, managed by e107
- [ ] reviewsby
- [ ] revreceived
- [ ] revres
- [ ] series by
- [ ] stats
- [ ] stories by
 
#### related to moving

- [x] include("includes/listings.php
- [x] basename($_SERVER['PHP_SELF']) replaced with e_PAGE
- [x] "modules/ checked


#### FOOTERF
- [x] adding FOOTERF + exit( ) everywhere after $tpl->printToScreen();
- [x] replace $tpl->printToScreen(); with:   
$output = $tpl->getOutputContent();  
$output = e107::getParser()->parseTemplate($output, true);
e107::getRender()->tablerender($caption, $output, $current);
- [x] replace $tpl->printToScreen( ) too

#### Separating caption from body
- [ ]  look for pagetitle change div to span (to be able still style it without tablerender)
- [ ]  replace $output if it is 
- [ ]  check $tpl->assign("pagetitle",
- [ ]  
- [ ]  
- [ ]  
 
#### path to images

#### 
- [ ] member.php  
- [ ] viewserie.php 
- [ ] viewstory.php  
- [ ] viewpage.php  
- [ ] viewuser.php  
- [ ] toplists.php  
- [ ] stories.php   
- [ ] series.php 
- [ ] searching.php  
- [ ] rss.php  - not nedded
- [ ] reviews.php 
- [ ] authors.php 
- [ ] browse.php 
- [ ] report.php
- [ ] maintenance.php
- [ ] index.php
- [ ] template.php  
- [ ] update.php

- [ ] admin.php  
  
in modules
in blocks - shoutbox + poll 
 
**Sitesettings**

- [ ] e107 admin
- [ ] efiction class
- [ ] TABLEPREFIX
- [ ] $displayprofile = Settings/Display/Select 'yes' if you wish for the member's profile to be displayed at all times on the viewuser page.
- [ ] {sitename}
- [ ] {slogan} 

**remove config.php**
- [x] rss.php


**TinyMce**:

- [ ] site settings
- [ ] user settings
- [ ] anything edited via AdminUI has [html][/html] - fix this on efiction side

**EditBio**

- [ ] delete not used fields
- [ ] replace with usersettings
- [ ] replace links

**Blocks**

- [ ] e107 Admin UI
- [ ] fixed default Data 
- [ ] blocks options settings
- [x] random block as e107 menu `{MENU: path=efiction/efiction_recent}`
- [x] featured block as e107 menu `{MENU: path=efiction/efiction_featured}`
- [x] recent block as e107 menu `{MENU: path=efiction/efiction_random}`
- [x] skinchange removed {skinchange_content}
- [x] login block removed
- [x] {menu_content} as e107 shortcode {EFICTION_MENU_CONTENT}
- [ ] {search_content}
- [ ] {info_title} {info_content}
- [ ] {online_content}  
- [ ] {shoutbox_title}{shoutbox_content}
- [ ] {poll_title} {poll_content} 
- [ ] {news_title} {news_content} 
 
**Panels**

- [ ] e107 Admin UI
- [ ] fixed default Data

**Pagelinks**

- [ ] e107 Admin UI
- [ ] fixed default Data
- [x] {EFICTION_LINK=xxx} for replacing {adminarea} {login} {logout}
- [x] {EFICTION_LINK=rss} for {rss}
- [ ] ?? xml
- [ ] {newsarchive}

**Level access control**

Rules:
Level 0 - all (visitors)
Level 1 - is Super Administer with access to everything.
Level 2 - can edit user 
Level 3 -  
Level 4 - is an authorized author for archives with submissions turned off
Maybe replaced with class assess later.

- [ ] change default data for panels
- [ ] check pagelinks access level (admins, members, all)

**Authors list**

Needed: All members, authors, betareader, site admins

**check**
- [x] "._BASEDIR."member.php - 
- [x] "._BASEDIR."admin.php
- [x] "._BASEDIR."stories.php

**captcha**
- [ ] original doesn't display numbers, only image is rendered
- [ ] replace with e107::getSecureImg();
- [ ] delete button.php, plain.button.php (not used)
- [x] better admin look in admin_settings.php e107::getForm() 
- [x] added check for gd library and new constant - if($newcaptcha && extension_loaded('gd'))  USE_IMAGECODE

button.php:
- [ ] used in report.php
- [ ] used in includes/reviewform.php if(!USERUID && !empty($captcha))
- [ ] used in user/contact.php if(!USERUID && !empty($captcha))  + captcha_confirm()
- [ ] used in user/editbio.php  if(!empty($captcha) && $action == "register") + captcha_confirm()
- [ ] used in blocks/shoutbox/shoutbox.php if(!isMEMBER && $captcha)  + captcha_confirm()
- [ ] used in modules/challenges/challenges.php if(!isMEMBER && $captcha) + captcha_confirm()

- [x] $captcha used in report.php captcha_confirm()
- [ ] $captcha used in review.php if($captcha && !isMEMBER && !captcha_confirm()) $output .= write_error(_CAPTCHAFAIL);
 
unified check if to use captcha if(!USERUID && USE_IMAGECODE)
- [x] used in report.php
- [x] used in includes/reviewform.php
- [x] used in user/contact.php

Display captcha:
- [x] report.php 


**New forms**
- [x] report.php


**replace TemplatePower**


**Templating**


**replace includes/emailer.php** 




**check removed actions**
- [ ] $action == "register"


**Removed contact.php**

- [x] deleted file Note: file can't be deleted without callback because reporting
- [x] renamed to report.php
- [x] replaced for reportthis  
- [ ] safety check
- [ ] (re)captcha support 
- [ ] add prefs to submit report for quests, image captcha is enough?

**Beta-reader module**

- [ ] replace by UEA field - return back efiction way
- [ ] fix authors - return back
- [ ] add link with list
- [ ] remove AUTORPREFS field - not now
- [ ] remove module - not now 

**Remove/check functionality**
- [ ] efiction debug
- [ ] efiction benchmark
- [x] efiction installation
- [ ] separated config page
- [ ] maintenance


**Replace db functions**
- [ ] loaded in config.php
- [ ] includes/dbfunctions.php 
- [ ] rss.php
- [ ] includes/categorieslist.php


**Messages/Custom pages**

- [x] Admin UI
- [x] Default data
- [ ] remove 'maintenance', not needed
- [ ] {welcome}
- [ ] {footer}
- [ ] 'copyright' $copy 


**global variables**

- [ ] $viewed
- [ ] $ageconsent $ageconsent =  efiction::settings('ageconsent');
- [ ] $headerSent
- [ ] $displaycolumns 
- [ ] $tinyMCE
- [ ] $colwidth
- [x] $defaultskin 
- [x] $globalskin 
- [x] $skinnew
- [ ] $displaycolumns efiction::settings('disablepopups');
- [ ] $disablesorts
- [ ] $favorites
- [x] $headerSent deleted, header is managed by e107
- [ ] $multiplecats  $multiplecats = efiction::settings('multiplecats') 
		- check ($multiplecats), (!$multiplecats)
- [ ] $up, $down


**Ajax user search**
+ category selection

- [x] fixed with debug mode 
- [x] load scripts in e107 header
- [ ] styling
- [x] scripts  



**Replace header with HEADERF**

//testing new theme without losing functionality !!! 
- [x] javascript.js
- [x] rss.php - debug mode issue
- [ ] coauthors search - works, just wrong position, propably due bootstrap css 
- [x] categories selection in edit form
- [x] categories selection in search form
- [ ] check extra_header.php functionality
- [x] printing 
- [x] inline css
- [x] rating popup
 


**Printing**
- [x] issue with FOOTERF - data are removed FIXED css issue
- [x] issue with HEADERF - printer is not called FIXED
- [ ] label conflict with bootstrap - change to ff-label

**RSS feed**
- [x] charset set (it is wrong on original site) - adding hardcoded utf-8 didn'help
 

**Date format issue** 

conversion to timestamp... ???
- [x] authors table (date of author creation)
- [ ] stories table
- [ ] chapters tabel


**efiction tpls**
- [ ] created skin e107, default from Epiphany
- [ ] added Sommerbrise skin + e107 theme
- [ ] removed efiction TemplatePower browse-index, replaced with tablerender()


**Constants**
- [x] _DOCTYPE, removed, not needed with e107 header
- [ ] TABLEPREFIX, replace with MPREFIX or #
- [x] replace if(!defined("_CHARSET")) exit( ); with _ if (!defined('e107_INIT')) { exit; } 

**Parsing**
- [ ] check format_story()


**Mail**
- [ ] includes/emailer.php vs e107 email handler - PHP Mailer update


**Page Setup**
- [x] Category list efiction::catlist();
- [x] Characters list efiction::charlist();
- [x] Classes list efiction::classlist();
- [x] Class types list efiction::classtypelist();
- [x] Ratings list efiction::ratingslist();

**e107 routing**


**Alphabet fix**


**Search Form e107 version for homepage**
[x] e107 alternative for homepage, added type home, hidden {EFICTION_SORTFORM} = block sortform
[x] fixed category selection script
[x] hardcoded template added, used the same shortcodes as efiction, replaced efiction templating, testing with new theme
[x] added home landing page after searchin browse/home


**Searching** 
[ ] Find a way how to set $disablesorts in admin area. This is pretty cool, but hardcoded. Or I haven't find where it is set.



