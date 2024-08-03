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
                        <form class="row g-3 needs-validation" novalidate action="{{ route('module.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="create_by" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="class_id" value="{{ $class_id }}">
                            <div class="form-group">
                                <label for="name" class="form-label">Nama Module</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                                <div class="valid-feedback">
                                    Bagus sekali!
                                </div>
                                <div class="invalid-feedback">
                                    Mohon isi nama module
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="validationCustom02">Deskripsi</label>
                                <textarea class="form-control" id="validationCustom02" rows="5" name="desc" required></textarea>
                                <div class="valid-feedback">
                                    bagus sekali !
                                </div>
                                <div class="invalid-feedback">
                                    Mohon isi deskripsi kelas
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="" disabled selected>Pilih Status</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                                <div class="valid-feedback">
                                    Bagus sekali!
                                </div>
                                <div class="invalid-feedback">
                                    Mohon pilih status
                                </div>
                            </div> --}}
                            <div class="form-group module-item"></div>
                            <div class="form-group">
                                <button type="button" class="btn btn-sm btn-outline-info" onclick="addItem('url')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-3.5 3.5a4 4 0 005.656 5.656l1.828-1.828M10.172 13.828a4 4 0 015.656 0l3.5-3.5a4 4 0 00-5.656-5.656L13.828 5.828"/>
                                    </svg>
                                </button>
                                
                                
                                <button type="button" class="btn btn-sm btn-outline-success" onclick="addItem('file')">                                
                                    <svg class="icon-22" width="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.7364 2.76175H8.0844C6.0044 2.75375 4.3004 4.41075 4.2504 6.49075V17.2277C4.2054 19.3297 5.8734 21.0697 7.9744 21.1147C8.0114 21.1147 8.0484 21.1157 8.0844 21.1147H16.0724C18.1624 21.0407 19.8144 19.3187 19.8024 17.2277V8.03775L14.7364 2.76175Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M14.4746 2.75V5.659C14.4746 7.079 15.6236 8.23 17.0436 8.234H19.7976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M11.6406 9.90869V15.9497" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M13.9864 12.2642L11.6414 9.90918L9.29639 12.2642" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                </button>
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

@section('scripts')
<script>
    const addItem = (type) => {
        const container = document.querySelector('.module-item');
        const inputWrapper = document.createElement('div');
        inputWrapper.className = 'd-flex align-items-center mb-2';

        let inputElement;
        if (type === 'url') {
            inputElement = document.createElement('input');
            inputElement.type = 'text';
            inputElement.name = 'urls[]';
            inputElement.placeholder = 'Enter URL';
            inputElement.className = 'form-control me-2';
        } else if (type === 'file') {
            inputElement = document.createElement('input');
            inputElement.type = 'file';
            inputElement.name = 'files[]';
            inputElement.className = 'form-control me-2';
        }

        const deleteButton = document.createElement('button');
        deleteButton.type = 'button';
        deleteButton.className = 'btn btn-sm btn-outline-danger';
        deleteButton.innerHTML = `
            <svg class="icon-22" width="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M14.3955 9.59497L9.60352 14.387" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.3971 14.3898L9.60107 9.59277" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3345 2.75024H7.66549C4.64449 2.75024 2.75049 4.88924 2.75049 7.91624V16.0842C2.75049 19.1112 4.63549 21.2502 7.66549 21.2502H16.3335C19.3645 21.2502 21.2505 19.1112 21.2505 16.0842V7.91624C21.2505 4.88924 19.3645 2.75024 16.3345 2.75024Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            `;
        deleteButton.onclick = () => inputWrapper.remove();

        inputWrapper.appendChild(inputElement);
        inputWrapper.appendChild(deleteButton);
        container.appendChild(inputWrapper);
    }
</script>
