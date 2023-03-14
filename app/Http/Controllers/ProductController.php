<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        $title = $request->input('title');
        if (!isset($title) || $title  == ''){
            $title = '';
        }


        $price_from = $request->input('price_from');
        if (!isset($price_from) || $price_from  == ''){
            $price_from = 0;
        }

        $price_to = $request->input('price_to');
        if (!isset($price_to) || $price_to  == ''){
            $price_to = 99999999;
        }

        $from = $request->input('from');
        if (!isset($from) || $from  == ''){
            $from = date('Y-m-d H:i:s', mktime(0, 0, 0, 1, 1, 2000));
        }

        $to = $request->input('to');
        if (!isset($to) || $to  == ''){
            $to = date('Y-m-d H:i:s');
        }

        return Product::where('price', '>=', $price_from)
            ->where('price', '<=', $price_to)
            ->whereBetween('created_at', [$from, $to])
            ->where('title', 'like', '%'.$title.'%')
            ->paginate(6);
    }

    public function show(Product $id)
    {
        return Product::find($id);
    }


}
