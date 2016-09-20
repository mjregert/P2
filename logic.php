<?php
#---- CONSTANTS -----------------------------
# Define some basic constants
define("WORD_COUNT_MIN", 1);
define("WORD_COUNT_MAX", 9);
define("WORD_COUNT", "wordCount");
define("INCLUDE_NUMBERS", "includeNumbers");
define("INCLUDE_SYMBOLS", "includeSymbols");

#---- FUNCTIONS -----------------------------
# Populate word array from text file
function initialize() {
    # TODO ADD CHECK IF FILE EXISTS
    $words = file("nounlist.txt");
    shuffle($words);
    return $words;
}

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
    # Note:  Nothing to validate for checkboxes
    return TRUE;
}

function buildPasswordString($words, $keys, $includeNumbers, $includeSymbols) {
    $pass = "";
    foreach ($keys as $key) {
        $pass .= $words[$key];
    }
    echo "Password is now = ".$pass;
}


#---- MAIN CODE -----------------------------
# Initialize the word list
$words = initialize();

# Validate the user data
$valid = validateUserInput();
if ($valid == FALSE) {
    echo "THIS FORM IS TOTALLY INVALID";
    # Exit early
    return;
}

# Although the array was already shuffled when read in, use array_rand to get random entries
$keys = array_rand($words, $_GET[WORD_COUNT]);
echo "password key list length = ";
echo count($keys);
var_dump($keys);
echo "<br><br>";

buildPasswordString($words, $keys, $_GET[INCLUDE_NUMBERS], $_GET[INCLUDE_SYMBOLS]);
