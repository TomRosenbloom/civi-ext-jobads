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
  [
    'name' => 'SavedSearch_Job_ads_SearchDisplay_Job_ads_Table_1',
    'entity' => 'SearchDisplay',
    'cleanup' => 'always',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Job_ads_Table_1',
        'label' => E::ts('Job ads Table 1'),
        'saved_search_id.name' => 'Job_ads',
        'type' => 'table',
        'settings' => [
          'description' => NULL,
          'sort' => [],
          'limit' => 50,
          'pager' => [],
          'placeholder' => 5,
          'columns' => [
            [
              'type' => 'field',
              'key' => 'id',
              'dataType' => 'Integer',
              'label' => E::ts('ID'),
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'JobAd_Contact_contact_id_01.sort_name',
              'dataType' => 'String',
              'label' => E::ts('Job Ad Contact: Sort Name'),
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'job_title',
              'dataType' => 'String',
              'label' => E::ts('Job title'),
              'sortable' => TRUE,
            ],
            [
              'type' => 'html',
              'key' => 'summary',
              'dataType' => 'Text',
              'label' => E::ts('Summary'),
              'sortable' => TRUE,
            ],
            [
              'type' => 'html',
              'key' => 'description',
              'dataType' => 'Text',
              'label' => E::ts('Full description'),
              'sortable' => TRUE,
            ],
          ],
          'actions' => TRUE,
          'classes' => [
            'table',
            'table-striped',
          ],
          'toolbar' => [
            [
              'path' => 'civicrm/jobad/add#?contact_id=[contact_id]',
              'icon' => 'fa-external-link',
              'text' => E::ts('Link'),
              'style' => 'default',
              'condition' => [],
              'task' => '',
              'entity' => '',
              'action' => '',
              'join' => '',
              'target' => '',
            ],
          ],          
        ],
      ],
      'match' => [
        'saved_search_id',
        'name',
      ],
    ],
  ],
];
