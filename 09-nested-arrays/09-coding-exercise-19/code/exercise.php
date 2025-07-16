<?php

// You will be provided with the $campaigns array and the $specifiedAudience string
$campaigns = [
    'Ultimate Gaming Gear' => [
        'AdSet1' => [
            'name' => 'Console Launch',
            'targetAudience' => ['Gamers', 'Tech Enthusiasts'],
            'clicks' => 185,
            'impressions' => 9200
        ],
        'AdSet2' => [
            'name' => 'Accessory Sale',
            'targetAudience' => ['Gamers', 'Collectors'],
            'clicks' => 270,
            'impressions' => 13400
        ]
    ],
    'Epic Fantasy Games' => [
        'AdSet1' => [
            'name' => 'MMORPG Release',
            'targetAudience' => ['Gamers', 'Fantasy Fans'],
            'clicks' => 305,
            'impressions' => 15050
        ],
        'AdSet2' => [
            'name' => 'Strategy Game Pre-Order',
            'targetAudience' => ['Strategy Fans', 'Gamers'],
            'clicks' => 220,
            'impressions' => 11200
        ]
    ],
    'Mobile Gaming Mania' => [
        'AdSet1' => [
            'name' => 'Puzzle Game Launch',
            'targetAudience' => ['Casual Players', 'Gamers'],
            'clicks' => 165,
            'impressions' => 8300
        ]
    ]
];

$specifiedAudience = 'Gamers';

// Write your code here
$CTR = 0;
$highCTR = 0;
$audience = [];
$uniqueTargetAudiences = [];
$highestCTR = [];
$currentAdSetCTR = 0;
$adWithHighestCTRForAudience = [];

if (!empty($campaigns)):
    foreach ($campaigns as $campaignName => $adSets):
        $totalClicks = 0;
        $totalImpressions = 0;

        foreach ($adSets as $adSet):
            if (!empty($adSet['clicks'])):
                $totalClicks += $adSet['clicks'];
            else:
                $totalClicks = 0;
                $adSetClicks = 0;
            endif;

            if (!empty($adSet['impressions'])):
                $totalImpressions += $adSet['impressions'];
            else:
                $totalImpressions = 1;
                $adSetImpressions = 1;
            endif;

            // Gather target audience for each ad set
            foreach ($adSet['targetAudience'] as $targetAudience):
                $audience[] = $targetAudience;

                $adSetClicks = 0;
                $adSetImpressions = 0;

                // Identify the highest performing ad for a specific target audience
                if ($targetAudience === $specifiedAudience):
                    $adSetName = $adSet['name'];
                    $adSetClicks = $adSet['clicks'];
                    $adSetImpressions = $adSet['impressions'];
                    $adSetCTR = round(($adSetClicks / $adSetImpressions) * 100, 2);

                    if ($adSetCTR > $currentAdSetCTR):
                        $currentAdSetCTR = $adSetCTR;
                        $adWithHighestCTRForAudience = [];
                        $adWithHighestCTRForAudience['targetAudience'] = $targetAudience;
                        $adWithHighestCTRForAudience['highestCTRAdSet'] = $adSetName;
                        $adWithHighestCTRForAudience['highestCTR'] = $adSetCTR;
                    endif;

                endif;

            endforeach;

        endforeach;

        // Find the campaign with the higest CTR for all ad sets within a campaign
        $CTR = round(($totalClicks / $totalImpressions) * 100, 2);

        if ($CTR > $highCTR):
            $highestCTR = [];
            $highestCTR[$campaignName] = $CTR;
        endif;

    endforeach;

    // Compile a unique list of target audiences
    $uniqueTargetAudiences = array_unique($audience);

    var_dump($adWithHighestCTRForAudience);

else:
    $adWithHighestCTRForAudience = [
        "targetAudience" => "",
        "highestCTRAdSet" => "",
        "highestCTR" => 0
    ];
endif;
