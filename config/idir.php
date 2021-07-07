<?php

return [

    'version' => \N1ebieski\IDir\Providers\IDirServiceProvider::VERSION,

    'license_key' => env('IDIR_LICENSE_KEY'),

    'layout' => env('IDIR_LAYOUT', 'idir'),

    'dir' => [
        'max_tags' => (int)env('IDIR_DIR_MAX_TAGS', 10),
        'max_title' => (int)env('IDIR_DIR_MAX_TITLE', 100),
        'min_content' => (int)env('IDIR_DIR_MIN_CONTENT', 255),
        'max_content' => (int)env('IDIR_DIR_MAX_CONTENT', 1000),
        'short_content' => (int)env('IDIR_DIR_SHORT_CONTENT', 500),

        'title_normalizer' => null,

        'backlink' => [
            'check_hours' => (int)env('IDIR_DIR_BACKLINK_CHECK_HOURS', 24),
            'max_attempts' => (int)env('IDIR_DIR_BACKLINK_MAX_ATTEMPTS', 3),
            'delays' => [30, 60, 180, 365]
        ],

        'status' => [
            'check_days' => (int)env('IDIR_DIR_STATUS_CHECK_DAYS', 30),
            'max_attempts' => (int)env('IDIR_DIR_STATUS_MAX_ATTEMPTS', 2),
            'delays' => [30, 60, 180, 365],
            'parked_domains' => [
                'aftermarket.pl'
            ]
        ],

        'reminder' => [
            'left_days' => (int)env('IDIR_DIR_REMINDER_LEFT_DAYS', 7)
        ],

        'reasons' => [
'101 Opis strony niezgodny z Regulaminem. Więcej na: https://alg.pl/e/#101',
'102 Powielona treść opisu. Więcej na: https://alg.pl/e/#102',
'103 Nieprawidłowy adres strony. Więcej na: https://alg.pl/e/#103',
'105 Switryna zgłoszona, jako dokonująca ataków. Więcej na: https://alg.pl/e/#105',
'201 Opis strony niezgodny z regulaminem. Więcej na: https://alg.pl/e/#201',
'202 Powielona treść opisu. Więcej na: https://alg.pl/e/#202',
'203 Nieprawidłowy adres strony. Więcej na: https://alg.pl/e/#203',
'205 Witryna zgłoszona, jako dokonująca ataków. Więcej na: https://alg.pl/e/#205',
'301 Subdomena. Więcej na: https://alg.pl/e/#301',
'302 Strona niezgodna z regulaminem. Więcej na: https://alg.pl/e/#302',
'303 Ta sama strona pod innym adresem. Więcej na: https://alg.pl/e/#303',
'304 Bezpłatny alias internetowy. Więcej na: https://alg.pl/e/#304',
'305 Przekierowanie na inny adres. Więcej na: https://alg.pl/e/#305',
'306 Strona w budowie lub wizytówka. Więcej na: https://alg.pl/e/#306',
'501 Auto-blog. Więcej na: https://alg.pl/e/#501',
'502 Zaplecze. Więcej na: https://alg.pl/e/#502',
'503 Strona SP. Więcej na: https://alg.pl/e/#503',
'504 MFA (Made for AdSense). Więcej na: https://alg.pl/e/#504',
'601 Usunięto na życzenie właściciela. Więcej na: https://alg.pl/e/#601',
'602 Próba dodania istniejącej strony. Więcej na: https://alg.pl/e/#602',
'603 Spam. Więcej na: https://alg.pl/e/#603'

        ],

        'thumbnail' => [
            'url' => env('IDIR_DIR_THUMBNAIL_URL'),
            'reload_url' => env('IDIR_DIR_THUMBNAIL_RELOAD_URL'),
            'key' => env('IDIR_DIR_THUMBNAIL_KEY'), // 32 characters string
            'cache' => [
                'url' => env('IDIR_DIR_THUMBNAIL_CACHE_URL'),
                'days' => (int)env('IDIR_DIR_THUMBNAIL_CACHE_DAYS', 365)
            ],
            'api' => [
                'reload_url' => env('IDIR_DIR_THUMBNAIL_API_RELOAD_URL')
            ]
        ],

        'notification' => [
            'dirs' => (int)env('IDIR_DIR_NOTIFICATION_DIRS'),
            'hours' => (int)env('IDIR_DIR_NOTIFICATION_HOURS')
        ]

    ],

    'field' => [
        'gus' => [
            'name' => null,
            'street' => null,
            'propertyNumber' => null,
            'apartmentNumber' => null,
            'zipCode' => null,
            'city' => null,
            'regions' => null,
            'district' => null,
            'community' => null,
            'nip' => null,
            'regon' => null,
            'map' => null
        ]
    ],

    'home' => [
        'max' => (int)env('IDIR_HOME_MAX', 10),
        'max_privileged' => (int)env('IDIR_HOME_MAX_PRIVILEGED', 5)
    ],

    'payment' => [
        'transfer' => [
            'driver' => 'cashbill'
        ],

        'code_sms' => [
            'driver' => 'cashbill'
        ],

        'code_transfer' => [
            'driver' => 'cashbill'
        ],

        'cashbill' => [
            'name' => 'CashBill',
            'url' => 'https://www.cashbill.pl',
            'rules_url' => 'https://www.cashbill.pl/download/regulaminy/Regulamin_Platnosci.pdf',
            'docs_url' => 'https://www.cashbill.pl/pobierz/dokumenty/'
        ]
    ]
];
