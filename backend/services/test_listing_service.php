<?php
require_once __DIR__ . '/services/ListingService.php';

$listing_service = new ListingService();

try {
    $new_listing = [
        'title' => 'Test Listing',
        'description' => 'This is a test listing created manually.',
        'price' => 100,
    ];

    $result = $listing_service->createListing($new_listing);
    echo "Listing created successfully:\n";
    print_r($result);

    $listings = $listing_service->getAll();
    echo "\nAll listings:\n";
    print_r($listings);

    $single = $listing_service->getById(1);
    echo "\nListing with ID 1:\n";
    print_r($single);

    $user_listings = $listing_service->getByUser(1);
    echo "\nListings for user 1:\n";
    print_r($user_listings);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
