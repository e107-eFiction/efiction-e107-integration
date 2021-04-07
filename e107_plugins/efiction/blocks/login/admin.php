<?php
 
$blocks = eFiction::blocks();
 
// Set $loggedin to 0 to see the block
include("blocks/login/login.php");
// Then set it back to 1. 
e107::includeLan(e_PLUGIN.'efiction/blocks/login/'.e_LANGUAGE.'.php');

	 
		if(empty($blocks['login']['template'])) $template = "";
		else $template = $blocks['login']['template'];


$output .= "
<div class='panel panel-primary'>
	<div class='panel-heading text-center bg-primary'>".LAN_EFICTION_CURRENT.':</div>
	<div class="panel-body tblborder text-left">'.$content.'</div>
</div>';


		$output .= _LOGINNOTE."<div id='settingsform'> 
			<div><label for=\"template\">"._TEMPLATE.":</label><span style='clear: left;'>&nbsp;</span></div>
			<div class=\"shorttextarea\"><textarea name=\"template\" rows=\"5\" style=\"width: 100%;\" cols=\"40\">".stripslashes($template)."</textarea>";
		if($tinyMCE) 
			$output .= "<div class='tinytoggle'><input type='checkbox' name='toggle' onclick=\"toogleEditorMode('template');\" checked><label for='toggle'>"._TINYMCETOGGLE."</label></div>";
		$output .= "</div>
			<label for=\"form\">"._DEFAULTOPTS.":</label> <select name=\"form\" id=\"form\" class=\"textbox\" ><option value=\"0\"".(empty($blocks['login']['form']) ? " selected" : "").">"._SHORT."</option>
					<option value=\"1\"".(!empty($blocks['login']['form']) ? " selected" : "").">"._LONG."</option>
			</select><br />
			<label for=\"acctlink\">"._ACCTLINK."</label> <select name=\"acctlink\" id=\"acctlink\" class=\"textbox\" ><option value=\"0\"".(empty($blocks['login']['acctlink']) ? " selected" : "").">"._NO."</option>
					<option value=\"1\"".(!empty($blocks['login']['acctlink']) ? " selected" : "").">"._YES."</option>
			</select><br />
		 </div>";
	 
 