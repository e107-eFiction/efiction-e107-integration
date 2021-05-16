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
 
<!-- START BLOCK : storyblock -->

<div class="card-group preview mb-4">

  <div class="card ">
    <img src="{storyimage}" alt="{storytitle}" class="card-img-top">
    <div class="card-header"><h3 class="card-header-title"> {title} {lan_by} {author}</h3>
    <small class="text-muted">Rated:</span> {rating} {roundrobin} {score} [{reviews} - {numreviews}] {new} </small></div>
    <div class="card-body">
        {lan_summary}{featuredstory}{summary}
    </div>   
     <div class="card-footer">
        {adminlinks}  
    </div>
    
  </div>
  <div class="card">
    <div class="card-body">
       <ul class="list-group list-group-flush text-left">
            <li class="list-group-item">{lan_category} {category} <br>
             {lan_characters} {characters}<br>
             <span class="label">Series:</span> {serieslinks}<br>
             {lan_complete} {completed}<br>
             {lan_wordcount} {wordcount}<br>
             <span class="label">Read Count:</span> {count}<br>
             <li class="list-group-item">{classifications}</li>
        </ul>
    </div>
    <div class="card-footer">
        <span class="label">{addtofaves} {reportthis} Published: </span>{published} <span class="label">Updated:</span> {updated} 
    </div>
  </div>
    
  </div>
  
 
    
  
    {comment}   
 
<!-- END BLOCK : storyblock -->
 
{pagelinks}
<!-- END BLOCK : listings -->