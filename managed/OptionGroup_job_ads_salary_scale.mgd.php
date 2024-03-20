<?php

use CRM_Jobads_ExtensionUtil as E;

return [
    [
      'name' => 'OptionGroup_job_ads_salary_scale',
      'entity' => 'OptionGroup',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'name' => 'job_ads_salary_scale',
          'title' => E::ts('job ads salary scale'),
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
      'name' => 'OptionGroup_job_ads_salary_scale_OptionValue_Up_to_20k',
      'entity' => 'OptionValue',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'option_group_id.name' => 'job_ads_salary_scale',
          'label' => E::ts('Up to 20k'),
          'value' => '1',
          'name' => 'Up to 20k',
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
      'name' => 'OptionGroup_job_ads_salary_scale_OptionValue_20_30k',
      'entity' => 'OptionValue',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'option_group_id.name' => 'job_ads_salary_scale',
          'label' => E::ts('20-30k'),
          'value' => '2',
          'name' => '20-30k',
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
      'name' => 'OptionGroup_job_ads_salary_scale_OptionValue_30_40k',
      'entity' => 'OptionValue',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'option_group_id.name' => 'job_ads_salary_scale',
          'label' => E::ts('30-40k'),
          'value' => '3',
          'name' => '30-40k',
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
      'name' => 'OptionGroup_job_ads_salary_scale_OptionValue_40_50k',
      'entity' => 'OptionValue',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'option_group_id.name' => 'job_ads_salary_scale',
          'label' => E::ts('40-50k'),
          'value' => '4',
          'name' => '40-50k',
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
      'name' => 'OptionGroup_job_ads_salary_scale_OptionValue_50k_',
      'entity' => 'OptionValue',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'option_group_id.name' => 'job_ads_salary_scale',
          'label' => E::ts('50k+'),
          'value' => '5',
          'name' => '50k+',
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