<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Category;
use App\Models\ForumPost;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalRecords = Record::count();
        $lowStockCount = Record::where('stock', '<', 5)->count();
        $totalCategories = Category::count();
        $forumPostsCount = ForumPost::count();

        return view('admin.dashboard', compact(
            'totalRecords',
            'lowStockCount',
            'totalCategories',
            'forumPostsCount'
        ));
    }
}
