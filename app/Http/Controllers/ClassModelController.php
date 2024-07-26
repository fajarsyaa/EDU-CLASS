<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = ClassModel::all();
        return response()->json($classes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
        ]);
    
        $class = ClassModel::create($request->all());
    
        return response()->json($class, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassModel $classModel)
    {
        return response()->json($classModel);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassModel $classModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassModel $classModel)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
        ]);

        $classModel->update($request->all());

        return response()->json($classModel);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassModel $classModel)
    {
        $classModel->delete();

        return response()->json(['message' => 'Class deleted successfully']);    
    }
}
