<?php
	include('challonge.class.php');
	date_default_timezone_set('America/Los_Angeles');

	$html = file_get_contents('http://ocsmash.weebly.com/the-ladder-current.html');
	$dom = new DOMDocument;
	$dom->loadHTML($html);

	$items = $dom->getElementsByTagName('center');
	$players =array();

	for ($i = 6; $i < $items->length; $i = 4 + $i){
		$name = trim(strtolower((string)$items->item($i)->nodeValue));
		$players[$name] = floatval(trim($items->item($i + 1)->nodeValue));
	}

	$tagListString = strtolower($_POST['tagList']);
	$tagList = explode(",", $tagListString);

	//Get trueskill of each person and attach to person in array
	$completedList = array();
	foreach($tagList as $i_tag){
		$i_tag = trim($i_tag);
		if(array_key_exists($i_tag, $players)){
			$completedList[$i_tag] = $players[$i_tag];
		}
		else{
			$completedList[$i_tag] = -1;
		}
	}
	
	//Sort by ranking
	arsort($completedList);
	
	//t5Y2koyIeFsxF5HamF5lkkFaWJL5MdP32bqeWgPh
	//DpYyhqBBN7gJX0LFMx8kgggYh51IZkDUnnP8nJ2p

	//Send sorted list to challonge
	$c = new ChallongeAPI('DpYyhqBBN7gJX0LFMx8kgggYh51IZkDUnnP8nJ2p');

	$challongeName = trim($_POST['challongeName']);
	$challongeURL = trim($_POST['challongeURL']);

	$params = array(
  		"tournament[name]" => $challongeName,
  		"tournament[tournament_type]" => "double elimination",
  		"tournament[url]" => $challongeURL,
  		"tournament[description]" => "Challonge api is pretty dope, also Alex and Bill are GOATS"
  	);
	$tournament = $c->makeCall("tournaments", $params, "post");
	$tournament = $c->createTournament($params);

	$i = 1;
	while($smasher = current($completedList)){
		$participantParams = array(
			"participant[name]" => key($completedList),
			"participant[seed]" => $i
			);
		$i++;
		next($completedList);
		$t = $c->makeCall("tournaments/" . $challongeURL . "/participants", $participantParams, "post");
		$t = $c->createParticipant($challongeURL, $participantParams);
	}

	echo "<p>Visit the created bracket at: <a href='https://www.challonge.com/$challongeURL'>$challongeURL.</a></p>";
?>