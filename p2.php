<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CSCI E-15 Project 2</title>
</head>

<body>
    <header>
        <h1>Michael's <img src="img/terrible_small_logo.png" alt="XKCD Logo" width="100px"> Password Generator</h1>
    </header>

    <main>
        <form action="action_page.php">
            <fieldset>
                <legend>Password Generator Options:</legend>
                <span><label>Number of Words:<input type="number" id="wordCount" min="1" max="9" value="4"/></label></span>
                <span><label><input type="checkbox" id="includeNumbers" /></label>Include a Number</span>
                <span><label><input type="checkbox" id="includeSymbols" /></label>Include Symbols</span>
                <input type="submit" value="Submit">
          </fieldset>
        </form>

        <div id="password">
            <p>Password Here 1 2 3 4 5</p>
        </div>
        <img src="img/XKCD_Cartoon.png" alt="XKCD Password Strenth Cartoon" width="50%">
    </main>

</body>
</html>
