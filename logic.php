<?php
#---- CONSTANTS -----------------------------
# Define some basic constants
define("WORD_COUNT_MIN", 1);
define("WORD_COUNT_MAX", 9);
define("WORD_COUNT", "wordCount");

#---- FUNCTIONS -----------------------------
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

#---- MAIN CODE -----------------------------
# First, validate the user data
$valid = validateUserInput();
if ($valid == TRUE) {
    echo "THIS FORM IS VALID";
} else {
    echo "THIS FORM IS TOTALLY INVALID";
}
