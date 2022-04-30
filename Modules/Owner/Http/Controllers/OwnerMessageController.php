<?php

namespace Modules\Owner\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Http\Service\CategoryService;

class OwnerMessageController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var CategoryService
     */
    private $categoryService;

    public function __construct(
        UserService $userService,
        CategoryService $categoryService
    )
    {
        $this->userService = $userService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $user = $this->userService->getUserById(auth()->id());
        $active = 3;
        $categories = $this->categoryService->getAllCategory();
        return view('owner.messages',compact('active','user','categories'));
    }

}