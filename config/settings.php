<?php

return[

    'loading_duration' => env('LOADING_DURATION'),
    'loading_duration2' => env('LOADING_DURATION2'),
    'Traffic_SourceID' => env('Traffic_SourceID'),
    'urlkey' => env('Key_Prefix'),
    'Binom_url' => env('Binom_url'),
    'Binom_apiKey' => env('Binom_apiKey'),

    'domains'=>
    [
        env('APP_DOMAIN_1'),
        env('APP_DOMAIN_2', null),
        env('APP_DOMAIN_3', null),
    ],
    'BotRedirectUrl'=>env('BotRedirectUrl'),
];

?>