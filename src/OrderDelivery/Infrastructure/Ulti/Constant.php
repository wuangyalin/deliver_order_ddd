<?php

namespace App\OrderDelivery\Infrastructure\Ulti;

class Constant
{
    public const ORDER_STATUS_INITIAL = 'Issued';
    public const ORDER_STATUS_PROCESSED = 'Processed';
    public const ORDER_STATUS_COFIRMED = 'Confirmed';
    public const CONFIRMATION_STATUS_ISSUED = 'Received';
    public const CONFIRMATION_STATUS_CLOSED = 'Closed';
    public const STATUS_FAILE = 0;
    public const API_TOKEN = [
        'token' => 'justfortestingworkflow',
    ];
    public const EMPTY_ORDERS = [];
    public const VALID_ORDERS = array(
        array(
            'customer' =>
            array(
                'name' => 'Johnny BravoO',
                'address' => '56 Pitt Street, 2000, Sydney',
            ),
            'deliveryType' => 'personalDelivery',
            'source' => 'web',
            'weight' => 1500,
        ),
        array(
            'customer' =>
            array(
                'name' => 'Jack Ripper',
                'address' => '822 Anzac Parade, 2035, Maroubra',
            ),
            'deliveryType' => 'personalDeliveryExpress',
            'source' => 'email',
            'weight' => 2000,
            'campaign' =>
            array(
                'name' => 'Christmas2018',
                'type' => 'holiday',
                'ad' => 'opportunity',
            ),
        ),
        array(
            'customer' =>
            array(
                'name' => 'Elvis Presley',
                'address' => '333 George Street, 2000, Sydney',
            ),
            'deliveryType' => 'enterpriseDelivery',
            'source' => 'direct',
            'onBehalf' => 'True Capital',
            'enterprise' =>
            array(
                'name' => 'Bayview Motel',
                'type' => 'PtyLtd',
                'abn' => 'SN123OK',
                'directors' =>
                array(
                    array(
                        'name' => 'Michael Jackskon',
                        'address' => '242 Bayview, 2434, Sydney',
                    ),
                    array(
                        'name' => 'Freddie Mercury',
                        'address' => '132 Coast, 2354, Newcastle',
                    ),
                ),
            ),
            'weight' => 5000,
        )

    );

    public const SAMPLE_CONFIRMATION = [
        [
            "status" => "Received",
            "info" => "Order has been confirmed",
            "receive_date" => [
                "date" => "2020-09-26 10:30:10.171899",
                "timezone_type" => 3,
                "timezone" => "UTC"
            ],
            "oders_detail" => [
                "customer" => [
                    "name" => "Johnny Bravo",
                    "address" => "56 Pitt Street, 2000, Sydney"
                ],
                "type" => "personalDelivery",
                "source" => "web",
                "weight" => 1500,
                "status" => "Confirmed",
                "create_date" => [
                    "date" => "2020-09-26 10:30:04.000000",
                    "timezone_type" => 3,
                    "timezone" => "UTC"
                ]
            ]
        ],
        [
            "status" => "Received",
            "info" => "Order has been confirmed",
            "receive_date" => [
                "date" => "2020-09-26 10:30:10.174589",
                "timezone_type" => 3,
                "timezone" => "UTC"
            ],
            "oders_detail" => [
                "customer" => [
                    "name" => "Jack Ripper",
                    "address" => "822 Anzac Parade, 2035, Maroubra"
                ],
                "type" => "personalDeliveryExpress",
                "source" => "email",
                "weight" => 2000,
                "status" => "Confirmed",
                "create_date" => [
                    "date" => "2020-09-26 10:30:04.000000",
                    "timezone_type" => 3,
                    "timezone" => "UTC"
                ],
                "campaign" => [
                    "name" => "Christmas2018",
                    "type" => "holiday",
                    "ad" => "opportunity"
                ],
                "is_notified_campaign" => "Yes",
                "is_high_priority" => "Yes"
            ]
        ],
        [
            "status" => "Received",
            "info" => "Order has been confirmed",
            "receive_date" => [
                "date" => "2020-09-26 10:30:10.175598",
                "timezone_type" => 3,
                "timezone" => "UTC"
            ],
            "oders_detail" => [
                "customer" => [
                    "name" => "Elvis Presley",
                    "address" => "333 George Street, 2000, Sydney"
                ],
                "type" => "enterpriseDelivery",
                "source" => "direct",
                "weight" => 5000,
                "status" => "Confirmed",
                "create_date" => [
                    "date" => "2020-09-26 10:30:04.000000",
                    "timezone_type" => 3,
                    "timezone" => "UTC"
                ],
                "is_valid_enterprise" => "Yes",
                "enterprise" => [
                    "name" => "Bayview Motel",
                    "type" => "PtyLtd",
                    "abn" => "SN123OK",
                    "directorys" => [
                        "name" => "Freddie Mercury",
                        "address" => "132 Coast, 2354, Newcastle"
                    ]
                ]
            ]
        ]
    ];
}
