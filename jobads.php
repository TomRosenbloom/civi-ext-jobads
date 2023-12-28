<?php

require_once 'jobads.civix.php';
// phpcs:disable
use CRM_Jobads_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function jobads_civicrm_config(&$config): void {
  _jobads_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function jobads_civicrm_install(): void {
  _jobads_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function jobads_civicrm_enable(): void {
  _jobads_civix_civicrm_enable();
}

/**
 * Implementation of hook_civicrm_tabset
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_tabset
 */
function jobads_civicrm_tabset($path, &$tabs, $context) {
  if ($path === 'civicrm/contact/view') {
    // add a tab to the contact summary screen
    $contactId = $context['contact_id'];
    $url = CRM_Utils_System::url('civicrm/jobads/contacttab', ['cid' => $contactId]);

    $myEntities = \Civi\Api4\JobAd::get()
      ->selectRowCount()
      ->addWhere('contact_id', '=', $contactId)
      ->execute();

    $tabs[] = array(
      'id' => 'contact_jobads',
      'url' => $url,
      'count' => $myEntities->count(),
      'title' => E::ts('Job Ads'),
      'weight' => 150,
      'icon' => 'crm-i fa-envelope-open',
    );
  }
}