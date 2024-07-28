@extends('layouts.app')
@section('title', 'Edu Class | User List')
@section('content')

<div class="container-fluid content-inner mt-n5 py-0">
    @if(session('success'))
        <div class="alert alert-success" id="success-alert-fjr">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <form action="{{ route('classes.index') }}" method="GET" class="d-flex mb-2">                            
                            <input type="text" name="search" class="form-control me-2" placeholder="Search by class name..." value="{{ request()->query('search') }}">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
        @if ($classes->isEmpty())
            <div class="col-12">
                <div class="alert alert-warning">
                    Maaf Kelas Tersebut Belum Tersedia Saat ini.
                </div>
            </div>
        @else
            @foreach ($classes as $class)
                <div class="col">
                    <div class="mb-0 card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $class->name }}</h5>
                            <p class="card-text">{{ $class->desc }}</p>
                            <a href="{{ route('classes.show', $class->id) }}" class="btn btn-warning mt-2">Edit Kelas</a>
                            <form action="{{ route('classes.destroy', $class->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{$class->id}}">
                                <button type="submit" class="btn btn-danger mt-2" onclick="return confirm('Apakah Yakin Ingin Menghapus Kelas Ini ?')">Delete</button>
                            </form>
                        </div>
                        <div class="card-footer text-muted">
                            {{ $class->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="mt-5">
        {{ $classes->appends(['search' => request()->query('search')])->links('pagination::bootstrap-4') }}
    </div>
</div>

<script>
    setTimeout(function() {
        var alert = document.getElementById('success-alert-fjr');
        if (alert) {
            alert.style.display = 'none';
        }
    }, 10000);
</script>
@endsection
