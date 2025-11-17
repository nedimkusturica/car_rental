<?php
error_log("LOADED: CategoryRoutes.php");

/**
 * @OA\Get(
 *     path="/category",
 *     tags={"categories"},
 *     summary="Get all categories or filter by name",
 *     @OA\Parameter(
 *         name="name",
 *         in="query",
 *         required=false,
 *         description="Optional category name to filter categories",
 *         @OA\Schema(type="string", example="SUV")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Array of all categories or filtered by name"
 *     )
 * )
 */
Flight::route('GET /category', function() {
    $name = Flight::request()->query['name'] ?? null;
    if ($name) {
        Flight::json(Flight::categoryService()->getCategoryByName($name));
    } else {
        Flight::json(Flight::categoryService()->getAll());
    }
});

/**
 * @OA\Get(
 *     path="/category/{id}",
 *     tags={"categories"},
 *     summary="Get a specific category by ID",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Category ID",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Returns the category with the given ID"
 *     )
 * )
 */
Flight::route('GET /category/@id', function($id) {
    Flight::json(Flight::categoryService()->getById($id));
});

Flight::route('POST /category', function() {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::categoryService()->createCategory($data));
});

Flight::route('PUT /category/@id', function($id) {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::categoryService()->update($id, $data));
});

Flight::route('PATCH /category/@id', function($id) {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::categoryService()->update($id, $data));
});

Flight::route('DELETE /category/@id', function($id) {
    Flight::json(Flight::categoryService()->delete($id));
});