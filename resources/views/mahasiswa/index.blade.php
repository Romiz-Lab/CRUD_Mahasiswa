@extends('products.layouts')

@section('content')
<div class="row justify-content-center mt-3">
    <div class="col-md-12">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">Daftar Mahasiswa</div>
            <div class="card-body">
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Tambah Mahasiswa</a>

                <!-- Search form -->
                <form action="{{ route('mahasiswa.index') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Cari mahasiswa..." value="{{ $search ?? '' }}">
                        <button class="btn btn-outline-secondary" type="submit">Cari</button>
                    </div>
                </form>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mahasiswas as $mahasiswa)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $mahasiswa->nim }}</td>
                            <td>{{ $mahasiswa->nama }}</td>
                            <td>{{ $mahasiswa->jurusan }}</td>
                            <td>{{ $mahasiswa->alamat }}</td>
                            <td>
                                <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">
                                <p class="text-center">Tidak ada data mahasiswa.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $mahasiswas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection