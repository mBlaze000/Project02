<?php

	//========================================================================================
	// These CONSTANTS and VARIABLES are used to scrape words. 
	//========================================================================================
	define("HTML_URL", "http://www.paulnoll.com/Books/Clear-English/words-15-16-hundred.html");
	define("HTML_PAGE", file_get_contents(HTML_URL));
	define("WORD_COUNT", substr_count ( HTML_PAGE , "</li>"));
	$word_start = strpos(HTML_PAGE, "<li>")+4;
	$word_end = strpos(HTML_PAGE, "</li>");
	$word_length = $word_end - $word_start;
	
	//========================================================================================
	// These VARIABLES are used in the function that generates passwords 
	//========================================================================================
	$num_words = 4;
	$use_delim = " ";
	$use_caps = "";
	$use_num = "";
	$use_sym = "";
	$use_alphanum = "";
	
	if (!empty($_POST)){
		$num_words = $_POST["num_words"];
		$use_delim = $_POST["use_delim"];
		$use_caps = $_POST["use_caps"];
		$use_num = $_POST["use_num"];
		$use_sym = $_POST["use_sym"];
		$use_alphanum = $_POST["use_alphanum"];
	}
	
	$password_box = "pass".$num_words;

	//========================================================================================
	// This FOR loop builds an ARRAY that holds all words for the password. 
	//========================================================================================
	for ($i = 0; $i < WORD_COUNT; $i++) {
		$build_words = trim(substr ( HTML_PAGE , $word_start, $word_length ));
		If (strlen($build_words) > 1) {
			$array_words[] = strtolower ($build_words);
			$word_start = strpos(HTML_PAGE, "<li>", $word_start + $word_length)+4;
			$word_end = strpos(HTML_PAGE, "</li>", $word_start);
			$word_length = $word_end - $word_start;
		} else {
			break;
		}
	}

	//========================================================================================
	// This FUNCTION generates the password based on user input. 
	//========================================================================================
	function funcPassword() {
		global $num_words, $use_delim, $use_caps, $use_num, $use_sym, $use_alphanum;
		global $array_words;
		$array_symbols = array("!", "@", "#","$", "%", "&");
		$array_alphanum = array("a"=>"4", "e"=>"3", "l"=>"1", "o"=>"0", "s"=>"5");
		$gen_password = "";
		$last_count = count($array_words)-1;
		for($i=1;$i<=$num_words;$i++) {
			$current_word = $array_words[rand(0,$last_count)];
			if ($use_delim == "camel") {
				$current_word = ucfirst($current_word);
			} else if ($i != $num_words) {
				$current_word .= $use_delim;
			}
			$gen_password .= $current_word;
		}
		if ($use_caps == "initial") {
			$gen_password = ucfirst($gen_password);
		} else if ($use_caps == "all") {
			$gen_password = strtoupper($gen_password);
		} else if ($use_caps == "word") {
			if ($use_delim == " "){
				$gen_password = ucwords($gen_password);
			} else if ($use_delim != "camel") {
				$gen_password = str_replace(" ", $use_delim , ucwords(str_replace($use_delim , " " , $gen_password)));
			}
		}
		if ($use_num=="use_num") {
			if ($use_delim != "camel") {
				$gen_password .= $use_delim;
			}
			$gen_password .= rand(0,9);
		}
		if ($use_sym=="use_sym") {
			$gen_password .= $array_symbols[rand(0,5)];
		}
		if ($use_alphanum=="use_alphanum") {
			foreach ($array_alphanum as $letter => $number){
				$gen_password = str_replace($letter , $number , $gen_password);
				$gen_password = str_replace(strtoupper($letter) , $number , $gen_password);
			}
		}
		return $gen_password;
	}
	
	//========================================================================================
	// This FUNCTION generates the HTML for the drop menus in the form. 
	//========================================================================================
	function funcMenu($current_list) {
		if (!empty($_POST)){
			$selected_item = $_POST[$current_list];
		} else {
			$selected_item = "x";
		}
		$array_lists = array (
			"num_words"  => array(1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9),
			"use_delim" => array(" " => "Use space", "-" => "Use-dash", "_" => "Use_underscore", "camel" => "UseCamelCase"),
			"use_caps"   => array("" => "all lowercase", "all" => "ALL UPPERCASE", "word" => "Initial Caps", "initial" => "Initialize first word only")
		);
		$array_current = $array_lists[$current_list];
		$list ="";
		$i = 0;
		foreach ($array_current as $value => $label){
			if($i>0){
				$tab = "\t\t\t";
			}else{
				$tab = "";
			}
			if ($value==$selected_item){
				$selected = " selected=\"selected\"";
			} else{
				$selected = "";
			}
			$list .= $tab."<option value=\"".$value."\"".$selected.">".$label."</option>\n";
			$i += 1;
		}
		return $list;
	}
	
	//========================================================================================
	// This FUNCTION generates the HTML for the check boxes in the form. 
	//========================================================================================
	function funcCheck($current_box) {
		if (!empty($_POST)){
			$check_value = $_POST[$current_box];
		} else {
			$check_value = "";
		}
		if ($check_value==$current_box){
			$checked = " checked=\"checked\"";
		} else {
			$checked = "";
		}
		$checkbox = "<input type=\"checkbox\" name=\"".$current_box."\" value=\"".$current_box."\"".$checked."/>";
		return $checkbox;
	}

?>
