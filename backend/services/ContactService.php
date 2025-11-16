<?php
require_once __DIR__ . '/BaseService.php';
require_once __DIR__ . '/../dao/ContactDao.php';

class ContactService extends BaseService {
    public function __construct() {
        $dao = new ContactDao();
        parent::__construct($dao);
    }

    public function createContactMessage($data) {
        if (empty($data['name']) || empty($data['email']) || empty($data['message'])) {
            throw new Exception('Contact form requires name, email, and message.');
        }

        return $this->create($data);
    }
}
?>
