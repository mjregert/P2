<?php
require('logic.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css">
    <title>CSCI E-15 Project 2</title>

    <?php
        $var = "Hello";
     ?>

</head>

<body>
    <header>
        <h1>Michael's <img src="img/terrible_small_logo.png" alt="XKCD Logo" width="100px"> Password Generator</h1>
    </header>

    <main>
        <form method='GET' action='p2.php'>
            <fieldset>
                <legend>Password Generator Options:</legend>
                <span>
                    <label>Number of Words:</label>
                    <input type="number"
                           name="<?php echo WORD_COUNT ?>"
                           min="<?php echo WORD_COUNT_MIN ?>"
                           max="<?php echo WORD_COUNT_MAX ?>"
                           value="4"
                    />
                </span>
                <br>
                <span>
                    <!-- Note, label intentionally placed after checkbox per standard UXD guidelines -->
                    <input type="checkbox"
                           name="<?php echo INCLUDE_NUMBER ?>"
                    />
                    <label>Include a Number</label>
                </span>
                <br>
                <span>
                    <!-- Note, label intentionally placed after checkbox per standard UXD guidelines -->
                    <input type="checkbox"
                           name="<?php echo INCLUDE_SYMBOL ?>"
                    />
                    <label>Include a Symbol</label>
                </span>
                <br>
                <br>
                <span>
                    <label><em>Click submit to generate a random password with the parameters above.</em></label>
                <input type="submit" value="Submit">
          </fieldset>
        </form>

        <div id="output" class="<?php echo $outputClass ?>">
            <p><?php echo $output ?></p>
        </div>
        <img src="img/XKCD_Cartoon.png" alt="XKCD Password Strenth Cartoon">
    </main>

</body>
</html>
