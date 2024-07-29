@extends('layouts.app')
@section('title', 'Edu Class | Update List')
@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Update Kelas</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Manusia memang tidak bisa lepas dari kesalahan, TENANG AJA !. kamu bisa memperbaikinya disini supaya proses belajar tidak terganggu | EDU CLASS</p>
                        <form class="row g-3 needs-validation" novalidate action="{{ route('classes.update', $classModel->id) }}" method="POST">
                            @csrf
                            @method('PUT')                                     
                            <div class="form-group">
                                <label for="validationCustom01" class="form-label">Nama Kelas</label>
                                <input type="text" class="form-control" id="validationCustom01" name="name" value="{{ $classModel->name }}" required>
                                <div class="valid-feedback">
                                    bagus sekali !
                                </div>
                                <div class="invalid-feedback">
                                    Mohon isi nama kelas
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="validationCustom02">Deskripsi Kelas</label>
                                <textarea class="form-control" id="validationCustom02" rows="5" name="desc" required>{{ old('desc', $classModel->desc) }}</textarea>
                                <div class="valid-feedback">
                                    bagus sekali !
                                </div>
                                <div class="invalid-feedback">
                                    Mohon isi deskripsi kelas
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                    <label class="form-check-label" for="invalidCheck">
                                        Pastikan Semua Data Sudah Benar
                                    </label>
                                    <div class="valid-feedback">
                                        bagus sekali !
                                    </div>
                                    <div class="invalid-feedback">
                                        Mohon centang untuk memastikan data sudah benar
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection