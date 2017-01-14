<?php
	include('challonge.class.php');
	date_default_timezone_set('America/Los_Angeles');


	$html = file_get_contents('http://ocsmash.weebly.com/the-ladder-current.html');
	$dom = new DOMDocument;
	$dom->loadHTML($html);

	$items = $dom->getElementsByTagName('center');
	$players =array();

	for ($i = 6; $i < $items->length; $i = 4 + $i){
		$name = (string)$items->item($i)->nodeValue;
		$players[$name] = $items->item($i + 1)->nodeValue;
	}

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
	$c = new ChallongeAPI(DpYyhqBBN7gJX0LFMx8kgggYh51IZkDUnnP8nJ2p);

	$tournamentName = trim($_POST['tournamentName']); ///change this line for the post
	$tourneyNum = $tournamentName[strlen(tournamentName)-1] . $tournamentName[strlen(tournamentName)-2];

	$date = date('m/d/Y h:i:s a', time());

	$params = array(
  		"tournament[name]" => $tournamentName,//fix this line lol
  		"tournament[tournament_type]" => "double elimination",
  		"tournament[url]" => "ZsmashBi" . $tourneyNum,
  		"tournament[description]" => "Challonge api is pretty dope, also Alex and Bill are GOATS",
  		"tournament[start_at]"  =>  $date
  	);
	$tournament = $c->makeCall("tournaments", $params, "post");
	$tournament = $c->createTournament($params);

	//Get challonge link back

	//Output seeded bracket and challonge link
?>