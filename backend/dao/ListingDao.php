<?php
require_once __DIR__ . '/BaseDao.php';

class ListingDao extends BaseDao {
    public function __construct() {
        parent::__construct('listings');
    }

    public function createListing($listing) {
        $data = [
            'title'       => $listing['title'],
            'description' => $listing['description'],
            'price'       => $listing['price'],
            'location'    => $listing['location'],
            'user_id'     => $listing['user_id'],
            'category_id' => $listing['category_id']
        ];
        return $this->insert($data);
    }

    public function getAllListings() {
        return $this->getAll();
    }

    public function getListingById($id) {
        return $this->getById($id, 'listing_id');
    }

    public function updateListing($id, $listing) {
        $data = [
            'title'       => $listing['title'],
            'description' => $listing['description'],
            'price'       => $listing['price'],
            'location'    => $listing['location'],
            'user_id'     => $listing['user_id'],
            'category_id' => $listing['category_id']
        ];
        return $this->update($id, $data, 'listing_id');
    }

    public function deleteListing($id) {
        return $this->delete($id, 'listing_id');
    }
}

