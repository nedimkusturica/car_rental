<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}


require 'vendor/autoload.php';

/**
 * ==============================
 * CATEGORY
 * ==============================
 */
require_once __DIR__ . '/dao/CategoryDao.php';
require_once __DIR__ . '/services/CategoryService.php';
Flight::register('categoryService', 'CategoryService');
require_once __DIR__ . '/routes/CategoryRoutes.php';

/**
 * ==============================
 * LISTING
 * ==============================
 */
require_once __DIR__ . '/dao/ListingDao.php';
require_once __DIR__ . '/services/ListingService.php';
Flight::register('listingService', 'ListingService');
require_once __DIR__ . '/routes/ListingRoutes.php';

/**
 * ==============================
 * CONTACT
 * ==============================
 */
require_once __DIR__ . '/dao/ContactDao.php';
require_once __DIR__ . '/services/ContactService.php';
Flight::register('contactService', 'ContactService');
require_once __DIR__ . '/routes/ContactRoutes.php';

/**
 * ==============================
 * TESTIMONIAL
 * ==============================
 */
require_once __DIR__ . '/dao/TestimonialDao.php';
require_once __DIR__ . '/services/TestimonialService.php';
Flight::register('testimonialService', 'TestimonialService');
require_once __DIR__ . '/routes/TestimonialRoutes.php';

/**
 * ==============================
 * USER
 * ==============================
 */
require_once __DIR__ . '/dao/UserDao.php';
require_once __DIR__ . '/services/UserService.php';
Flight::register('userService', 'UserService');
require_once __DIR__ . '/routes/UserRoutes.php';

/**
 * ==============================
 * HEALTHCHECK
 * ==============================
 */

Flight::start();
