<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function render()
    {
        return view('products.index');
    }

    public function index()
    {
        $products = Product::select(['name', 'price', 'in_stock']);
        return Datatables::of($products)->make();
    }

    public function search(Request $request)
    {
        try {
            $products = Product::where('name', 'LIKE', "%{$request->name}%")
                ->select([
                    'name',
                    'price',
                    'created_at',
                ]);
            return Datatables::eloquent($products);
        }catch (Exception $exception){
            return response()->json($exception->getMessage());
        }
    }

    public function getProductInStock(Request $request)
    {
        $inStock = $request->in_stock;
        $products = Product::when($inStock == 1,function($query){
                return $query->where('in_stock',1);
            })
            ->when($inStock == 0,function($query){
                return $query->where('in_stock',1);
            })
            ->when(empty($inStock),function($query){
            return $query->all();
        });
        return Datatables::eloquent($products);
    }
}
