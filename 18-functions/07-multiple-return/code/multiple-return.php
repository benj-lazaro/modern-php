<?php

// Instruct the browser to render the content as plain text
header('Content-Type: text/plain');

function fetch_news($id)
{
    if ($id >= 100) {
        return false;
    }

    return [
        'id' => $id,
        'title' => 'Linux vs Windows 11',
        'content' => 'The Linux wins over Windows as the preferred OS for the desktop PCs...'
    ];
}

$article = fetch_news(147);

if (!empty($article)):
    echo $article['title'] . "\n";
    echo $article['content'] . "\n";
else:
    echo "The selected article could not be found.\n";
endif;
