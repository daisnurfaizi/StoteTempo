<?php

namespace App\Repository;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{
    public function save($request)
    {
        $category = Category::create([
            'Category_name' => $request->Category_name
        ]);
        return $category;
    }

    public function update($request)
    {
        DB::beginTransaction();
        try {
            $category = Category::where('id', $request->id)
                ->update(['Category_name' => $request->category_name]);
            DB::commit();
            return $category;
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }

    public function deactive($request)
    {
        DB::beginTransaction();
        try {
            $category = Category::where('id', $request->id)
                ->update(['active' => 0]);
            DB::commit();
            return $category;
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }

    public function activeCategory()
    {
        $category = Category::where('active', 1)
            ->get();
        return $category;
    }

    public function getAllCategory()
    {
        $category = Category::all();
        return $category;
    }
}
