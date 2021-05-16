<?php

if (!defined('e107_INIT')) {
    exit;
}

/*
<!-- START BLOCK : profile -->
<div id="profile">
<div id="bio">
	<div id="biotitle"><span class="label">Penname: </span>{userpenname} <span class="label">Real name: </span>{realname}</div>
	<div id="biocontent">
		<span class="label">Member Since: </span>{membersince}<br />
		<span class="label">Membership status:</span> {userlevel}<br />
		<span class="label">Bio:</span><br>{image}{bio}<br />
		{authorfields} 
	</div>
</div>
{adminoptions} {reportthis}
</div>
<!-- END BLOCK : profile -->
*/

$MEMBER_TEMPLATE['profile']['caption'] = '

';
$MEMBER_TEMPLATE['profile']['content'] = '
<div id="profile">
<div id="bio">
	<div id="biotitle"><span class="label">{LAN=_PENNAME}: </span>{MEMBER_USERPENNAME} <span class="label">{LAN=_REALNAME}: </span>{MEMBER_REALNAME}</div>
	<div id="biocontent">
		<span class="label">{LAN=LAN_EFICTION_MEMBER_SINCE}: </span>{MEMBER_MEMBERSINCE}<br />
		<span class="label">{LAN=LAN_EFICTION_MEMBERSHIP_STATUS}:</span> {MEMBER_USERLEVEL}<br />
		<span class="label">{LAN=_BIO}:</span><br>{MEMBER_IMAGE}{MEMBER_BIO}<br />
		{MEMBER_AUTHORFIELDS} 
	</div>
</div>
{MEMBER_ADMINOPTIONS} {MEMBER_REPORTTHIS}
</div>
';
