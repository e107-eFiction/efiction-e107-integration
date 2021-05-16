<?php

if (!defined('e107_INIT')) {
    exit;
}

/* Original 
<!-- START BLOCK : reviewsblock -->
<div class="listbox">
<div class="content{oddeven}">
<span class="label">Reviewer: </span>{reviewer} <span class="label">{member}</span> {rating} {reportthis}<br />
<span class="label">Date: </span>{reviewdate}
<span class="label">Title: </span>{chapter}
<p>{review}</p>
{adminoptions}
</div>
</div>
<!-- END BLOCK : reviewsblock -->
*/
/*
{REVIEW_ODDEVEN}
{REVIEW_REVIEWER}
{REVIEW_MEMBER}
{REVIEW_RATING}
{REVIEW_REPORTTHIS}
{REVIEW_REVIEWDATE}
{REVIEW_CHAPTER}
{REVIEW_C}
{REVIEW_ADMINOPTIONS}
*/
/* example of custom template 
 
$REVIEWBLOCK_TEMPLATE['review']['item'] = 
'
{REVIEW_LISTING}
<div class="listbox">
<div class="content {REVIEW_ODDEVEN}">
<span class="label">Reviewer: </span>{REVIEW_REVIEWER} <span class="label">{REVIEW_MEMBER}</span> {REVIEW_RATING} {REVIEW_REPORTTHIS}<br />
<span class="label">Date: </span>{REVIEW_REVIEWDATE}
<span class="label">Title: </span>{REVIEW_CHAPTER}
<p>{REVIEW_REVIEW}</p>
{REVIEW_ADMINOPTIONS}
</div>
</div>';
 */

 
$REVIEWBLOCK_TEMPLATE['review']['firstitem'] = 
'{REVIEW_LISTING}
<div class="card">
	<div class="card-body {REVIEW_ODDEVEN}">
		<h5 class="card-title">{LAN=_TITLE}{REVIEW_CHAPTER}</h5>
		<span class="label">Reviewer: </span>{REVIEW_REVIEWER} <span class="label">{REVIEW_MEMBER}</span> {REVIEW_RATING} {REVIEW_REPORTTHIS}<br />
		<span class="label">Date: </span>{REVIEW_REVIEWDATE}
		<p class="card-text">{REVIEW_REVIEW}</p>
		{REVIEW_ADMINOPTIONS}
	</div>
</div>';
 
$REVIEWBLOCK_TEMPLATE['review']['item'] = 
'
<div class="card">
	<div class="card-body {REVIEW_ODDEVEN}">
		<h5 class="card-title">{LAN=_TITLE}{REVIEW_CHAPTER}</h5>
		<span class="label">Reviewer: </span>{REVIEW_REVIEWER} <span class="label">{REVIEW_MEMBER}</span> {REVIEW_RATING} {REVIEW_REPORTTHIS}<br />
		<span class="label">Date: </span>{REVIEW_REVIEWDATE}
		<p class="card-text">{REVIEW_REVIEW}</p>
		{REVIEW_ADMINOPTIONS}
	</div>
</div>';

$REVIEWBLOCK_TEMPLATE['serieblock']['item'] = 
'<div class="listbox {SERIE_ODDEVEN}">
{SERIE_IMAGE}
<div class="title">{SERIE_PAGETITLE} by {SERIE_AUTHOR}{SERIE_SCORE} [{SERIE_REVIEWS} - {SERIE_NUMREVIEWS}]</div>
<div class="content"><span class="label">{LAN=_SUMMARY}: </span>{SERIE_SUMMARY: limit=100}<br />
<span class="label">{LAN=LAN_EFICTION_PARENTSERIES}:</span> {SERIE_PARENTSERIES}<br />
<span class="label">Categories:</span> {SERIE_CATEGORY}<br />
 
<span class="label">{LAN=_SERIESTYPE}:</span> {SERIE_OPEN} {SERIE_ADDTOFAVES} {reportthis}
{SERIE_ADMINOPTIONS}</div>
</div>';

$REVIEWBLOCK_TEMPLATE['serieblock']['item'] = 
'{SETIMAGE: w=700&h=250&crop=1}
<div class="row mb-4 mr-3">
<div class="col-md-12 mb-4">
	<div class="card  mb-3 text-center hoverable">
		<div class="card-body">
			<div class="row">
				<div class="col-md-5 mx-3 my-3">
					<!-- Featured image -->
					<div class="view overlay rgba-white-slight">
						{SERIE_IMAGE}
						<a>
						<div class="mask waves-effect waves-light"></div>
						</a>
					</div>
				</div>
				<div class="col-md-6 text-left ml-xl-3 ml-lg-0 ml-md-3 mt-3">
					<h4 class="mb-4">
						<strong>{SERIE_TITLE}</strong>
					</h4>
					<p> {SERIE_SUMMARY: limit=200}</p>
					<a href="{SERIE_LINK}" class="btn btn-indigo btn-sm waves-effect waves-light">{LAN=LAN_MORE}</a>
				</div>
			</div>
		</div>
	</div>
<!-- News card -->
</div>
</div>
';
$SERIES_TEMPLATE['listing']['end'] = '';