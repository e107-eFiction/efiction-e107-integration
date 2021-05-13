<?php

if (!defined('e107_INIT')) {
    exit;
}

/*
<!-- START BLOCK : listings -->
{seriesheader}
<!-- START BLOCK : seriesblock -->
<div class="listbox {oddeven}">
<div class="title">{title} by {author}{score} [{reviews} - {numreviews}]</div>
<div class="content"><span class="label">Summary: </span>{summary}<br />
<span class="label">Parent Series:</span> {parentseries}<br />
<span class="label">Categories:</span> {category}<br />
 <span class="label">Characters: </span>{characters}<br />
{classifications}
<span class="label">Stories:</span> {numstories}<br />
<span class="label">Open:</span> {open} {addtofaves} {reportthis}
{adminoptions}</div>
</div>
{comment}
<!-- END BLOCK : seriesblock -->

/*
<div class="listbox {SERIE_VIEW_ODDEVEN}">
<div class="title"><span class="h3">{SERIE_VIEW_TITLE}</span> by {SERIE_VIEW_AUTHOR}{SERIE_VIEW_SCORE} [{SERIE_VIEW_REVIEWS}  - {SERIE_VIEW_NUMREVIEWS}]</div>
<div class="content"><span class="label">Summary: </span>{SERIE_VIEW_SUMMARY: limit=400}<br />
<span class="label">Parent Series:</span> {SERIE_VIEW_PARENTSERIES}<br />
<span class="label">Categories:</span> {SERIE_VIEW_CATEGORY}<br />
 <span class="label">Characters: </span>{SERIE_VIEW_CHARACTERS}<br />
{SERIE_VIEW_CLASSIFICATIONS}
<span class="label">Stories:</span> {SERIE_VIEW_NUMSTORIES}<br />
<span class="label">Open:</span>{SERIE_VIEW_OPEN} {SERIE_VIEW_ADDTOFAVES} {SERIE_VIEW_REPORTTHIS}
{SERIE_VIEW_ADMINOPTIONS}</div>
</div>
{SERIE_VIEW_COMMENT}

*/

$SERIES_TEMPLATE['listing']['caption'] = '{SERIES_HEADER}';
$SERIES_TEMPLATE['listing']['start'] = '<div class="row mb-4 mr-3">';
$SERIES_TEMPLATE['listing']['item'] =
'{SETIMAGE: w=700&h=250&crop=1}
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
					<p> {SERIE_VIEW_SUMMARY: limit=200}</p>
					<a href="{SERIE_URL}" class="btn btn-indigo btn-sm waves-effect waves-light">{LAN=LAN_MORE}</a>
				</div>
			</div>
		</div>
	</div>
<!-- News card -->
</div>
';
$SERIES_TEMPLATE['listing']['end'] = '</div>';
