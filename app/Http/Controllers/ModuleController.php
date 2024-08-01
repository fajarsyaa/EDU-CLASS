<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\ModuleItem;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ModuleController extends Controller
{
    public function index(Request $request)
    {
        $classId = $request->route('class');
    
        if ($classId) {
            $modules = Module::where('class_id', $classId)->get();
        } else {
            $modules = Module::all();
        }

        dd($modules);
    
        return view('dashboard.module.index', [
            'title' => 'Edu Class | Module',
            'modules' => $modules
        ]);
    }
    
    public function create($class)
    {
        return view('dashboard.module.create', [
            'title' => 'Create Module',
            'class_id' => $class
        ]);
    }

    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required|string|max:255',
            'create_by' => 'required|exists:users,id',
            'status' => 'required',
            'class_id'=>'required',
        ]);

        $module = Module::create($request->all());

        $class = ClassModel::find($request['class_id']);
        $className = str_replace(' ', '-', $class->name);

        if ($request->has('urls')) {
            foreach ($request->input('urls') as $url) {
                ModuleItem::create([
                    'name' => $url,
                    'url' => $url,
                    'type' => 'url',
                    'module_id' => $module->id,
                ]);
            }
        }

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = hash('sha256', $file->getClientOriginalName() . microtime()) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs("public/uploads/{$className}", $filename);

                ModuleItem::create([
                    'name' => $file->getClientOriginalName(),
                    'url' => Storage::url($path), 
                    'type' => 'file',
                    'module_id' => $module->id,
                ]);
            }
        }

        return redirect()->route('classes.show', $request->class_id)->with('success', 'Module created successfully.');
    }

    public function show($id)
    {
        $module = Module::find($id);
        $moduleItemFile = ModuleItem::where('module_id',$module['id'])->where('type','file')->get();
        $moduleItemLink = ModuleItem::where('module_id',$module['id'])->where('type','url')->get();

        return view('dashboard.module.show', [
            'title' => 'Module Details',
            'module' => $module,
            'files'  => $moduleItemFile,
            'urls'  => $moduleItemLink,
        ]);
    }

    public function edit($id)
    {
        $module = Module::find($id);

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

    public function destroy($id)
    {   
        $module = Module::find($id);
        $class_id = $module->class_id;
        $module->delete();

        return redirect()->route('classes.show',$class_id)->with('success', 'Module deleted successfully.');
    }
}
