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
3. **Priority:** get searchform outside efiction to be able to use it on e107 pages

**Integration**

- [x] using class2.php
- [ ] _BASEDIR fix ? e_HTTP ? e_BASE it is problem with SEF-URLs
- [x] front languages

**User/registration system**:

- [x] replaced paths
- [x] replaced sessions 
- [x] separating users and authors, separated USERID and USERUID, isMEMBER is only for authors
- [x] added fanfiction_authors table to efiction plugin for adding user_id field, maybe will be removed, but with thousands users is easier manage authors directly 
- [x] fixed member.php
- [ ] check e107 admin login via another user
- [ ] delete user/login functionality
- [x] deleted login block - replaced by e107 login_menu
- [ ] check delete authors functionality
- [ ] add delete or set level 4 for deleted e107 user
- [ ] check in clanmmember plugin for creating clanmember... it is similar solution.  

TODO: wait for fix e107 extended fields, otherwise admin will need to connect users and authors

**Sessions**

- [x] replacing session _viewed // This session variable is used to track the story views
- [x] replacing session _ageconsent
- [x] replacing session _warned

**Age controls**:
- [ ] moving to UEA data? 
- [x] update title shortcode? 
- [x] fix viewstory.php

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

Now: All members, authors, betareader, site admins

**Removed contact.php**

- [x] deleted file Note: file can't be deleted without callback because reporting
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
- [x] includes/categorieslist.php


**Messages/Custom pages**

- [x] Admin UI
- [x] Default data
- [ ] remove 'maintenance', not needed
- [ ] {welcome}
- [ ] {footer}
- [ ] 'copyright' $copy 


**global variables**

- [ ] $viewed
- [ ] $ageconsent
- [ ] $headerSent
- [ ] $displaycolumns
- [ ] $tinyMCE
- [ ] $colwidth
- [x] $defaultskin 
- [x] $globalskin 
- [x] $skinnew
- [ ] $displaycolumns
- [ ] $disablesorts


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

**Added footer with FOOTERF**
- [x] viestory.php, fixed 3x.
- [x] browse.php
- [x] stories.php

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




