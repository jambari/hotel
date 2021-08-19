<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laundry;

class OrderController extends Controller
{
    public function index ()
    {
      $laundries = Laundry::all();
      return view('orders.index', compact('laundries'));
    }

    public function create()
  {
      $laundries = Laundry::all();
      return view('orders.create', compact('laundries'));
  }

}
