<?php
require_once __DIR__ . '/BaseDao.php';

class ContactDao extends BaseDao {
    public function __construct() {
        parent::__construct('contacts');
    }

    public function createContact($contact) {
        $data = [
            'name'    => $contact['name'],
            'email'   => $contact['email'],
            'subject' => $contact['subject'],
            'message' => $contact['message']
        ];
        return $this->insert($data);
    }

    public function getAllContacts() {
        return $this->getAll();
    }

    public function getContactById($id) {
        return $this->getById($id, 'contact_id');
    }

    public function updateContact($id, $contact) {
        $data = [
            'name'    => $contact['name'],
            'email'   => $contact['email'],
            'subject' => $contact['subject'],
            'message' => $contact['message']
        ];
        return $this->update($id, $data, 'contact_id');
    }

    public function deleteContact($id) {
        return $this->delete($id, 'contact_id');
    }
}
