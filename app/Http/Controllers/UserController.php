<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select(['(name,', 'email', 'created_at']);
        return Datatables::of($users)->make();
    }

    public function search(Request $request)
    {
        try {
            $users = User::where('name', 'LIKE', "%{$request->name}%")
                ->orWhere('email', 'LIKE', "%{$request->email}%")
                            ->select([
                                'name',
                                'email',
                                'created_at',
                                'updated_at'
                            ]);
            return Datatables::eloquent($users);
        }catch (Exception $exception){
            return response()->json('data',$exception->getMessage());
        }
    }
}
