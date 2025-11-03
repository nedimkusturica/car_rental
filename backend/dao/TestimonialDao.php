<?php
require_once __DIR__ . '/BaseDao.php';

class TestimonialDao extends BaseDao {
    public function __construct() {
        parent::__construct('testimonials');
    }

    public function createTestimonial($testimonial) {
        $data = [
            'name'    => $testimonial['name'],
            'email'   => $testimonial['email'],
            'message' => $testimonial['message'],
            'rating'  => $testimonial['rating']
        ];
        return $this->insert($data);
    }

    public function getAllTestimonials() {
        return $this->getAll();
    }

    public function getTestimonialById($id) {
        return $this->getById($id, 'testimonial_id');
    }

    public function updateTestimonial($id, $testimonial) {
        $data = [
            'name'    => $testimonial['name'],
            'email'   => $testimonial['email'],
            'message' => $testimonial['message'],
            'rating'  => $testimonial['rating']
        ];
        return $this->update($id, $data, 'testimonial_id');
    }

    public function deleteTestimonial($id) {
        return $this->delete($id, 'testimonial_id');
    }
}
