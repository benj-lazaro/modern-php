<?php

// You will be provided with the $campaigns nested array
$campaigns = [
    'Spring Sale' => [
        'AdSet1' => [
            'name' => 'Discounted Gadgets',
            'clicks' => 150,
            'impressions' => 10000
        ],
        'AdSet2' => [
            'name' => 'Outdoor Equipment',
            'clicks' => 250,
            'impressions' => 15000
        ],
    ],
    'Holiday Deals' => [
        'AdSet1' => [
            'name' => 'Winter Apparel',
            'clicks' => 200,
            'impressions' => 12000
        ],
        'AdSet2' => [
            'name' => 'Electronics Special',
            'clicks' => 300,
            'impressions' => 18000
        ],
    ],
];

// Write your code here
$totalCampaignClicks = [];
$totalCampaignImpressions = [];
$adSetCount = 0;

if (!empty($campaigns)):
    // Calculate total clicks & impressions for each campaign
    foreach ($campaigns as $campaign => $adSet):
        $totalClicks = 0;
        $totalImpressions = 0;

        foreach ($adSet as $adName):
            if (!empty($adName['clicks'])):
                $totalClicks += $adName['clicks'];
            else:
                $totalClicks += 0;
            endif;

            if (!empty($adName['impressions'])):
                $totalImpressions += $adName['impressions'];
            else:
                $totalImpressions += 0;
            endif;

            $adSetCount += 1;
        endforeach;

        $totalCampaignClicks[$campaign] = $totalClicks;
        $totalCampaignImpressions[$campaign] = $totalImpressions;

    endforeach;

    // Generate report on average clicks & impressions per ad set accross all campaigns
    $totalNumClicks = 0;
    $totalNumImpressions = 0;

    foreach ($totalCampaignClicks as $click):
        $totalNumClicks += $click;
    endforeach;

    foreach ($totalCampaignImpressions as $impression):
        $totalNumImpressions += $impression;
    endforeach;

    $averageClicks = round($totalNumClicks / $adSetCount, 0);
    $averageImpressions = round($totalNumImpressions / $adSetCount, 0);

    $outputString = "Average clicks per ad set: $averageClicks, Average impressions per ad set: $averageImpressions.";
else:
    $outputString = "Average clicks per ad set: 0, Average impressions per ad set: 0.";
endif;

echo $outputString;
