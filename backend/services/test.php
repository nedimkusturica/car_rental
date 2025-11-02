<?php

require_once __DIR__ . '/../dao/UserDao.php';
require_once __DIR__ . '/../dao/CategoryDao.php';
require_once __DIR__ . '/../dao/ListingDao.php';
require_once __DIR__ . '/../dao/ContactDao.php';
require_once __DIR__ . '/../dao/TestimonialDao.php';

// Initialize DAOs
$userDao = new UserDao();
$categoryDao = new CategoryDao();
$listingDao = new ListingDao();
$contactDao = new ContactDao();
$testimonialDao = new TestimonialDao();


$existingUser = $userDao->getAll(); // Or implement getUserByEmail() in UserDao
foreach ($existingUser as $user) {
    if ($user['email'] === 'jane@example.com') {
        $userDao->deleteUser($user['user_id']);
    }
}

// Insert test data
$userDao->insert([
   'name' => 'Jane Doe',
   'email' => 'jane@example.com',
   'password_hash' => password_hash('password123', PASSWORD_DEFAULT),
   'role' => 'USER'
]);

$categoryDao->insert([
   'name' => 'Luxury',
   'description' => 'High-end premium cars'
]);

$listingDao->insert([
   'title' => 'BMW X5',
   'description' => 'Luxury SUV for rent',
   'price' => 120.00,
   'location' => 'Sarajevo',
   'user_id' => 1,
   'category_id' => 1
]);

$contactDao->insert([
   'name' => 'Client One',
   'email' => 'client@example.com',
   'subject' => 'Availability Inquiry',
   'message' => 'Is BMW X5 available next week?'
]);

$testimonialDao->insert([
   'name' => 'Happy Customer',
   'message' => 'Excellent experience! Clean car and friendly staff.',
   'rating' => 5
]);

// Fetch & display all records
echo "<pre>";
echo "=== USERS ===\n";
print_r($userDao->getAll());

echo "\n=== CATEGORIES ===\n";
print_r($categoryDao->getAll());

echo "\n=== LISTINGS ===\n";
print_r($listingDao->getAll());

echo "\n=== CONTACTS ===\n";
print_r($contactDao->getAll());

echo "\n=== TESTIMONIALS ===\n";
print_r($testimonialDao->getAll());
echo "</pre>";
?>
