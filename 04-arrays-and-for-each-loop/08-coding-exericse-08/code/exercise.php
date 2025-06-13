<?php

// You will have access to both arrays $playlist and $songRecommendations

// Write your code here
$playlist = ['Starry Night', 'Moonlit Walk', 'Whispering Wind', 'Golden Horizon'];
$songRecommendations = ['Ocean Waves', 'City Nights', 'Rising Sun', 'Dancing Shadows', 'Eclipse'];

// Highlight latest addition to the playlist
if (!empty($playlist)):
    echo "Your lastly added song was: '{$playlist[count($playlist) - 1]}'.";
endif;

// Keep playlist fresh
if (count($playlist) <= 3):
    $totalTracks = count($songRecommendations);
    $randomSong = $songRecommendations[rand(0, $totalTracks - 1)];
    $playlist[] = $randomSong;
endif;

// Remove a song
if (count($playlist) > 10):
    unset($playlist[0]);
endif;
