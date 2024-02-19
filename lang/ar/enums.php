<?php


return [
    'user_type' => [
        \App\Enums\UserType::Admin->value   => 'آدمن',
        \App\Enums\UserType::Coach->value   => 'مدرب',
        \App\Enums\UserType::Trainee->value => 'متدرب'
    ],

    'gender' => [
        \App\Enums\Gender::Male->value   => 'ذكر',
        \App\Enums\Gender::Female->value => 'أنثى',
    ],

    'sport_status' => [
        \App\Enums\SportStatus::Available->value              => 'متاح',
        \App\Enums\SportStatus::TemporarilyUnavailable->value => 'غير متاح مؤقتا',
        \App\Enums\SportStatus::Discontinued->value           => 'متوقفة',
        \App\Enums\SportStatus::ComingSoon->value             => 'قريبا',
    ],

    'subscription_status' => [
        \App\Enums\SubscriptionStatus::Active->value  => 'نشط',
        \App\Enums\SubscriptionStatus::Expired->value => 'منتهي',
    ]
];
