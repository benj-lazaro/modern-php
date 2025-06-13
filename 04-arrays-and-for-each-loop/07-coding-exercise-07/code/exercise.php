<?php

// Keep in mind that the $playlist array is typically initialized before you start working with them
// However, for testing purposes, there might be instances where $playlist is not declared
// Ensure your script is robust enough to handle such scenarios 

// Write your code here
$playlist = ['Starry Night', 'Moonlit Walk', 'Whispering Wind', 'Golden Horizon'];

if (isset($playlist) && !empty($playlist)):
    if (in_array('Sunny Days', $playlist)):
        echo "You have great taste! 'Sunny Days' always lifts the mood!";
    else:
        if (count($playlist) >= 2):
            $playlist[1] = 'Solar Whispers';
        endif;
    endif;
else:
    echo "Your playlist needs an update. Time to discover more music!";
endif;
