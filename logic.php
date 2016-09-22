<?php
#---- CONSTANTS ----------------------------------------------
# Define some basic constants
define("WORD_COUNT_MIN", 1);
define("WORD_COUNT_MAX", 9);

# These define the names to be used for the input controls
define("WORD_COUNT", "wordCount");
define("INCLUDE_NUMBER", "includeNumber");
define("INCLUDE_SYMBOL", "includeSymbol");

#---- FUNCTIONS ----------------------------------------------
# Function to validate the user input from the form data.
function validateUserInput() {
    global $output;
    global $outputClass;

    # Validate that data was actually summitted and an empty form was not sent
    # and validate that the word count falls within the proper boundaries
    if ((count($_GET) == 0) ||
        (!isset($_GET[WORD_COUNT])) ||
        ($_GET[WORD_COUNT] < WORD_COUNT_MIN) ||
        ($_GET[WORD_COUNT] > WORD_COUNT_MAX)) {
            # Set the error.  These could be broken apart into individual checks if we wanted unique errors
        $output = "The field Number of Words must be filled in with a number between ".WORD_COUNT_MIN." and ".WORD_COUNT_MAX;
        $outputClass = "error";
        return FALSE;
    }
    $outputClass = "password";
    return TRUE;
}

# ----------------------------------------------
# Populate wordList, symbols, and parameters
function initialize() {
    global $wordList;
    global $symbolList;
    global $output;

    # Read the word list from an external file into an array
    $wordList = file("nounlist.txt");

    # Read the symbols from an external file into an array
    $symbolList = file("symbols.txt");

    # Reset any previously filled in password or errpr (just in case)
    $output = "";
    $output = "";
}

# ----------------------------------------------
# Build the password string from the parameters passed in
function buildPasswordString($keys, $includeNumber, $includeSymbol) {
    global $wordList;
    global $symbolList;
    global $output;

    $iteration = 1;
    foreach ($keys as $key) {
        # Get the word at key
        $word = trim($wordList[$key]);

        # Concatinate each randomly selected word to the overall password
        # Using trim to remove spaces
        $output .= trim($word);
        if ($iteration < $_GET[WORD_COUNT]) {
            $output .= "-";
        } #end if
        $iteration++;
    } #end foreach loop

    # If the include numbers checkbox was selected, add a random number to the end
    if ($includeNumber) {
        $output .= rand(0,9);
    } #end if

    # If the include symbols checkbox was selected, add a symbol to the end
    if ($includeSymbol) {
        $output .= $symbolList[array_rand($symbolList, 1)];
    } #end if

    return $output;
}

# ----------------------------------------------
function submitButtonHandler() {
    global $wordList;
    global $symbolList;
    global $output;

    # Validate the user data
    if (validateUserInput() == FALSE) {
        # Exit early
        return;
    } #end if

    # Now that the user input is validated, initialize the global variables
    initialize();

    # Although the array was already shuffled when read in, use array_rand to get random entries
    $keys = array_rand($wordList, $_GET[WORD_COUNT]);

    # Convert the "Include Number" checkbox value ("on", "off") to a boolean
    $includeNumber = isset($_GET[INCLUDE_NUMBER]) && $_GET[INCLUDE_NUMBER] == "on";

    # Convert the "Include Symbol" checkbox value ("on", "off") to a boolean
    $includeSymbol = isset($_GET[INCLUDE_SYMBOL]) && $_GET[INCLUDE_SYMBOL] == "on";

    # Build the password
    buildPasswordString($keys, $includeNumber, $includeSymbol);
}

#---- MAIN CODE ----------------------------------------------
if ( isset($_GET) && count($_GET)>0 ) {
    submitButtonHandler();
} #end if
