<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    public function index()
    {
        return Datatables::eloquent(Customer::query())->make(true);
    }

    public function render()
    {
        return view('customers.index.index');
    }
}
