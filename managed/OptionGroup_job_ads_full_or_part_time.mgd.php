<?php

use CRM_Jobads_ExtensionUtil as E;

return [
    [
      'name' => 'OptionGroup_job_ads_full_or_part_time',
      'entity' => 'OptionGroup',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'name' => 'job_ads_full_or_part_time',
          'title' => E::ts('job ads full or part time'),
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
      'name' => 'OptionGroup_job_ads_full_or_part_time_OptionValue_Full_time',
      'entity' => 'OptionValue',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'option_group_id.name' => 'job_ads_full_or_part_time',
          'label' => E::ts('Full time'),
          'value' => '1',
          'name' => 'Full time',
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
      'name' => 'OptionGroup_job_ads_full_or_part_time_OptionValue_Part_time',
      'entity' => 'OptionValue',
      'cleanup' => 'unused',
      'update' => 'unmodified',
      'params' => [
        'version' => 4,
        'values' => [
          'option_group_id.name' => 'job_ads_full_or_part_time',
          'label' => E::ts('Part time'),
          'value' => '2',
          'name' => 'Part time',
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