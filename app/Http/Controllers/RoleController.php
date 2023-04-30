<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index () {
        return response()->json([
            'status' => 200,
            'message' => 'success',
            'data' => Role::get()
        ], 200);
    }
}
