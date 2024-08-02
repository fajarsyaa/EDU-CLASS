<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Module;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ClassModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $classes = ClassModel::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->paginate(6);
        return view('dashboard.class.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.class.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'user_id' => 'required'
        ]);

        try {
            ClassModel::create($request->all());
            session()->flash('success', 'Kelas baru berhasil dibuat!');           
            return redirect()->route('classes.index');
        } catch (\Exception $e) {
            return redirect()->route('classes.index');
        }       
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {        
        $classModel = ClassModel::find($id);

        $modules = Module::with('creator')
            ->where('class_id', $id)
            ->where('status', 1)
            ->get();

        return view('dashboard.module.index', [
            'title' => 'Edu Class | Module',
            'modules' => $modules,
            'class' => $classModel
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $classModel = ClassModel::find($id);        
        return view('dashboard.class.update', compact('classModel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string',
        ]);
            
        $classModel = ClassModel::find($id);
            
        if (!$classModel) {
            return response()->json(['error' => 'Class not found'], 404);
        }
            
        $classModel->name = $validatedData['name'];
        $classModel->desc = $validatedData['desc'];
            
        try {
            $classModel->save();
            session()->flash('success', 'Kelas berhasil diupdate!');            
            return redirect()->route('classes.index');
        } catch (\Exception $e) {
            return redirect()->route('classes.index');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,ClassModel $classModel)
    {
        $classModel = ClassModel::find($request->id);
        try {
            session()->flash('success', 'Kelas berhasil dihapus! sayang sekali kita harus berpisah dengan kelas '.$classModel->name);                      
            $classModel->delete();
            return redirect()->route('classes.index');
        } catch (\Exception $e) {
            return redirect()->route('classes.index');
        }  
    }
}
