@extends('layouts.app')

@section('content')

{{-- Navbar --}}
@include('components.navbar')

<div class="container py-5">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold text-primary mb-0">Daftar Pengguna</h1>
            <p class="text-muted">Menampilkan seluruh data pengguna sistem</p>
        </div>

        <a href="{{ route('user.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-person-plus-fill"></i> Tambah Pengguna
        </a>
    </div>

    {{-- Card Container --}}
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body">
            {{-- Komponen tabel user --}}
            <x-user-table :users="$users" />
        </div>
    </div>

</div>

{{-- Footer --}}
@include('components.footer')

@endsection
