<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{
    /**
     * Display list of products
     * through API with certain filters
     * 
     */

    public function index(Request $request)
    {

        error_log("Request: " . print_r($request->all(), true));

        $sort = $request->input('sort');
        $category = $request->input('category');
        $page = $request->input('page');



        //validate if page number is integer and greater than 0 and if not send error 500

        if ($page && (!is_numeric($page) || $page < 1)) {
            return response()->json(['error' => 'Page number must be a positive integer'], 500);
        }

        try {
            $postModel = new Post();
            $posts = $postModel->getAllProductsAPI($sort, $category, $page);
        } catch (Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }

        if (sizeof($posts) == 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'No products found'
            ], 404);
        } else {

            try {
                return response()->json([
                    'status' => 'success',
                    'count' => count($posts),
                    'page' => $page,
                    'message' => 'Products found',
                    'data' => $posts,
                ], 200);
            } catch (Exception $e) {
                error_log("Error: " . print_r($e, true));
                return response()->json(['error' => 'Something went wrong'], 500);
            }
        }
    }
}
