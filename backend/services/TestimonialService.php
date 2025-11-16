<?php
require_once __DIR__ . '/BaseService.php';
require_once __DIR__ . '/../dao/TestimonialDao.php';

class TestimonialService extends BaseService {
    public function __construct() {
        $dao = new TestimonialDao();
        parent::__construct($dao);
    }

    public function createTestimonial($data) {
        if (empty($data['user_id']) || empty($data['content'])) {
            throw new Exception('Testimonial must include user_id and content.');
        }

        return $this->create($data);
    }
}
?>
