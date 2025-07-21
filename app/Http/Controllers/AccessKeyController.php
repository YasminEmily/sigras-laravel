<?php

namespace App\Http\Controllers;

use App\Models\AccessKey;
use Illuminate\Http\Request;

class AccessKeyController extends Controller
{
    public function store(Request $request)
    {
        $key = AccessKey::create([
            'key' => uniqid(),
            'role' => $request->role,
        ]);

        return response()->json($key, 201);
    }

    public function show($id)
    {
        return AccessKey::findOrFail($id);
    }
}

