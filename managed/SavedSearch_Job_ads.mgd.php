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
            'contact_id.display_name',
            'job_title',
            'description',
            'application_deadline',
            'role_description:label',
            'contract_type:label',
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
    'name' => 'SavedSearch_Job_ads_SearchDisplay_Job_ads_for_admin',
    'entity' => 'SearchDisplay',
    'cleanup' => 'always',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Job_ads_for_admin',
        'label' => E::ts('Job ads for admin'),
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
              'key' => 'contact_id.display_name',
              'dataType' => 'String',
              'label' => E::ts('Organisation'),
              'sortable' => TRUE,
              'link' => [
                'path' => '',
                'entity' => 'Contact',
                'action' => 'view',
                'join' => 'contact_id',
                'target' => '_blank',
              ],
              'title' => E::ts('View Contact'),
            ],
            [
              'type' => 'field',
              'key' => 'job_title',
              'dataType' => 'String',
              'label' => E::ts('Job title'),
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'application_deadline',
              'dataType' => 'Timestamp',
              'label' => E::ts('Application deadline'),
              'sortable' => TRUE,
            ],
            [
              'type' => 'html',
              'key' => 'description',
              'dataType' => 'Text',
              'label' => E::ts('Job description'),
              'sortable' => TRUE,
              'rewrite' => "{'[description]'|truncate:20}",
            ],
            [
              'type' => 'field',
              'key' => 'role_description:label',
              'dataType' => 'Integer',
              'label' => E::ts('Role description'),
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'contract_type:label',
              'dataType' => 'Integer',
              'label' => E::ts('Contract type'),
              'sortable' => TRUE,
            ],
            [
              'links' => [
                [
                  'entity' => 'JobAd',
                  'action' => 'update',
                  'join' => '',
                  'target' => 'crm-popup',
                  'icon' => 'fa-pencil',
                  'text' => E::ts('Update'),
                  'style' => 'default',
                  'path' => '',
                  'task' => '',
                  'condition' => [],
                ],
                [
                  'entity' => 'JobAd',
                  'action' => 'delete',
                  'join' => '',
                  'target' => 'crm-popup',
                  'icon' => 'fa-trash',
                  'text' => E::ts('Delete'),
                  'style' => 'danger',
                  'path' => '',
                  'task' => '',
                  'condition' => [],
                ],
              ],
              'type' => 'links',
              'alignment' => 'text-right',
            ],
          ],
          'actions' => TRUE,
          'classes' => [
            'table',
            'table-striped',
          ],
          'toolbar' => [
            [
              'path' => 'civicrm/jobad/add',
              'icon' => 'fa-external-link',
              'text' => E::ts('Add job ad'),
              'style' => 'success',
              'condition' => [],
              'task' => '',
              'entity' => '',
              'action' => '',
              'join' => '',
              'target' => 'crm-popup',
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
  [
    'name' => 'SavedSearch_Job_ads_SearchDisplay_Job_ads_for_contact_tab',
    'entity' => 'SearchDisplay',
    'cleanup' => 'always',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Job_ads_for_contact_tab',
        'label' => E::ts('Job ads for contact tab'),
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
              'key' => 'job_title',
              'dataType' => 'String',
              'label' => E::ts('Job title'),
              'sortable' => TRUE,
            ],
            [
              'type' => 'html',
              'key' => 'description',
              'dataType' => 'Text',
              'label' => E::ts('Full description'),
              'sortable' => TRUE,
            ],
            [
              'links' => [
                [
                  'entity' => 'JobAd',
                  'action' => 'update',
                  'join' => '',
                  'target' => 'crm-popup',
                  'icon' => 'fa-pencil',
                  'text' => E::ts('Update Job Ad'),
                  'style' => 'default',
                  'path' => '',
                  'task' => '',
                  'condition' => [],
                ],
              ],
              'type' => 'links',
              'alignment' => 'text-right',
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
              'text' => E::ts('Add job ad'),
              'style' => 'success',
              'condition' => [],
              'task' => '',
              'entity' => '',
              'action' => '',
              'join' => '',
              'target' => 'crm-popup',
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