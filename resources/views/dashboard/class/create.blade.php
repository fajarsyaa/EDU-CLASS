@extends('layouts.app')
@section('title', 'Edu Class | Add List')
@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Tambah Kelas</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Isi form dibahawah dan submit, untuk menambahkan kelas baru di EDU CLASS</p>
                        <form class="row g-3 needs-validation" novalidate action="{{ route('classes.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <div class="form-group">
                                <label for="validationCustom01" class="form-label">Nama Kelas</label>
                                <input type="text" class="form-control" id="validationCustom01" name="name" required>
                                <div class="valid-feedback">
                                    bagus sekali !
                                </div>
                                <div class="invalid-feedback">
                                    Mohon isi nama kelas
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="validationCustom02">Deskripsi Kelas</label>
                                <textarea class="form-control" id="validationCustom02" rows="5" name="desc" required></textarea>
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