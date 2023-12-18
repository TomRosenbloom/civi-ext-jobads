<?php
use CRM_Jobads_ExtensionUtil as E;

return [
  [
    'name' => 'SavedSearch_Job_ads',
    'entity' => 'SavedSearch',
    'cleanup' => 'always',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Job_ads',
        'label' => E::ts('Job ads'),
        'api_entity' => 'JobAd',
        'api_params' => [
          'version' => 4,
          'select' => [
            'id',
            'JobAd_Contact_contact_id_01.sort_name',
            'job_title',
            'summary',
            'description',
          ],
          'orderBy' => [],
          'where' => [],
          'groupBy' => [],
          'join' => [
            [
              'Contact AS JobAd_Contact_contact_id_01',
              'LEFT',
              [
                'contact_id',
                '=',
                'JobAd_Contact_contact_id_01.id',
              ],
            ],
          ],
          'having' => [],
        ],
      ],
      'match' => [
        'name',
      ],
    ],
  ],
];
