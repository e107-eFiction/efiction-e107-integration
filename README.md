# eFiction e107 integration

- installed e107 and efiction on the same level 

Note:
for other solution use e107 bridge or alt_auth plugin. It is not enough for me now. 

### Preparation:
- installed full efiction and e107 CMS on the same level
- customized eFiction to noconflict version
- installed and activated efiction plugin
- use efiction index.php for testing  

### Goals:  
1. e107 theme used directly with eFiction frontend (and admin)
2. Separated e107 users and eFiction authors - make relation between them (alias members / authors / admins)

**Integration steps:** 

1. add `@ include_once(_BASEDIR."class2.php");`
after  `require_once("includes/get_session_vars.php");`
Note: after solving sessions, it could be moved upper


2. replace recent block 
`<h3>{recent_title}</h3>{recent_content}`
with
`{MENU: path=efiction/recent}`

and output (tested index.php)
from:
`$tpl->printToScreen();`

to:
```
$output = $tpl->getOutputContent( );  
$output = e107::getParser()->parseTemplate($output, true); 
echo $output;
```

Note: added possibility to template caption to be able have the same look 

3. replace random block
`{random_content} `with `{MENU: path=efiction/random}`

4. replace featured block
`{featured_content}` with `{MENU: path=efiction/featured}`

5. removed $defaultskin, $globalskin, $skinnew etc

**User/registration system**:

- [x] replaced paths
- [x] replaced sessions 
- [x] separating users and authors, separated USERID and USERUID, isMEMBER is only for authors
- [x] added fanfiction_authors table to efiction plugin for adding user_id field, maybe will be removed, but with thousands users is easier manage authors directly 
- [x] fixed member.php
- [ ] checke e107 admin login via another user
- [ ] delete user/login functionality

TODO: wait for fix e107 extended fields, otherwise admin will need to connect users and authors

**Sessions**

- [ ] replacing session _viewed // This session variable is used to track the story views
- [ ] replacing session _ageconsent
- [ ] replacing session _warned

**Age controls**:
- [ ] moving to UEA data? 
- [ ] update title shortcode? 
- [ ] fix viewstory.php

**Sitesettings**

- [ ] e107 admin
- [ ] efiction class
- [ ] TABLEPREFIX
- [ ] $displayprofile = Settings/Display/Select 'yes' if you wish for the member's profile to be displayed at all times on the viewuser page.

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
- [ ] random block as e107 menu
- [ ] featured block as e107 menu
- [ ] recent block as e107 menu

**Panels**

- [ ] e107 Admin UI
- [ ] fixed default Data

**Pagelinks**

- [ ] e107 Admin UI
- [ ] fixed default Data

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

Now: All members, authors, betareader, site admins

**Removed contact.php**

- [ ] deleted file - file can't be deleted because reporting
- [x] renamed to report.php
- [x] replaced for reportthis  
- [ ] safety check
- [ ] (re)captcha support 

**Beta-reader module**

- [x] replace by UEA field
- [ ] fix authors 
- [ ] add link with list
- [ ] remove AUTORPREFS field
- [ ] remove module

**Remove functionality**
- [ ] efiction debug
- [ ] efiction benchmark
- [x] efiction installation
- [ ] separated config page
- [ ] maintenance


**Replace db functions**
- [ ] loaded in config.php
- [ ] includes/dbfunctions.php 
- [x] rss.php


**Messages/Custom pages**

- [x] Admin UI
- [x] Default data
- [ ] remove 'maintenance', not needed

**global variables**

- [ ] $viewed
- [ ] $ageconsent
- [ ] $headerSent
- [ ] $displaycolumns
- [ ] $tinyMCE
- [ ] $colwidth

**Ajax user search**

- [ ] fixed with debug mode 
- [ ] load scripts in e107 header
- [ ] styling
- [ ] scripts  

**Replace header with HEADERF**

//testing new theme without losing functionality !!! 
- [ ] javascript.js
- [x] rss.php - debug mode issue
- [ ] coauthors search - works, just wrong position, propably due bootstrap css 
- [x] categories selection in edit form
- [x] categories selection in search form
- [ ] check extra_header.php functionality
- [x] printing 
- [x] inline css
- [x] rating popup

**Added footer with FOOTERF**
- [x] viestory.php
- [x] browse.php

**Printing**
- [x] issue with FOOTERF - data are removed FIXED css issue
- [x] issue with HEADERF - printer is not called FIXED
- [ ] label conflict with bootstrap - change to ff-label

**RSS feed**
- [x] charset set (it is wrong on original site) - adding hardcoded utf-8 didn'help
 

**Date format issue** 
conversion to timestamp...
-  
