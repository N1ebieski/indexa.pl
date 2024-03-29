<?php

use N1ebieski\ICore\Models\Newsletter;

return [
    'subscribe' => 'Najnowsze informacje o promocjach:',
    'email' => [
        'placeholder' => 'Wpisz adres email'
    ],
    'success' => [
        'store' => 'Dziękujemy za subskrypcję. Na podany adres email wysłano wiadomość z linkiem potwierdzającym chęć otrzymywania newslettera.',
        'update_status' => [
            Newsletter::ACTIVE => 'Pomyślnie aktywowano subskrypcję.',
            Newsletter::INACTIVE => 'Pomyślnie dezaktywowano subskrypcję.'
        ],
    ],
    'subscribe_confirmation' => 'Potwierdzenie subskrypcji newslettera',
    'subscribe_confirm' => 'Potwierdź subskrypcję',
    'subcopy' => [
        'subscribe' => 'Otrzymujesz tą wiadodomość ponieważ subskrybujesz newsletter na naszej stronie. Jeżeli nie chcesz dłużej otrzymywać wiadomości, kliknij w link <a href=":cancel">:cancel</a>'
    ],
    'mail' => [
        'subscribe_confirm' => [
            'info' => 'Proszę kliknąć na przycisk poniżej aby potwierdzić subskrypcję newslettera pod tym adresem email.',
            'token' => 'Link do potwierdzenia subskrybcji ważny jest przez 60 minut.',
        ]
    ]
];
