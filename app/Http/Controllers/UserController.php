<?php

namespace App\Http\Controllers;

use App\Models\User;  // Import the User model
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;  // Import the Role model

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(15);  // Fetch paginated users
        $roles = Role::all();  // Fetch all roles

        return view('manage-users.index', compact('users', 'roles'));  // Pass both variables
    }
}
