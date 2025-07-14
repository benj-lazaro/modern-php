<?php

// The $campaigns array will be provided to you
$campaigns = [
    'Spring Refresh' => [
        'AdSet1' => [
            'name' => 'Home Decor'
        ]
    ],
    'Summer Blast' => [
        'AdSet1' => [
            'name' => 'Pool Accessories'
        ],
        'AdSet2' => [
            'name' => 'BBQ Essentials'
        ]
    ],
    'Fall Favorites' => [
        'AdSet1' => [
            'name' => 'Leaf Blowers'
        ],
        'AdSet2' => [
            'name' => 'Halloween Costumes'
        ],
        'AdSet3' => [
            'name' => 'Pumpkin Spice Everything'
        ]
    ],
    'Winter Wonders' => [
        'AdSet1' => [
            'name' => 'Heated Blankets'
        ]
    ],
    'Tech Trends' => [
        'AdSet1' => [
            'name' => 'Eco-friendly Gadgets'
        ],
        'AdSet2' => [
            'name' => 'Smart Home Devices'
        ]
    ]
];

// Write our code here
if (!empty($campaigns)):
    foreach ($campaigns as $campaignName => $adSets):

        foreach ($adSets as $adSet):
            $adSetNames[] = '"' . $adSet['name'] . '"';
        endforeach;

        $formattedAdSetNames = implode(", ", $adSetNames);

        $outputString = "- $campaignName: $formattedAdSetNames\n";
        echo $outputString;

        $adSetNames = [];

    endforeach;
endif;
