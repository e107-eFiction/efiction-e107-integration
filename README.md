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

5. removed $defaultskin, $globalskin etc




