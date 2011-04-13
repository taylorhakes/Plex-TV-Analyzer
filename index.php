<!DOCTYPE html>
<html>
<head>
<title>Missing Television Episodes</title>
<script type="text/javascript" src="js/jquery-1.4.2.js"></script>
<script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
<script type="text/javascript" src="js/jquery.treeTable.min.js"></script>
<link rel="stylesheet" href="css/tv.css" type="text/css" />
<script type="text/javascript">

 function SubmitForm() {
 	var show_id = $('#showSelector').val();
 	var show = $('#showSelector :selected').text();
 	$("#resultpart").html('<tr><td /><td><img src="img/ajax-loader.gif" alt="loading..." /></td><td /></tr>'); 
 	$.post('results.php', { show_id: show_id,
 							show: show},
   function(data){
     $('#resultpart').html(data);
   });
 	return false;
 }
 
</script>
</head>
<body>
<?php 
include_once('tvclass.php');
echo'<div id="filepath">
					<div style="float:left;padding-right:10px;padding-bottom:12px;">Select a Show: </div>
					<div  style="float:left;"><select id="showSelector">';
		foreach(TVAnalyzer::GetUserShows() as $key => $value)
		{
			echo '<option value="'.$value.'">'.$key.'</option>';
		}
					
		echo			'</select></div>
					<div  style="float:left;"><input value="Submit" type="button" name="getshows" id="getshows" onClick="SubmitForm(); return false;" /></div>
			
			';
?>
<table cellspacing="0" id="tvtable"> 
    <thead>
        <tr> 
            <th>Name</th> 
            <th>Episode Name</th>
            <th>Available</th> 
        </tr> 
    </thead> 
    <tbody id="resultpart"> 
    
    </tbody> 
</table>
</body>
</html>