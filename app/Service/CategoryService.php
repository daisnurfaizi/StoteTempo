<?php

namespace App\Service;

use App\Repository\CategoryRepository;

class CategoryService
{
    private $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function CreateNewCategory($request)
    {
        $category = $this->categoryRepository->save($request);
        if ($category) {
            return 1;
        }
        return 0;
    }

    public function UpdateCategory($request)
    {
        $category = $this->categoryRepository->update($request);
        if ($category) {
            return 1;
        }
        return 0;
    }

    public function DeactiveCategory($request)
    {
        $category = $this->categoryRepository->deactive($request);
        if ($category) {
            return 1;
        }
        return 0;
    }

    public function getCategory()
    {
        $category = $this->categoryRepository->getAllCategory();
        return $category;
    }
}
