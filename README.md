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
- [] checke e107 admin login via another user

TODO: wait for fix e107 extended fields, otherwise admin will need to connect users and authors

**Age controls**:

- [] replacing sessions 
- [] moving to UEA data? 
- [] update title shortcode?  


**TinyMce**:

- [] site settings
- [] user settings
- [] anything edited via AdminUI has [html][/html] - fix this on efiction side

**EditBio**

- [] delete not used fields
- [] replace with usersettings
- [] replace links

**Blocks**

- [] e107 Admin UI
- [] fixed default Data 
- [] blocks options settings
- [] random block as e107 menu
- [] featured block as e107 menu
- [] recent block as e107 menu

**Panels**

- [] e107 Admin UI
- [] fixed default Data

**Pagelinks**

- [] e107 Admin UI
- [] fixed default Data

**Level access control**

New rules:
Level 0 - all (visitors)
Level 1 - user (any user log in e107)
Level 2 - author (only user connected with author table)
Level 3 - admins
Level 4 - main admin
Maybe replaced with class assess later.

- [] change default data for panels
- [] check pagelinks access level (admins, members, all)

**Authors list**

Now: All members, authors, betareader, site admins

**Removed contact.php**

- [] deleted file - file can't be deleted because reporting
- [x] renamed to report.php
- [x] replaced for reportthis  
- [] safety check
- [] (re)captcha support 


