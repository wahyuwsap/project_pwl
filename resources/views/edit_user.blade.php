@extends('layouts.app')

@section('content')

{{-- Navbar --}}
@include('components.navbar')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">Edit Pengguna</h1>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
    </div>

    {{-- Display Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h5 class="alert-heading"><i class="bi bi-exclamation-triangle-fill"></i> Terjadi Kesalahan Validasi:</h5>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama" class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama', $user->nama) }}" required>
                </div>

                <div class="mb-3">
                    <label for="npm" class="form-label fw-semibold">NPM</label>
                    <input type="text" id="npm" name="npm" class="form-control" value="{{ old('npm', $user->nim) }}" required>
                </div>

                <div class="mb-3">
                    <label for="kelas_id" class="form-label fw-semibold">Kelas</label>
                    <select name="kelas_id" id="kelas_id" class="form-select" required>
                        @foreach ($kelas as $kelasItem)
                            <option value="{{ $kelasItem->id }}" {{ old('kelas_id', $user->kelas_id) == $kelasItem->id ? 'selected' : '' }}>{{ $kelasItem->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Footer --}}
@include('components.footer')

@endsection