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