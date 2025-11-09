@extends('layouts.app')

@section('content')
<style>
    .action-buttons .btn {
        transition: all 0.3s ease;
        border-radius: 50px;
        padding: 0.5rem 1rem;
        font-weight: 600;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .action-buttons .btn-edit {
        background: linear-gradient(45deg, #ffc107, #ff9800);
        border: none;
        color: white;
    }
    .action-buttons .btn-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(255, 152, 0, 0.4);
    }
    .action-buttons .btn-delete {
        background: linear-gradient(45deg, #dc3545, #b21f2d);
        border: none;
        color: white;
    }
    .action-buttons .btn-delete:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(220, 53, 69, 0.4);
    }
    .alert-floating {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1050;
        min-width: 300px;
    }
</style>

{{-- Navbar --}}
@include('components.navbar')

<div class="container py-5">

    {{-- Floating Alert Notifications --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show alert-floating" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        <strong>Sukses!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show alert-floating" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        <strong>Error!</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

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
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NPM</th>
                            <th scope="col">Kelas</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $user->nama }}</td>
                                <td>{{ $user->nim }}</td>
                                <td>{{ $user->nama_kelas }}</td>
                                <td class="text-center action-buttons">
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-edit btn-sm me-2">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete btn-sm">
                                            <i class="bi bi-trash3-fill"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">Belum ada data pengguna.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

{{-- Footer --}}
@include('components.footer')

@push('scripts')
<script>
    // Auto-hide alerts after 5 seconds
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 5000);
</script>
@endpush
@endsection
