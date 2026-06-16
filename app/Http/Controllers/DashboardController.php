<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $products = Product::all();
        return view('Dashboard/index', compact('users', 'products'));
    }
}
