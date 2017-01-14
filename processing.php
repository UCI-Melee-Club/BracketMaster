<?php
	$tagListString = $_POST['tagList'];
	$tagList = explode(" ", $tagListString);
	//Get trueskill of each person and attach to person in array
	for($tagList as $i_tag){
		$rankList[] = trueSkillRanking($i_tag);
	}
	//Combine arrays.
	$seedingList = array_combine($rankList, $tagList);

	//Sort by ranking
	ksort($seedingList);

	//Send sorted list to challonge

	//Get challonge link back

	//Output seeded bracket and challonge link
?>