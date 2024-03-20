<?php

use CRM_Jobads_ExtensionUtil as E;

return [
    [
      'name' => 'OptionGroup_job_ads_salary_rate',
      'entity' => 'OptionGroup',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'name' => 'job_ads_salary_rate',
          'title' => E::ts('job ads salary rate'),
          'description' => NULL,
          'data_type' => 'String',
          'is_reserved' => FALSE,
          'is_active' => TRUE,
          'is_locked' => FALSE,
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
      'name' => 'OptionGroup_job_ads_salary_rate_OptionValue_Per_Annum',
      'entity' => 'OptionValue',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'option_group_id.name' => 'job_ads_salary_rate',
          'label' => E::ts('Per Annum'),
          'value' => '1',
          'name' => 'Per Annum',
          'grouping' => NULL,
          'filter' => 0,
          'is_default' => FALSE,
          'description' => NULL,
          'is_optgroup' => FALSE,
          'is_reserved' => FALSE,
          'is_active' => TRUE,
          'component_id' => NULL,
          'domain_id' => NULL,
          'visibility_id' => NULL,
          'icon' => NULL,
          'color' => NULL,
        ],
        'match' => [
          'name',
          'option_group_id',
        ],
      ],
    ],
    [
      'name' => 'OptionGroup_job_ads_salary_rate_OptionValue_Pro_Rata',
      'entity' => 'OptionValue',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'option_group_id.name' => 'job_ads_salary_rate',
          'label' => E::ts('Pro Rata'),
          'value' => '2',
          'name' => 'Pro Rata',
          'grouping' => NULL,
          'filter' => 0,
          'is_default' => FALSE,
          'description' => NULL,
          'is_optgroup' => FALSE,
          'is_reserved' => FALSE,
          'is_active' => TRUE,
          'component_id' => NULL,
          'domain_id' => NULL,
          'visibility_id' => NULL,
          'icon' => NULL,
          'color' => NULL,
        ],
        'match' => [
          'name',
          'option_group_id',
        ],
      ],
    ],
    [
      'name' => 'OptionGroup_job_ads_salary_rate_OptionValue_Per_Hour',
      'entity' => 'OptionValue',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'option_group_id.name' => 'job_ads_salary_rate',
          'label' => E::ts('Per Hour'),
          'value' => '3',
          'name' => 'Per Hour',
          'grouping' => NULL,
          'filter' => 0,
          'is_default' => FALSE,
          'description' => NULL,
          'is_optgroup' => FALSE,
          'is_reserved' => FALSE,
          'is_active' => TRUE,
          'component_id' => NULL,
          'domain_id' => NULL,
          'visibility_id' => NULL,
          'icon' => NULL,
          'color' => NULL,
        ],
        'match' => [
          'name',
          'option_group_id',
        ],
      ],
    ],
    [
      'name' => 'OptionGroup_job_ads_salary_rate_OptionValue_Circa',
      'entity' => 'OptionValue',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'option_group_id.name' => 'job_ads_salary_rate',
          'label' => E::ts('Circa'),
          'value' => '4',
          'name' => 'Circa',
          'grouping' => NULL,
          'filter' => 0,
          'is_default' => FALSE,
          'description' => NULL,
          'is_optgroup' => FALSE,
          'is_reserved' => FALSE,
          'is_active' => TRUE,
          'component_id' => NULL,
          'domain_id' => NULL,
          'visibility_id' => NULL,
          'icon' => NULL,
          'color' => NULL,
        ],
        'match' => [
          'name',
          'option_group_id',
        ],
      ],
    ],
  ];