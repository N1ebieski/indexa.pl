<?php

return [
    'gus' => [
        'delay' => (int)env('GUS_CHECK_DELAY_MINUTES', 1),
        'limit' => (int)env('GUS_CHECK_LIMIT', 60),
        'check_days' => (int)env('GUS_CHECK_DAYS', 365)
    ]
];
