<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <?php require 'logic.php'; ?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Password Generator</title>
</head>

<body>

<?php
#echo $word_list;
/*
echo "<pre>";
#print_r($array_words);
print_r($_POST);
echo "</pre>";
*/
#echo print_r($out);
echo funcPassword();
?>

<form action="index.php" method="post">
    <input name="num_words" type="hidden" value="4" />
    <input name="use_delim" type="hidden" value=" " />
    <input name="use_caps" type="hidden" value="" />

    <input name="use_num" type="hidden" value="" />
    <input name="use_sym" type="hidden" value="" />
    <input name="use_alphanum" type="hidden" value="" />
    <p>
        <select name="num_words">
        	<?php echo funcMenu("num_words"); ?>
        </select>
    </p>
    <p>
        <select name="use_delim">
        	<?php echo funcMenu("use_delim"); ?>
        </select>
    </p>
    <p>
        <select name="use_caps">
        	<?php echo funcMenu("use_caps"); ?>
        </select>
    </p>
    <p>
        <label>
            <?php echo funcCheck("use_num") ?> Use a number
      </label>
        <br />
        <label>
            <?php echo funcCheck("use_sym") ?> Use a special symbol
      </label>
        <br />
        <label>
            <?php echo funcCheck("use_alphanum") ?> Substitute numbers for letters
      </label>
        <br />
    </p>
<p>
    <input name="Submit" type="submit" />
    </p>
</form>

</body>
</html>