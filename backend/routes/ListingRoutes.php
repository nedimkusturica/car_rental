<?php
error_log("LOADED: ListingRoutes.php");
/**
 * @OA\Get(
 *     path="/listing",
 *     tags={"listings"},
 *     summary="Get all listings",
 *     @OA\Response(
 *         response=200,
 *         description="List of all listings"
 *     )
 * )
 */
Flight::route('GET /listing', function(){
    Flight::json(Flight::listingService()->getAll());
});

/**
 * @OA\Get(
 *     path="/listing/{id}",
 *     tags={"listings"},
 *     summary="Get listing by ID",
 *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
 *     @OA\Response(response=200, description="Listing found")
 * )
 */
Flight::route('GET /listing/@id', function($id){
    Flight::json(Flight::listingService()->getById($id));
});

/**
 * @OA\Post(
 *     path="/listing",
 *     tags={"listings"},
 *     summary="Create a new listing",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"title","description","price"},
 *             @OA\Property(property="title", type="string", example="BMW X5"),
 *             @OA\Property(property="description", type="string", example="Luxury SUV"),
 *             @OA\Property(property="price", type="integer", example=120),
 *             @OA\Property(property="user_id", type="integer", example=1)
 *         )
 *     ),
 *     @OA\Response(response=200, description="Listing created")
 * )
 */
Flight::route('POST /listing', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::listingService()->createListing($data));
});

/**
 * @OA\Put(
 *     path="/listing/{id}",
 *     tags={"listings"},
 *     summary="Update listing",
 *     @OA\Parameter(name="id", in="path", required=true),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="title", type="string"),
 *             @OA\Property(property="description", type="string"),
 *             @OA\Property(property="price", type="integer")
 *         )
 *     ),
 *     @OA\Response(response=200, description="Listing updated")
 * )
 */
Flight::route('PUT /listing/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::listingService()->update($id, $data));
});

/**
 * @OA\Delete(
 *     path="/listing/{id}",
 *     tags={"listings"},
 *     summary="Delete listing",
 *     @OA\Parameter(name="id", in="path", required=true),
 *     @OA\Response(response=200, description="Listing deleted")
 * )
 */
Flight::route('DELETE /listing/@id', function($id){
    Flight::json(Flight::listingService()->delete($id));
});
