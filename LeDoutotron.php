<?php

$xml = file_get_contents('https://www.lemonde.fr/rss/une.xml');

$parser = xml_parser_create();
xml_parse_into_struct($parser, $xml, $vals, $index);
xml_parser_free($parser);

$first = true;
$totalCount = 0;
$fullText = "";

foreach($vals as $val)
{
	if (!isset($val["tag"])) continue;
	if ($val["tag"] !== "TITLE") continue;

	if ($first === true)
	{
		$first = false;
		continue;
	}


	$text = $val["value"];
	$text = str_replace("\xc2\xa0", " ", $text);
	$text = str_replace("« ", "", $text);
	$text = str_replace(" »", "", $text);
	$words = explode(" ", $text);

	$indices = [];
	for ($i = 0; $i < count($words); $i++)
	{
		if (strlen($words[$i]) < 4) continue;
		if (ctype_upper(mb_substr($words[$i], 0, 1))) continue;
		if (str_contains($words[$i], ":")) continue;
		if (str_contains($words[$i], ";")) continue;
		if (str_contains($words[$i], "\"")) continue;
		if (str_contains($words[$i], "«")) continue;
		if (str_contains($words[$i], "»")) continue;
		if (str_contains($words[$i], "’")) continue;
		if (str_contains($words[$i], "'")) continue;
		if (str_contains($words[$i], ",")) continue;

		array_push($indices, $i);
	}
	
	if (count($indices) === 0) continue;

	$seed = strlen($val["value"]);

	mt_srand($seed);
	$count = mt_rand(1, 3);
	for ($i = 0; $i < $count; $i++)
	{
		if (count($indices) === 0) break;
		
		$index = array_splice($indices, mt_rand(0, count($indices) - 1), 1)[0];
		$words[$index] = "«\xc2\xa0".$words[$index]."\xc2\xa0»";
		// $words[$index] = "\"".$words[$index]."\"";
	}

	$text = implode(" ", $words);
	$fullText .= "<li>".$text."</li>";
	$totalCount++;
	if ($totalCount >= 5) break;
}

echo $fullText;

?>
