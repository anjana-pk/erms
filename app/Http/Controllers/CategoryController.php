<?php

namespace App\Http\Controllers;

use App\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function fn_create_category(Request $req)
    {
        try {
            $category_obj = Category::firstOrCreate($req->all());
            if ($category_obj->wasRecentlyCreated) {
                return response(['status' => true, 'msg' => 'new category created']);
            } else {
                return response(['status' => false, 'msg' => 'category already exits']);
            }
        } catch (Exception $e) {
            return response(['status' => false, 'msg' => 'category already exits']);
        }
    }
}
