<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit');
        $name = $request->input('id');
        $show_product = $request->input('show_product');

        if ($id) {
            // $product = {Model}::with(['{relasi}', '{relasi}'])->find[mengabil-data]($id);
            $product = ProductCategory::with(['products'])->find($id);

            if ($product) {
                return ResponseFormatter::success(
                    $product,
                    'Data kategori berhasil di ambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data kategori tidak ada',
                    484
                );
            }
        }

        // $product = {model}::query();
        $category = ProductCategory::query();

        // filter
        if ($name) {
            $category->where('name', 'like', '%' . $name . '%');
        }

        // ---- kurang mengerti
        if ($show_product) {
            $category->with('products');
        }
        // ----

        return ResponseFormatter::success(
            $category->paginate($limit),
            'Data List Kateogri berhasil di ambil'
        );
    }
}
