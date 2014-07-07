<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <?php require 'logic.php'; ?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Password Generator</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="content">
        <div class="password <?php echo $password_box ?>">
            <?php echo funcPassword(); ?>
        </div>
        
        <form action="index.php" method="post">
            <input name="num_words" type="hidden" value="4" />
            <input name="use_delim" type="hidden" value=" " />
            <input name="use_caps" type="hidden" value="" />
        
            <input name="use_num" type="hidden" value="" />
            <input name="use_sym" type="hidden" value="" />
            <input name="use_alphanum" type="hidden" value="" />
            <p>
                 <label class="menu" for="num_words">Number of words:</label>
               <select name="num_words" id="num_words">
                    <?php echo funcMenu("num_words"); ?>
                </select>
            </p>
            <p>
                <label class="menu" for="use_delim">Choose delimiter:</label>
                <select name="use_delim" id="use_delim">
                    <?php echo funcMenu("use_delim"); ?>
                </select>
            </p>
            <p id="capitalize">
                <label class="menu" for="use_caps">Capitalize letters:</label>
                <select name="use_caps" id="use_caps">
                    <?php echo funcMenu("use_caps"); ?>
                </select>
            </p>
            <p>
                <label class="checkbox">
                    <?php echo funcCheck("use_num") ?> Use a number
              </label>
                <br />
                <label class="checkbox">
                    <?php echo funcCheck("use_sym") ?> Use a special symbol
              </label>
                <br />
                <label class="checkbox">
                    <?php echo funcCheck("use_alphanum") ?> Substitute numbers for letters
              </label>
                <br />
            </p>
        <p>
            <input class="checkbox" name="Generate Password" type="submit" value="Generate Password" />
            </p>
        </form>
     </div>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    
    <script src="script.js"></script>


</body>
</html>