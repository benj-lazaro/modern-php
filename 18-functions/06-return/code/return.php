<?php

// Instruct the browser to render the content as plain text
header('Content-Type: text/plain');

function add_five($number)
{
    // Returns the sum & immediately terminates the function
    return $number + 5;
}

// Pass an argument value & invoke the function
$result = add_five(5) + 2;
echo "{$result}\n";

$sum = add_five(add_five(5));
echo "{$sum}\n";

function fetch_news($id)
{
    return [
        'id' => $id,
        'title' => 'Linux vs Windows 11',
        'content' => 'The Linux wins over Windows as the preferred OS for the desktop PCs...'
    ];
}

$newsArticle = fetch_news(47);
echo "Headline: {$newsArticle['title']}\n";
echo fetch_news(47)['content'] . "\n";
