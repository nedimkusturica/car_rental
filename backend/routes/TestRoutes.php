<?php
echo "TestRoutes.php LOADED<br>";

error_log("TestRoutes.php LOADED");


Flight::route('GET /abc', function() {
    echo "ABC ROUTE WORKS";
});
