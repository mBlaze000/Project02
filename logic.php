<?php

	define("HTML_URL", "http://www.paulnoll.com/Books/Clear-English/words-15-16-hundred.html");
	define("HTML_PAGE", file_get_contents(HTML_URL));
	define("WORD_COUNT", substr_count ( HTML_PAGE , "</li>"));
	$word_start = strpos(HTML_PAGE, "<li>")+4;
	$word_end = strpos(HTML_PAGE, "</li>");
	
	$list_close = strrpos(HTML_PAGE, "</li>");
	
	$word_length = $word_end - $word_start;
	$word_list = "";
	
	for ($i = 0; $i < WORD_COUNT; $i++) {
		$build_words = trim(substr ( HTML_PAGE , $word_start, $word_length ));
		If (strlen($build_words) > 1) {
			$array_words[] = $build_words;
			$word_start = strpos(HTML_PAGE, "<li>", $word_start + $word_length)+4;
			$word_end = strpos(HTML_PAGE, "</li>", $word_start);
			$word_length = $word_end - $word_start;
		} else {
			break;
		}
	}

	
	
	/*
	html_entity_decode ( string $string [, int $flags = ENT_COMPAT | ENT_HTML401 [, string $encoding = "UTF-8" ]] )
	preg_match_all("|<[^>]+>(.*)</[^>]+>|U", HTML_PAGE,
    $out, PREG_PATTERN_ORDER);
	
	$htmlpage = file_get_contents(HTML_URL);
	$pagepath = $_SERVER['SCRIPT_NAME'];
	$arraypath = explode("/",$pagepath);
	$arraycount = count($arraypath);
	$numlocation = 0;
	$strlink = ""; 
	
	for($a=0;$a<$arraycount;$a++) {
		if ($pagedirectory==$arraypath[$a]) {
			$numlocation = $a+1;
			$a = $arraycount;
		}
	}
	
	function funcCreateLink($countupto,$thearray) {
		global $strlink;
		$strlink = "";
		for($n=1;$n<$countupto;$n++) {
			$strlink = $strlink."/".$thearray[$n];
		}
		return $strlink;
	}

	$pageroot = funcCreateLink($numlocation,$arraypath); 
	
	*/

?>
