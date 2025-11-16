<?php
error_log("LOADED: TestimonialRoutes.php");
/**
 * @OA\Get(
 *     path="/testimonial",
 *     tags={"testimonials"},
 *     summary="Get all testimonials",
 *     @OA\Response(response=200, description="List of testimonials")
 * )
 */
Flight::route('GET /testimonial', function(){
    Flight::json(Flight::testimonialService()->getAll());
});

/**
 * @OA\Get(
 *     path="/testimonial/{id}",
 *     tags={"testimonials"},
 *     summary="Get testimonial by ID",
 *     @OA\Parameter(name="id", in="path", required=true),
 *     @OA\Response(response=200, description="Testimonial found")
 * )
 */
Flight::route('GET /testimonial/@id', function($id){
    Flight::json(Flight::testimonialService()->getById($id));
});

/**
 * @OA\Post(
 *     path="/testimonial",
 *     tags={"testimonials"},
 *     summary="Create testimonial",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"user_id","content"},
 *             @OA\Property(property="user_id", type="integer", example=1),
 *             @OA\Property(property="content", type="string", example="Great service!")
 *         )
 *     ),
 *     @OA\Response(response=200, description="Testimonial created")
 * )
 */
Flight::route('POST /testimonial', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::testimonialService()->createTestimonial($data));
});

/**
 * @OA\Put(
 *     path="/testimonial/{id}",
 *     tags={"testimonials"},
 *     summary="Update testimonial",
 *     @OA\Parameter(name="id", in="path", required=true),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="content", type="string")
 *         )
 *     ),
 *     @OA\Response(response=200, description="Testimonial updated")
 * )
 */
Flight::route('PUT /testimonial/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::testimonialService()->update($id, $data));
});

/**
 * @OA\Delete(
 *     path="/testimonial/{id}",
 *     tags={"testimonials"},
 *     summary="Delete testimonial",
 *     @OA\Parameter(name="id", in="path", required=true),
 *     @OA\Response(response=200, description="Testimonial deleted")
 * )
 */
Flight::route('DELETE /testimonial/@id', function($id){
    Flight::json(Flight::testimonialService()->delete($id));
});