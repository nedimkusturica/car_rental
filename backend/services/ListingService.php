<?php
require_once __DIR__ . '/BaseService.php';
require_once __DIR__ . '/../dao/ListingDao.php';

class ListingService extends BaseService {
    public function __construct() {
        $dao = new ListingDao();
        parent::__construct($dao);
    }

    public function getByUser($user_id) {
        return $this->dao->getByUser($user_id);
    }

    public function createListing($data) {
        if (empty($data['title']) || empty($data['description'])) {
            throw new Exception('Listing must include a title and description.');
        }

        return $this->create($data);
    }
}
?>
