<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        <!--div id="left"-->
            <form method='GET' action='logic.php'>
                <fieldset>
                    <legend>Password Generator Options:</legend>
                    <!--span><label>Number of Words:<input type="number" id="wordCount" min="1" max="9" value="4"/></label></span-->
                    <span>
                        <label>Number of Words:</label>
                        <input name="wordCount" type="range" id="wordCount" min="1" max="9" value="5"/>
                    </span>
                    <span>
                        <!-- Note, label intentionally placed after checkbox per standard UXD guidelines -->
                        <input name="includeNumbers" type="checkbox" id="includeNumbers" />
                        <label>Include a Number</label>
                    </span>
                    <span>
                        <!-- Note, label intentionally placed after checkbox per standard UXD guidelines -->
                        <input name="includeSymbols" type="checkbox" id="includeSymbols" />
                        <label>Include Symbols</label>
                    </span>
                    <input type="submit" value="Submit">
              </fieldset>
            </form>

            <div id="password">
                <p>Password Here 1 2 3 4 5</p>
            </div>
        <!--/div>
        <div id="right"-->
            <img src="img/XKCD_Cartoon.png" alt="XKCD Password Strenth Cartoon" width="100%">
        <!--/div-->
    </main>

</body>
</html>
