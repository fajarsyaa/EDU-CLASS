<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{

    public function index()
    {
        return view('dashboard.module.index', [
            'title' => 'Edu Class | Module',
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Module $module)
    {
        //
    }

    public function edit(Module $module)
    {
        //
    }

    public function update(Request $request, Module $module)
    {
        //
    }

    public function destroy(Module $module)
    {
        //
    }
}
