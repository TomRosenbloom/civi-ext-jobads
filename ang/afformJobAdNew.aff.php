<?php
use CRM_Jobads_ExtensionUtil as E;

return [
  'type' => 'form',
  'title' => E::ts('New job ad'),
  'icon' => 'fa-list-alt',
  'server_route' => 'civicrm/jobad/add',
  'create_submission' => TRUE,
  'modified_date' => '2023-12-18 15:40:13',
];
