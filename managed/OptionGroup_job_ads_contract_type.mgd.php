<?php

use CRM_Jobads_ExtensionUtil as E;


return [
    [
      'name' => 'OptionGroup_job_ads_contract_type',
      'entity' => 'OptionGroup',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'name' => 'job_ads_contract_type',
          'title' => E::ts('Job ads: contract type'),
          'data_type' => 'String',
          'is_reserved' => FALSE,
          'option_value_fields' => [
            'name',
            'label',
            'description',
          ],
        ],
        'match' => [
          'name',
        ],
      ],
    ],
    [
      'name' => 'OptionGroup_job_ads_contract_type_OptionValue_Permanent',
      'entity' => 'OptionValue',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'option_group_id.name' => 'job_ads_contract_type',
          'label' => E::ts('Permanent'),
          'value' => '1',
          'name' => 'Permanent',
        ],
        'match' => [
          'option_group_id',
          'name',
          'value',
        ],
      ],
    ],
    [
      'name' => 'OptionGroup_job_ads_contract_type_OptionValue_Temporary_Contract',
      'entity' => 'OptionValue',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'option_group_id.name' => 'job_ads_contract_type',
          'label' => E::ts('Temporary/Contract'),
          'value' => '2',
          'name' => 'Temporary/Contract',
        ],
        'match' => [
          'option_group_id',
          'name',
          'value',
        ],
      ],
    ],
    [
      'name' => 'OptionGroup_job_ads_contract_type_OptionValue_Sessional_Hourly',
      'entity' => 'OptionValue',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'option_group_id.name' => 'job_ads_contract_type',
          'label' => E::ts('Sessional/Hourly'),
          'value' => '3',
          'name' => 'Sessional/Hourly',
        ],
        'match' => [
          'option_group_id',
          'name',
          'value',
        ],
      ],
    ],
    [
      'name' => 'OptionGroup_job_ads_contract_type_OptionValue_Other',
      'entity' => 'OptionValue',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'option_group_id.name' => 'job_ads_contract_type',
          'label' => E::ts('Other'),
          'value' => '4',
          'name' => 'Other',
        ],
        'match' => [
          'option_group_id',
          'name',
          'value',
        ],
      ],
    ],
  ];