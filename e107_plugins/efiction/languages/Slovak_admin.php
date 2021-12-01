<?php

define ("_ACTION", "Action");
define ("_ADDADMIN", "Add New Admin");
define ("_ADDAUTHOR", "Add New Author");
define ("_ADMINCATNOTE", "By selecting categories to oversee you are limiting your admins to administering <strong>just</strong> those categories.  Selecting a category does not include it's sub-categories!  Leave this section empty to administer all categories.");
define ("_ADDCUSTPAGE", "Add New Custom Page");
define ("_ADDFIELD", "Add Profile Field");
define ("_ADDNEWCHARS", "Add New Characters");
define ("_ADDNEWCLASSTYPE", "Add New Classification Type");
define ("_ADDNEWCLASSES", "Add New Classifications");
define ("_ADDNEWFIELD", "Add new profile field");
define ("_ADDNEWLINK", "Add New Link"); 
define ("_ADDNEWPANEL", "Add New Panel");
define ("_ADDPANEL", "Add Panel"); 
define ("_ADDRAT", "Add New Rating");
define ("_ALREADYUPDATED", "This update has already been completed.  No further action is needed.");
define ("_ADMINDELETE", "Admin Deletes");
define ("_ADMINEDIT", "Admin Edits");
define ("_ADMINEMAIL", "Admin E-mail");
define ("_ADMIN", "Admin");
define ("_ADMINS", "Admins");
define ("_AGESTATEMENT", "Age statement in user profile");
define ("_ALERTSON", "Alerts on");
define ("_ALLOWRATEONLY", "Allow Ratings Only");
define ("_ALLOWRR", "Allow round robins");
define ("_ALLOWSERIES", "Allow Series");
define ("_ALLREV", "All Reviews");
define ("_ALREADYINSTALLED", "That module is already installed.");
define ("_ANONREV", "Anonymous Reviews");
define ("_ANONREVIEWS", "Allow anonymous reviews");
define ("_ARCHIVEMAINT", "Archive Maintentance");
define ("_AUTHORRELEASED", "The author has been removed from the admin created list, and an e-mail has been sent to them with their temporary password. <br /><br /><a href=\"admin.php?action=members\">Back to Members Maintenance</a>");
define ("_AUTHORSONLY", "Authors Only");
define ("_AUTHORVALIDATED", "The author has been validated.");
define ("_AUTOVALIDATE", "Automatically validate all stories");
define ("_BACKUP", "Backup Database");
define ("_BADLOGIN", "Bad Logins");
define ("_BADVARNAME", "Name variables must include alpha-numeric, -, and - characters only.");
define ("_BLOCKTYPE", "Block style");
define ("_BOTHLINKSTYLE", "Both");
define ("_CAPTCHA", "Use captcha verification");
define ("_CATCOUNTSUPDATED", "Category counts updated.");
define ("_CATERROR", "The category cannot be a sub-category of itself.");
define ("_CATLEVEL", "Subcategory of");
define ("_CATORDER", "Fix Category Order");
define ("_CATOVERSEE", "Categories to oversee");
define ("_CATNAME", "Category Name");
define ("_CENSOR", "Language Censor");
define ("_CENSORDIRS", 
"The list of words below will be forbidden words.  They will be disallowed entirely in names and titles.  
They will be replaced with the first letter and trailing asterisks, a****,  in summaries and the text of reviews.  Seperate each word with a comma.  
Placing an asterisk before and/or after the word will act as a wildcard making the censor look for the entire word plus 
the word used as a suffix and/or prefix.  For example, 'frog' will only find 'frog', '*frog' will find 'bullfrog' and 'frog' but not 
'froglegs', 'frog*' will find both 'frog' and 'froglegs' but not 'bullfrog', '*frog*' will find 'frog', 'bullfrog', and 'froglegs.'  
To disable the censor simply leave the list of words empty.");
define ("_CHANGELOG", "Change Log");
define ("_CHARACTER", "Character");
define ("_CHOOSECATNOTE", "Choose a category to view the characters for that category.");
define ("_CLASS", "Classification");
define ("_CLASSTYPES", "Classification Types"); 
define ("_CLASSLISTNOTE", "Click on the classification type to add items to it.");
define ("_CLASSNOTE", 
"The name you assign to your classification will be the {name} variable for you to use in your skins.  
The title will be what is displayed in the forms as the title. 
<p><strong>Note:</strong> The name for your classification should contain letters, numbers, and the underscore character ONLY.</p>");
define ("_COAUTHALLOW", "Co-authors allowed");
define ("_COLUMNS", "Number of Columns");
define ("_CONFIRMINSTALL", "Are you sure you want to install this module?");
define ("_CONFIRMUNINSTALL", "Are you sure you want to uninstall this module?");
define ("_CONFIRMUPDATE", "Are you sure you want to update?  You are encouraged to back up your database before proceeding with this operation.");
define ("_CONFIRMUNLOCK", "Are you sure you want to unlock this account?");
define ("_CONFIRMAUTHORRELEASE", "Are you sure you want to release this author?");
define ("_CONFIRMADMINREVOKE", "Are you sure you want to revoke this admin's privileges?");
define ("_CONFIRMVALREVOKE", "Are you sure you want to revoke this author's validation?");
define ("_CONFIRMVALIDATE", "Are you sure you want to validate this author?");
define ("_COPYRIGHT", "Copyright Footer");
define ("_COUNTCATS", "Fix Category Counts");
define ("_CURRENTVERSION", "The current version of eFiction is ");
define ("_CUSTPAGENOTE", 
"The name you assign to your custom page will be the {NAME_link} variable for you to use in your skins. The script will append \"_link\" to the name to help prevent naming conflicts with other variables. The title will be the title of the page. 
For the URL of your custom page, you may use either viewpage.php?id=ID or viewpage.php?page=NAME where ID is the ID number of the page or NAME is the name of the page. <p><strong>Note:</strong> The name for your page should contain letters, numbers, and the underscore character ONLY.</p>");
define ("_CUSTPAGES", "Custom Pages"); 
define ("_DATE", "Date");
define ("_DATEFORMAT", "Date Format");
define ("_DEBUG", "Display Debug Information");
define ("_DEFAULTSKIN", "Default Skin");
define ("_DELETEUSER", "Delete Member Account");
define ("_DESC", "Description");
define ("_DISPLAYPROFILE", "Display Profile"); 
define ("_DISPLAYSETTINGS", "Display Settings"); 
define ("_EDITCAT", "Edit Category");
define ("_EDITCHAR", "Edit Character");
define ("_EDITFIELD", "Edit Profile Field");
define ("_EDITRAT", "Edit Rating");
define ("_EDITPANEL", "Edit Panel");
define ("_EMAILSETTINGS", "E-mail Settings");
define ("_EMAILWARNING", "Please be warned: using this form will send out an e-mail to every person who matches the criteria you select. Because the script uses PHP's mail() function to do this, it could cause substantial server load if you are sending to more than 1000 site members.");
define ("_EXTENDCATS", "Display category path in listings");
define ("_FAVORITES", "Allow Favorites");
define ("_FAVOR", "Favorites");
define ("_FEATUREDNOTE", "<b>Note:</b> To retire a featured story click on the <strong>"._RETIRE."</strong> link.  To make a retired featured story current again, click on the <strong>"._CURRENT."</strong> link.  Clicking on <strong>"._REMOVE."</strong> removes the featured status entirely."); 
define ("_FEATUREDSTORIES", "Featured Stories");
define ("_FIELDURL", "URL");
define ("_FIELDSELECT", "Select box");
define ("_FIELDYESNO", "Yes/No");
define ("_FIELDIDURL", "ID with URL");
define ("_FIELDCODEIN", "Custom Form Code");
define ("_FIELDCODEOUT", "Custom Profile Code");
define ("_FIELDCUSTOM", "Custom Code");
define ("_FIELDON", "Field enabled");
define ("_FILES", "Files");
define ("_FIRSTLAST", "First and Last Pages");
define ("_FOREIGNAUTHORTABLE", "You appear to be using a non-eFiction author table.");
define ("_FOREIGNDELETE", " All content within eFiction for this member has been deleted.  To delete the member's account please use the appropriate function in the other application.");
define ("_FUNCTIONDISABLED", "That function is disabled while the script is bridged.");
define ("_HIDDEN", "Hidden");
define ("_HIDDENSKINS", "Hidden Skins");
define ("_HIDDENNOTE", "Click on the checkbox next to the name of the skin in the form above then click 'Submit' to hide it from non-admins.");
define ("_HOWSTORE", "Stories saved in");
define ("_ID", "ID"); // Added to 3.0 for displaying ID numbers in admin panels
define ("_IMAGEUPLOAD", "Allow image uploads?");
define ("_IMAGESIZE", "Maximum image size");
define ("_INACTIVE", "Inactive");
define ("_INDEXONLY", "Index Only");
define ("_INITIALIZE", "Initialize Block");
define ("_INPUTBYADMIN", "Authors Input by Admins");
define ("_IP", "IP Address");
define ("_INSTALLMODULE", "Install this module");
define ("_LANGUAGE", "Language");
define ("_LEVEL", "Level");
define ("_LIKESYS", "Like/Dislike"); // Changed to avoid conflict with user _LIKE declaration
define ("_LINKACCESS", "Link Access Level"); 
define ("_LINKKEY", "Link Access Key");
define ("_LINKRANGE", "Size of Range for Page Links");
define ("_LINKS", "Links");  
define ("_LINKSTYLE", "Style of page links");
define ("_LINKTEXT", "Text of Link");
define ("_LOCKCONFIRM", "Are you sure you want to lock this member's account?");
define ("_LOCKMEMLIST", "Locked Members");
define ("_LOCKMEMBERS", "Click on a member's name to lock their account.");
define ("_LOGGING", "Turn on action log");
 
define ("_MAINSETTINGS", "Site Information");
define ("_MAINTENANCE", "Maintenance");
define ("_MAX", "Maximum");
define ("_MAXHEIGHT", "Max image height");
define ("_MAXWIDTH", "Max image width");
define ("_MAXMINWORDS", "Chapter word count limits");
define ("_MAXMINNOTE", "<strong>Note:</strong> To impose no limits, leave blank or enter 0.  Suggested limits are a minimum of 100 words and a maximum of 16000.");
define ("_MEMLOCK", "Lock/Ban Member");
define ("_MESSAGESENT", "Messages sent: "); 
define ("_MESSAGESETTINGS", "Nastavenie správ");
define ("_MIN", "Minimum");
define ("_MODNOTINSTALLED", "This module is not installed.");
define ("_MORETHANONE", "More than one");
define ("_MYSQL", "mySQL");
define ("_NAMECONVENTIONS", 
"<strong>Note:</strong> Names will be used in variables within the script and in your skin template files.  
Therefore, you should use letters and numbers ONLY.  <span style=\"text-decoration: underline;\">No spaces or punctuation marks!</span>");
define ("_NATPL", "Not applicable.  Use .tpl selected.");
define ("_NEWCAT", "New Category");
define ("_NEWCHAR", "New Character");
define ("_NEWITEM", "New Item");
define ("_NEWMAIN", "Add New Top Level Category");
define ("_NEWRAT", "New Rating");
define ("_NEWREG", "New Registrations");
define ("_NEWWINDOW", "New Window");
define ("_NEXTPREV", "Next and Previous Links");
define ("_NOLETTER", "Email o odmietnutí");
define ("_NONVALMEMBERS", "Non-validated Members");
define ("_NOPANELS", "No admin panels found!"); 
define ("_NOFIELDTYPE", "No field type set.");
define ("_NOSUBS", "Turn off unsolicited submissions");
define ("_NOTAUTHORIZEDADMIN", "Your admin privileges do not authorize you to access this function.");
define ("_NOTHANKYOU", "Rejection letter (default)");
define ("_NUMCATS", "Number of categories");
define ("_NUMCHARS", "Number of Characters");
define ("_NUMITEMS", "Default items per page");
define ("_OFF", "Off");
define ("_ON", "On");
define ("_ONLYONE", "Only one");
define ("_ONREVIEWS", "Turn on reviews");
 
define ("_ORDERAFTER", "Place in Order After");
define ("_PANELORDER", "Fix Panel Order");
define ("_PANELS", "Panels"); 
define ("_PANELURL", "URL to Panel");
define ("_PRINTERCOPYRIGHT", "Print Copyright Notice"); 
define ("_PROFILE", "Member Profile");
define ("_PURGELOG", "Purge the log");
define ("_PWDSETTING", "Password at Registration");
define ("_QUEUECOUNT", "There are %d chapters waiting to be validated."); // Added for 3.0
define ("_RANDOM", "randomly generated");
define ("_RECALCREVIEWS", "Recalculate Reviews");
define ("_RECALCSTORIES", "Recalculate Stories");
define ("_RECENTDAYS", "Number of days to limit "._MOSTRECENT);
define ("_RELEASEAUTHORS", "Click on the author's name to release the author.");
define ("_RELEASED", "Author Released");
define ("_RELEASEMESSAGE", "Hello, the admins of $sitename have opened your account so that you may add/edit/delete your own stories. Your new password for the penname '%s' is %s.  It is recommended that you go to <a href='$url/user.php'>your account</a> and change the password to something easier for you to remember.");
define ("_REVDELETE", "Authors may delete reviews");
define ("_REVIEWSETTINGS", "Review Settings"); 
define ("_RULES", "Rules");
 
define ("_SAMEWINDOW", "Same Window");
define ("_SECURITYDELETE", "You have not deleted the install folder! Please do so immediately to prevent a security breach.");
define ("_SELF", "member selected");
define ("_SELECTONE", "Select One");
define ("_SETTINGS", "Settings");
define ("_SITEINFO", "Site Information"); 
define ("_SITEKEY", "Site Key");  
define ("_SITEKEYCHANGED", "<strong>WARNING!</strong> You have chosen to change your sitekey.  Unless you change the information in your config.php to match your site will cease to function!");
define ("_SITEKEYREQUIRED", "A sitekey is required!");
define ("_SITENAME", "Sitename");
define ("_SITESETTINGS", "Site Settings"); 
define ("_SITESLOGAN", "Site Slogan");
define ("_SITEURL", "Site URL");
define ("_SITEWIDE", "Sitewide");
define ("_SMTPHOST", "SMTP Host");
define ("_SMTPOFF", "Leave empty if sendmail is enabled.");
define ("_SMTPPASS", "SMTP Password");
define ("_SMTPUSER", "SMTP Username");
define ("_STARS", "Stars");
define ("_STATS", "Re-calculate Site Statistics");
define ("_STATUS", "Status");
define ("_STORIESPATH", "Stories Path");
define ("_STORYINDEX", "Use Story Index");
define ("_STORYVALIDATED", "The story has been validated.");
define ("_SUBCATEGORY", "Sub-category");
define ("_SUBMISSIONSETTINGS", "Submission Settings");
define ("_SUBMISSIONS", "Submissions");
define ("_SUBMITTED", "View Submitted");
define ("_TABLEPREFIX", "Table Prefix");
define ("_TAGS", "Allowed Tags");
define ("_TARGET", "Link Target");
define ("_THANKYOU", "Acceptance letter (default)");
define ("_TIMEFORMAT", "Time format");
define ("_TINYMCE", "TinyMCE Configuration");
define ("_TINYMCENOTE", 
"<b>Note:</b> If tinyMCE is enabled, tinyMCE's cleanup function will run <strong>before</strong>
 tags are stripped using the allowed tags below.  This means, for instance, that &lt;b&gt; tags will be converted to &lt;strong&gt; tags.  
See TinyMCE's documentation for information on how it cleans input.");
define ("_TYPE", "Type"); 
define ("_UNINSTALLMODULE", "Uninstall this module");
define ("_UNLOCK", "Unlock Account");
define ("_UNLOCKMEMBERS", "Unlocked Members");
define ("_URL", "Link URL");
define ("_USERPOPS", "Warning pop-ups only once");
define ("_USERSETTINGS", "User Settings"); 
define ("_VALMEMBERS", "Validated Members");
define ("_VALIDATESTORY", "Validate Story");
define ("_VIEWALL", "View All");
define ("_VIEWLOG", "View Action Log");
define ("_VIEWMYCATS", "View My Categories");
define ("_VIEWSUBMITTED", "View Submissions");
define ("_WARNING", "Warning");
define ("_WARNINGPOP", "Warning Pop-up");
define ("_WARNINGTEXT", "Warning text");
define ("_WELCOME", "Welcome message");
define ("_WHATRATINGS", "Ratings system");
define ("_YESLETTER", "Email o schválení");

// Blocks
define("_DEFAULT", "Default");
define("_FORMAT", "Format");
define("_USETPL", "Use .tpl");
define("_TEMPLATE", "Template");
define("_NA-TPL", "Not Available. Layout defined in .tpl file.");
define("_SUMLENGTH", "Length of Summary");
define("_STRIPTAGS", "Strip all tags");
define("_ALLOWTAGS", "Allow tags");
define("_SUMNOTE", "Default is 75 characters.");

define ("_HELP_ADLEVEL", "This setting defines the admin's level of access.  Level 1 is Super Administer with access to everything.  Level 4 is an authorized author for archives with submissions turned off.");
define ("_HELP_ALLOWSERIES", "This setting determines who, if anyone, may add series to the site.  You may choose to allow all members to add series or only authors.  If you set this to "._NO." only admins will be able to add series.");
define ("_HELP_CONTACTSUB", "Check this box to be contacted for new submissions.");
define ("_HELP_NUMCHARS", "Select the number of characters you wish to add to this category.");
define ("_HELP_CHARS", "Enter the name of the character then a description of the character if you wish.  The character's description will appear at the top of the character's page when you browse for stories by character.");
define ("_HELP_RATING", "Ratings are intended to be used to show for what audience the story is appropriate.  A rating is required for every story, so you have to input at least one.");
define ("_HELP_RATINGWARNING", "When this box is checked, a warning will pop-up when someone clicks on the story.  This is often used to warn for material some may find objectionable or disturbing.");
define ("_HELP_RATINGCONSENT", "If you want people to confirm they are the age of consent (either through a pop-up or within their profile) before viewing stories with this rating check here.  This can be in conjunction with the registered users only setting below or independent of it.  For instance, you may want stories for mature audiences (blood and violence) to be for all registered users but require age consent in addition for sexually explicit materials.  So the permissions options are: everyone, age-consent required, registration-required, age-consent and registration-required.");
define ("_HELP_RATINGUSERS", "If you want only registered users to be able to view stories with this rating check this box.  This can be in conjunction with the check for age consent or not.  For instance, you may want stories for mature audiences (blood and violence) to be for all registered users but require age consent in addition for sexually explicit materials.  So the permissions options are: everyone, age-consent required, registration-required, age-consent and registration-required.");
define ("_HELP_RATINGWARNTEXT", "Set the specific text of your warning here.  Default text for age consent and registered users will be placed in front of this warning if those options are checked.");
 
 
 
 
 
define ("_HELP_SITEEMAIL", "The e-mail addressed used by the site to send e-mails through the site's contact forms and various e-mail alert options.");
define ("_HELP_SITESKIN", "The site's skin defines the look of the site.  The script comes with several default skins which you are free to modify or you can create your own.");
define ("_HELP_LANGUAGE", "The language the site will be displayed in.  The language files are found in the languages/ folder.  You may create your own translations through these files.");
define ("_HELP_SUBSOFF", "When this is set to 'off' only admins will be able to submit items to the archive.  The submission options will not appear in the member's area.");
define ("_HELP_AUTOVALIDATE", "Setting this to 'no' forces new stories from into a queue for the site's admins to approve.  You can 'validate' specific authors to allow them to by-pass this validation.  When this setting is set to 'yes', all stories are automatically accepted into the archive.");
define ("_HELP_COAUTHORS", "By selecting 'yes' you are allowing authors to have co-authors for their stories.");
define ("_HELP_ROUNDROBINS", "Round robins are stories in which an author posts the beginning of the story then other authors are encouraged to add to it.  If you don't want this type of story, turn this setting off.");
define ("_HELP_STORE", "This setting defines how the text of your stories is stored either in the database or in files on the server.  You are <strong>strongly</strong> encouraged not to change this setting after installation or you will lose access to all previously entered stories!");
define ("_HELP_STORIESPATH", "If you choose to store your stories' text on the server in files, this will be the path to the folder in which they're stored.  Again, you are <strong>strongly</strong> encouraged to not change this setting after installation.");
define ("_HELP_MINMAXWORDS", "You may set a minimum and/or maximum word count for chapters.  Leave blank or enter 0 to impose no limits.  These limits are only in effect for the story text NOT summaries, personal bios, reviews, etc.  If you are storing your text in the database it might be wise to impose a maximum of 16,000 words.");
define ("_HELP_ALLOWEDTAGS", "List the tags you wish to allow in form input throughout the site.");
define ("_HELP_FAVORITES", "Allow members to list their favorite stories, series, and authors within their profile.");
define ("_HELP_NUMCATS", "If you have only one category, you should set this to 'only one'.  Doing so will create shortcuts in a few areas where of the site where category selection is required when there is more than one category.");
define ("_HELP_DATEFORMAT", "Sets the date format to be used throughout the site.  You may select one of the formats in the list or define a custom format using PHP's date( ) format options.");
define ("_HELP_EXTENDCATS", "By selecting 'yes', the breadcrumb path to the selected category will be shown in story listings.  Choosing 'no' will show only the category and not it's parent categories.");
define ("_HELP_COLUMNS", "Defines how many columns the site will use when displaying categories and author names.");
define ("_HELP_IMAGEUPLOAD", "Defines whether or not members may upload images to be used in their story and profile. <strong>Note:</strong> You must define a stories folder and CHMOD it to 777 for this option to work.");
define ("_HELP_IMAGESIZE", "Defines the maximum height and width for image uploads.");
define ("_HELP_ITEMSPERPAGE", "Defines how many items will be displayed per page for pagination purposes.");
define ("_HELP_RECENTDAYS", "Sets the number of days to limit the stories listed in the 'Most Recent' page.  Leave this blank to have no limit.");
define ("_HELP_DISPLAYINDEX", "Defines whether or not the story index (table of contents) is displayed by default in multi-chapter stories.");
define ("_HELP_DISPLAYPROFILE", "Select 'yes' if you wish for the member's profile to be displayed at all times on the viewuser page.");
define ("_HELP_REVIEWSON", "Defines whether or not the reviews system is turned on.");
define ("_HELP_ANONREVIEWS", "If you have elected to turn on reviews, this determines whether or not anonymous reviews (from people not logged in) wll be allowed.");
define ("_HELP_REVDELETE", "If reviews are turned on, this defines which reviews (if any) authors are allowed to delete themselves.");
define ("_HELP_RATINGS", "Defines the rating system in place in your archive.  Your choices are no ratings, like/dislike, or 5 star ratings.  You are <strong>strongly</strong> encouraged to not change this after installation or your ratings as changing from one system to the other will mess up existing ratings.");
define ("_HELP_RATEONLY", "Defines whether or not reviewers may post a rating for the story (if ratings are on) without posting a review.");
define ("_HELP_ALERTSON", "This defines whether or not the author/story update alerts system is turned on.  If it is turned on, members will have an option in their preferences to receive e-mail alerts when their favorite authors and stories are updated.");
define ("_HELP_AGECONSENT", "This setting determines if an age consent statement will appear in the member preference form.  If a member has confirmed their age in the preferences, it will allow them to by-pass the warning pop-ups for stories with age consent ratings.");
define ("_HELP_POPUPS", "This setting lets you allow visitors to receive the warning pop-ups only once.  Logged in members who have confirmed the age consent statement in their profile by-pass the warnings altogether");
define ("_HELP_PWD", "Sets the mode for password generation when new members sign up.  The default is randomly generated paswords sent via e-mail to the user.  You may also allow new membes to choose their own inital password.");
define ("_HELP_STATS", "Click here to re-calculate the site statistics.");
define ("_HELP_SMTPHOST", "The URL of your SMTP server.  Leave this setting blank to use sendmail instead.");
define ("_HELP_SMTPUSER", "The user name to use with the SMTP server.");
define ("_HELP_SMTPPWD", "The password for the SMTP user name set above.");
define ("_HELP_PANELS", "Several pages within eFiction use panels to dynamically add to their options and features including this Admin area.  Select the panel type to re-arrange the order of the panels for that type.");
define ("_HELP_CATLEVEL", "Choose where within the category tree you want this category to fall.  Choose '"._TOPLEVEL."' if you wish this category to be placed at the top of the tree.  Otherwise, choose the category you wish this category placed under.");
define ("_HELP_ORDERAFTER", "Choose the category you want this category placed <strong>after</strong> in the list of categories.");
define ("_HELP_CATNAME", "The name of the category as it will be displayed on your site.");
define ("_HELP_CATDESC", "A brief description of the category.  This is not required.");
define ("_HELP_LOCKED", "New stories cannot be added to locked categories.");
define ("_HELP_CATIMAGE", "The category image is not required.  It is a graphic representing the category and should be placed in the images folder of your skin.  The script will correct for missing images.");
define ("_HELP_CATCOUNTS", "Click here to fix the story counts for each category.");
define ("_HELP_LOGGING", "This defines whether or not certain actions will be logged on the site.  Among the actions logged are registrations, change of penname, admin edits, admin deletes, and rejection of stories.");
define ("_HELP_MAINTENANCE", "This setting defines whether or not the site is in maintenance mode.  In maintenance mode only admins may access the site.");
define ("_HELP_FIELDCODEIN", "This code will be used in the edit bio/registration form to build the form element.");
define ("_HELP_FIELDCODEOUT", "This code will be used in the profile.php page to display the information back out.");
define ("_HELP_FIELDIDURL", "Enter the URL pattern to be used with this ID, using {info} in place of the ID.  For example, http://{info}.livejournal.com.");
define ("_HELP_FIELDSELECT", "Enter the options for the select list.  One per line.");
define ("_HELP_FIELDTYPE", "Choose the type of field this will be.");
define ("_HELP_LINKSTYLE", "The format in which the pagination links at the bottom of multi-page results will apppear.");
define ("_HELP_LINKRANGE", "The number of pages to display at one time in the pagination links at the bottom of multi-page results.");
define ("_HELP_DEBUG", "Set this to yes, to display information that will help you debug problems on your site.");
define ("_HELP_RECALCREVIEWS", "Click here to fix the count and ratings for reviews.");
 
define ("_HELP_BACKUP", "Click here to backup your database tables.  You should perform this maintenance periodically to protect your site data.");
define ("_HELP_CAPTCHA", "This setting lets you use a captcha image on registration and anonymous submissions such as reviews.  Your web server must have GD support enabled for the image to display.");
define ("_HELP_CATORDER", "This option will fix errors in the numbering of the category order saved in the database.  This will <strong>not</strong> change the order of your categories only correct errors in the database numbering.");
define ("_HELP_PANELORDER", "This option will fix errors in the numbering of the panel order saved in the database.  This will <strong>not</strong> change the order of your panels only correct errors in the database numbering.");
define ("_HELP_RECALCSTORIES", "Click here to fix the story count for authors.");

// Log strings

define ("_LOG_VALIDATE_STORY", "<a href='viewuser.php?uid=%2\$d'>%1\$s</a> validated <a href='viewstory.php?sid=%4\$d'>%3\$s</a> by <a href='viewuser.php?uid=%6\$d'>%5\$s</a>.");
define ("_LOG_VALIDATE_CHAPTER", "<a href='viewuser.php?uid=%2\$d'>%1\$s</a> validated <a href='viewstory.php?sid=%4\$d'>%3\$s</a> (chapter %7\$d) by <a href='viewuser.php?uid=%6\$d'>%5\$s</a>.");
define ("_LOG_REJECTION", "<a href='viewuser.php?uid=%2\$d'>%1\$s</a> rejected <a href='viewstory.php?sid=%4\$d'>%3\$s</a> (chapter %7\$d). The rejection letter sent was as follows:<br /><br />%8\$s");
define ("_LOG_RECALCREVIEWS", "<a href='viewuser.php?uid=%2\$d'>%1\$s</a> recalculated the reviews.");
define ("_LOG_CATCOUNTS", "<a href='viewuser.php?uid=%2\$d'>%1\$s</a> recalculated the category counts.");
define ("_LOG_OPTIMIZE", "<a href='viewuser.php?uid=%2\$d'>%1\$s</a> optimized the database tables.");
define ("_LOG_BACKUP", "<a href='viewuser.php?uid=%2\$d'>%1\$s</a> backed up the database tables.");

define("EFICTION_EDITOR_217", "System default"); 
define("EFICTION_EDITOR_220", "Post editor");
define("EFICTION_EDITOR_221", "Which editor should be used to create/edit posts?");

define("EFICTION_ADMIN_001", "Administrácia"); 