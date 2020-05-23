<?php
return [
    'resources' => [
        'products' => [
            'allowedSorts' => [
                'name',
                'created_at',
                'updated_at',
            ],
            'allowedIncludes' => [
            ],
            'allowedFilters' => [],
            'validationRules'=> [
                'create' => [
                    'data.attributes.name' => 'required|string',
                ],
                'update' => [
                    'data.attributes.name' => 'sometimes|required|string',
                ]
            ],
            'relationships' => [
            ]
        ],

    ]
];
