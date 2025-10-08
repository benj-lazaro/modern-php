<?php

// You will be provided with a string variable $htmlContent
$htmlContent = '<div class="main-section">
    <p>Explore the wonders of our <i>unique</i> platform. Below are key links for navigation:</p>
    <a href="http://example.com/services">Our Services</a>
    <a href="http://example.com/contact" title="Get in touch">Get in Touch</a>
    <img src="welcome.png">
    <img src="our-mission.jpg" alt="Our Mission">
    </div>';


// Write your code here
header("Content-Type: text/plain");

preg_match_all('/<a href="([^"]+)"/', $htmlContent, $matches);
var_dump($matches);

$links = $matches[1];
var_dump($links);

$emphasizedHtmlContent = str_replace('i>', 'em>', $htmlContent);
var_dump($emphasizedHtmlContent);

preg_match_all('/<img[^>]+>/', $htmlContent, $imgTags);
var_dump($imgTags[0]);

foreach ($imgTags[0] as $imgTag):
    if (!preg_match('/alt=("[^"]*")/', $imgTag)):
        $newImgTag = preg_replace('/>$/', ' alt="placeholder image">', $imgTag);
        $htmlContent = str_replace($imgTag, $newImgTag, $htmlContent);
    endif;
endforeach;

$accessibleHtmlContent = $htmlContent;
var_dump($accessibleHtmlContent);
