<?php

namespace App\Http\Controllers;

use App\Models\User;

class ParentController extends Controller
{
    public $admins;

    public function __construct(User $admins)
    {
        $this->admins = User::with('roles')->whereHas('roles', function ($query) {
            $query->whereIn('name', ['Admin', 'Super Admin']);
        })->get();
    }
}
