<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::all();
        return view('dashboard.module.index', [
            'title' => 'Edu Class | Module',
            'modules' => $modules
        ]);
    }

    public function create()
    {
        return view('dashboard.module.create', [
            'title' => 'Create Module',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'create_by' => 'required|exists:users,id',
            'status' => 'required|string|max:255',
        ]);

        Module::create($request->all());

        return redirect()->route('modules.index')->with('success', 'Module created successfully.');
    }

    public function show(Module $module)
    {
        return view('dashboard.module.show', [
            'title' => 'Module Details',
            'module' => $module
        ]);
    }

    public function edit(Module $module)
    {
        return view('dashboard.module.edit', [
            'title' => 'Edit Module',
            'module' => $module
        ]);
    }

    public function update(Request $request, Module $module)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'create_by' => 'required|exists:users,id',
            'status' => 'required|string|max:255',
        ]);

        $module->update($request->all());

        return redirect()->route('modules.index')->with('success', 'Module updated successfully.');
    }

    public function destroy(Module $module)
    {
        $module->delete();

        return redirect()->route('modules.index')->with('success', 'Module deleted successfully.');
    }
}
