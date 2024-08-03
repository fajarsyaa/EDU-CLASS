@extends('layouts.app')
@section('title', 'Edu Class | Module Details')
@section('content')
<div class="container-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Detail Module</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Informasi lengkap tentang module yang dipilih.</p>
                        <div class="form-group">
                            <label for="name" class="form-label">Nama Module</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $module->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="desc">Deskripsi</label>
                            <textarea class="form-control" id="desc" rows="5" name="desc" readonly>{{ $module->desc }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" class="form-control" id="status" name="status" value="{{ $module->status ? 'Aktif' : 'Tidak Aktif' }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Link URL</label>
                            <ul class="list-group">
                                @foreach($urls as $url)
                                    <li class="list-group-item">
                                        <a href="{{ $url->url }}" target="_blank">{{ $url->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Files</label>
                            <ul class="list-group">
                                @foreach($files as $file)
                                    <li class="list-group-item">
                                        <a href="{{ Storage::url(str_replace('/storage/', '', $file->url)) }}" download>{{ basename($file->name) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <div class="ml-auto">
                            @if (Auth::user()->role == 'admin')
                            <form action="{{ route('module.approve', ['id' => $module->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="value" value="1">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <svg class="icon-18" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 13l4 4L19 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    Approve
                                </button>
                            </form>
                            
                            <form action="{{ route('module.approve', ['id' => $module->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="value" value="2">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <svg class="icon-18" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    Reject
                                </button>
                            </form>
                            @endif

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


    {{-- <div class="form-group">
        <a href="{{ route('classes.show',$module->class_id) }}" class="btn btn-primary">Kembali</a>
    </div> --}}