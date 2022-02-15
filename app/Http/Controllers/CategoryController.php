<?php

namespace App\Http\Controllers;

use App\Repository\CategoryRepository;
use App\Service\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categoryRepository = new CategoryRepository();
        $categoryService = new CategoryService($categoryRepository);
        $listCategory = $categoryService->getCategory();
        $title = 'Category';
        return view('Pages.Category.index', [
            'title' => $title,
            'listCategory' => $listCategory
        ]);
    }
}
