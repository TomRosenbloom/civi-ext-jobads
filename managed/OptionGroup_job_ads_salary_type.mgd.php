<?php

use CRM_Jobads_ExtensionUtil as E;

return [
    [
      'name' => 'OptionGroup_job_ads_salary_type',
      'entity' => 'OptionGroup',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'name' => 'job_ads_salary_type',
          'title' => E::ts('job ads salary type'),
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
      'name' => 'OptionGroup_job_ads_salary_type_OptionValue_Fixed_salary',
      'entity' => 'OptionValue',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'option_group_id.name' => 'job_ads_salary_type',
          'label' => E::ts('Fixed salary'),
          'value' => '1',
          'name' => 'Fixed salary',
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
      'name' => 'OptionGroup_job_ads_salary_type_OptionValue_Salary_scale',
      'entity' => 'OptionValue',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'option_group_id.name' => 'job_ads_salary_type',
          'label' => E::ts('Salary scale'),
          'value' => '2',
          'name' => 'Salary scale',
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