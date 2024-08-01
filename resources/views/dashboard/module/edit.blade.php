@extends('layouts.app')
@section('title', 'Edu Class | Add Module')
@section('content')
<div class="container-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Tambah Module</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Isi form dibawah dan submit, untuk menambahkan module baru di EDU CLASS</p>
                        <form class="row g-3 needs-validation" novalidate action="{{ route('module.update', $module->id) }}" method="POST">
                            @csrf
                            @method('PUT') 
                            <input type="hidden" name="create_by" value="{{ Auth::user()->id }}"> 
                            <div class="form-group">
                                <label for="name" class="form-label">Nama Module</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $module->name) }}" required>
                                <div class="valid-feedback">
                                    Bagus sekali!
                                </div>
                                <div class="invalid-feedback">
                                    Mohon isi nama module
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="" disabled>Pilih Status</option>
                                    <option value="1" {{ old('status', $module->status) == '1' ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ old('status', $module->status) == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                                <div class="valid-feedback">
                                    Bagus sekali!
                                </div>
                                <div class="invalid-feedback">
                                    Mohon pilih status
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                    <label class="form-check-label" for="invalidCheck">
                                        Pastikan Semua Data Sudah Benar
                                    </label>
                                    <div class="valid-feedback">
                                        Bagus sekali!
                                    </div>
                                    <div class="invalid-feedback">
                                        Mohon centang untuk memastikan data sudah benar
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


