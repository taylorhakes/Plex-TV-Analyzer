<?php 	
include_once('tvclass.php');
if(!empty($_POST['show_id'])) {
	$show_id = intval($_POST['show_id']);
	$show_name = $_POST['show'];
	$shows = TVAnalyzer::AnalyzeShow($show_name,$show_id);
	if(!is_array($shows)) {
	echo $shows;
	exit();
	}
 	foreach($shows as $show)
 	{
 		echo '<tr>
 				<td colspan="3" class="show">'.$show->ShowName.'</td>
 				</tr>';
 		if(is_array($show->Episodes)) {
 			$season = $show->Episodes[0]->SeasonNumber;
 			echo '<tr>
 				<td colspan="3" class="season">Season '.$season.'</td>
 				</tr>';
 		}
 		foreach($show->Episodes as $epi) {
 			if($epi->SeasonNumber != $season) {
 				$season = $epi->SeasonNumber;
 				echo '<tr>
 				<td colspan="3" class="season">Season '.$season.'</td>
 				</tr>';
 			}
 			echo '<tr'; 
 			if($epi->Missing) echo ' style="background-color:#600000;"';
 			echo '>
 				<td class="episode">Episode '.$epi->EpisodeNumber.'</td>
 				<td>'.$epi->EpisodeName.'</td>
 				<td>';
 				echo $epi->Missing ? 'Missing!' : 'Yes';
 				echo '</td>
 				</tr>';
 		}
    }
}

        	
        	
?>