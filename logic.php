<?php
#---- CONSTANTS ----------------------------------------------
# Define some basic constants
define("WORD_COUNT_MIN", 1);
define("WORD_COUNT_MAX", 9);
define("WORD_COUNT", "wordCount");
define("INCLUDE_NUMBERS", "includeNumbers");
define("INCLUDE_SYMBOLS", "includeSymbols");

#---- GLOBAL VARS
$words = "";
$wordCount = 0;
$includeNumbers = FALSE;
$includeSymbols = FALSE;
$symbols = array("!","\"","#","$");

#---- FUNCTIONS ----------------------------------------------
# Function to validate the user input from the form data.
function validateUserInput() {
    # Validate that data was actually summitted and an empty form was not sent
    if (count($_GET) == 0) {
        // Nothing filled in
        // Figure out how to return an error properly
        echo "Empty Form";
        return FALSE;
    }
    # Validate word count falls within the proper boundaries
    if ($_GET[WORD_COUNT] < WORD_COUNT_MIN ||
        $_GET[WORD_COUNT] > WORD_COUNT_MAX) {
            echo "Outside Range";
            return FALSE;
    }
    return TRUE;
}

# ----------------------------------------------
# Populate word array from text file
function initialize(&$words, &$wordCount, &$includeNumbers, &$includeSymbols) {
    # TODO ADD CHECK IF FILE EXISTS
    $words = file("nounlist.txt");
    shuffle($words);

    if (isset($_GET[WORD_COUNT])) {
        $wordCount = $_GET[WORD_COUNT];
    }

    if (isset($_GET[INCLUDE_NUMBERS]) && $_GET[INCLUDE_NUMBERS] == "on") {
        $includeNumbers = TRUE;
    }

    if (isset($_GET[INCLUDE_SYMBOLS]) && $_GET[INCLUDE_SYMBOLS] == "on") {
        $includeSymbols = TRUE;
    }
}

# ----------------------------------------------
# Build the password string from the parameters passed in
function buildPasswordString($words, $keys, $symbols, $includeNumbers, $includeSymbols) {
    $password = "";

    foreach ($keys as $key) {
        # Get the word at key
        $word = trim($words[$key]);
        echo "word = ".$word."<br>";

        # Concatinate each randomly selected word to the overall password
        # Using trim to remove spaces
        $password.=trim($word);

        # If the include numbers checkbox was selected, add a random number to the end
        if ($includeNumbers) {
            $password.=rand(0,9);
        }

        # If the include symbols checkbox was selected, add a symbol to the end
        if ($includeSymbols) {
            $password.=$symbols[rand(0,3)];
        }


        $password .= "-";
    } #end for loop

    return $password;
}


#---- MAIN CODE ----------------------------------------------
# Validate the user data
$valid = validateUserInput();
if ($valid == FALSE) {
    echo "THIS FORM IS TOTALLY INVALID";
    # Exit early
    return;
}

# Now that the user input is validated, initialize the global variables
initialize($words, $wordCount, $includeNumbers, $includeSymbols);

# Although the array was already shuffled when read in, use array_rand to get random entries
$keys = array_rand($words, $wordCount);

# Build the password
$password = buildPasswordString($words, $keys, $symbols, $includeNumbers, $includeSymbols);
echo "Password is now = ".$password;
