<?php
use CRM_Jobads_ExtensionUtil as E;

class CRM_Jobads_Page_ContactTab extends CRM_Core_Page {

  public function run() {
    // Example: Set the page-title dynamically; alternatively, declare a static title in xml/Menu/*.xml
    CRM_Utils_System::setTitle(E::ts('My Entity'));
    $contactId = CRM_Utils_Request::retrieve('cid', 'Positive', $this, TRUE);
    $myEntities = \Civi\Api4\MyEntity::get()
      ->select('*')
      ->addWhere('contact_id', '=', $contactId)
      ->execute();
    $rows = array();
    foreach($myEntities as $myEntity) {
      $row = $myEntity;
      if (!empty($row['contact_id'])) {
        $row['contact'] = '<a href="'.CRM_Utils_System::url('civicrm/contact/view', ['reset' => 1, 'cid' => $row['contact_id']]).'">'.CRM_Contact_BAO_Contact::displayName($row['contact_id']).'</a>';
      }
      $rows[] = $row;
    }
    $this->assign('contactId', $contactId);
    $this->assign('rows', $rows);

    // Set the user context
    $session = CRM_Core_Session::singleton();
    $userContext = CRM_Utils_System::url('civicrm/contact/view', 'cid='.$contactId.'&selectedChild=contact_my_entity&reset=1');
    $session->pushUserContext($userContext);

    parent::run();
  }


}
