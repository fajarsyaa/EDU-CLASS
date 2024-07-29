<?php

namespace App\Http\Controllers;

use App\Models\UserClass;
use Illuminate\Http\Request;

class UserClassController extends Controller
{
    public function index()
    {
        $userClasses = UserClass::all();
        return view('user_classes.index', compact('userClasses'));
    }

    public function create()
    {
        return view('user_classes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'user_id' => 'required|exists:users,id',
        ]);

        UserClass::create($request->all());
        return redirect()->route('user-classes.index')->with('success', 'User Class created successfully.');
    }

    public function show(UserClass $userClass)
    {
        return view('user_classes.show', compact('userClass'));
    }

    public function edit(UserClass $userClass)
    {
        return view('user_classes.edit', compact('userClass'));
    }

    public function update(Request $request, UserClass $userClass)
    {
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $userClass->update($request->all());
        return redirect()->route('user-classes.index')->with('success', 'User Class updated successfully.');
    }

    public function destroy(UserClass $userClass)
    {
        $userClass->delete();
        return redirect()->route('user-classes.index')->with('success', 'User Class deleted successfully.');
    }
}
