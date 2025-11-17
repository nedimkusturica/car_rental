<?php
error_log("LOADED: ContactRoutes.php");
/**
 * @OA\Get(
 *     path="/contact",
 *     tags={"contact"},
 *     summary="Get all contact messages",
 *     @OA\Response(
 *         response=200,
 *         description="List of all contact messages"
 *     )
 * )
 */
Flight::route('GET /contact', function(){
    Flight::json(Flight::contactService()->getAll());
});

/**
 * @OA\Get(
 *     path="/contact/{id}",
 *     tags={"contact"},
 *     summary="Get a specific contact message by ID",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Contact message ID",
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Returns a contact message"
 *     )
 * )
 */
Flight::route('GET /contact/@id', function($id){
    Flight::json(Flight::contactService()->getById($id));
});

/**
 * @OA\Post(
 *     path="/contact",
 *     tags={"contact"},
 *     summary="Submit a new contact message",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name","email","message"},
 *             @OA\Property(property="name", type="string", example="John Doe"),
 *             @OA\Property(property="email", type="string", example="john@example.com"),
 *             @OA\Property(property="message", type="string", example="Hello, I have a question...")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Contact message submitted"
 *     )
 * )
 */
Flight::route('POST /contact', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::contactService()->createContactMessage($data));
});

/**
 * @OA\Put(
 *     path="/contact/{id}",
 *     tags={"contact"},
 *     summary="Update a contact message",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string"),
 *             @OA\Property(property="email", type="string"),
 *             @OA\Property(property="message", type="string")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Contact message updated"
 *     )
 * )
 */
Flight::route('PUT /contact/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::contactService()->update($id, $data));
});

/**
 * @OA\Delete(
 *     path="/contact/{id}",
 *     tags={"contact"},
 *     summary="Delete a contact message",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer", example=1)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Contact message deleted"
 *     )
 * )
 */
Flight::route('DELETE /contact/@id', function($id){
    Flight::json(Flight::contactService()->delete($id));
});