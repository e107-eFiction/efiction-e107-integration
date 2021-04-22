<?php
if (!defined('e107_INIT')) {
    exit;
}

global $numupdated;

$block_key = 'random';

$blocks = efiction::get_block($block_key);
 
/* ?? */
if (empty($blocks[$block_key]['tpl'])) {
    include _BASEDIR.'blocks/'.$blocks[$block_key]['file'];
}

if(isset($_POST['submit'])) {
    if (!empty($_POST['block_variables'])) {
            
            $blocks[$block_key]['block_variables'] = $_POST['block_variables'];
    }
 
    save_blocks( $blocks );
	$output .= "<div style='text-align: center;'>"._ACTIONSUCCESSFUL."</div>";
}
 else {
        $output .= "<div style='text-align: left;'><b>"._CURRENT.':</b><br /> 
        <form method="POST" enctype="multipart/form-data" action="admin.php?action=blocks&amp;admin='.$block_key.'">';
        $output .= '<table class="tblborder table table-bordered">';

        $curVal = $blocks[$block_key]['block_variables'];
 
        $frm = e107::getForm();
        $optionpath = e_PLUGIN.'efiction/blocks/'.$block_key.'/admin_options.php';
        if ((file_exists($optionpath))) {
            require_once $optionpath;
            $settings = $options;
        }

        if ($settings['fields'] > 0) {
            $nameitem = 'block_variables';
            foreach ($settings['fields'] as $fieldkey => $field) {
                $text .= '<tr><td >'.$field['title'].': </td><td>';
                $text .= $frm->renderElement($nameitem.'['.$fieldkey.']', $curVal[$fieldkey], $field);
                $text .= '</td></tr>';
            }
        } else {
        }
        $output .= $text ;
        $output .= "</table>
        <div class='text-center'><input type=\"submit\" name=\"submit\" class=\"button btn btn-submit btn-default btn-secondary\" id=\"submit\" value=\""._SUBMIT.'"></div></form></div> ';
    }
    
 