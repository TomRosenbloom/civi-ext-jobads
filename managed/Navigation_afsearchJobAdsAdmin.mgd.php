<?php
use CRM_Jobads_ExtensionUtil as E;

return [
  [
    'name' => 'Navigation_afsearchJobAdsAdmin',
    'entity' => 'Navigation',
    'cleanup' => 'unused',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'label' => E::ts('Job ads'),
        'name' => 'afsearchJobAdsAdmin',
        'url' => 'civicrm/jobads',
        'icon' => 'crm-i fa-list-alt',
        'permission' => [
          'access CiviCRM',
        ],
        'permission_operator' => 'AND',
        'parent_id' => NULL,
        'is_active' => TRUE,
        'has_separator' => 0,        
        'weight' => 999,
      ],
      'match' => [
        'name',
        'domain_id',
      ],
    ],
  ],
];


