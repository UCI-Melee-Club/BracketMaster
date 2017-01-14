<?php
	//include('challonge.class.php');
	//date_default_timezone_set('America/Los_Angeles');

	$html = file_get_contents('http://ocsmash.weebly.com/the-ladder-current.html');
	$dom = new DOMDocument;
	$dom->loadHTML($html);

	$items = $dom->getElementsByTagName('center');
	$players =array();

	for ($i = 6; $i < $items->length; $i = 4 + $i){
		$name = trim(strtolower((string)$items->item($i)->nodeValue));
		$players[$name] = $items->item($i + 1)->nodeValue;
	}

	$challongeName = $_POST['challongeName'];
	$tagListString = strtolower($_POST['tagList']);
	$tagList = explode(" ", $tagListString);

	//Get trueskill of each person and attach to person in array
	$completedList = array();
	foreach($tagList as $i_tag){
		if(array_key_exists($i_tag, $players)){
			$completedList[$i_tag] = $players[$i_tag];
		}
		else{
			$completedList[$i_tag] = 0;
		}
	}
	
	//Sort by ranking
	arsort($completedList);

	
	/*
	//Send sorted list to challonge
	$c = new ChallongeAPI(DpYyhqBBN7gJX0LFMx8kgggYh51IZkDUnnP8nJ2p);

	$tourneyNum = $tournamentName[strlen($challongeName)-1] . $tournamentName[strlen($challongeName)-2];

	$date = date('m/d/Y h:i:s a', time());

	$params = array(
  		"tournament[name]" => $challongeName,//fix this line lol
  		"tournament[tournament_type]" => "double elimination",
  		"tournament[url]" => "ZsmashBi" . $tourneyNum,
  		"tournament[description]" => "Challonge api is pretty dope, also Alex and Bill are GOATS",
  		"tournament[start_at]"  =>  $date
  	);
	$tournament = $c->makeCall("tournaments", $params, "post");
	$tournament = $c->createTournament($params);
	*/

?>