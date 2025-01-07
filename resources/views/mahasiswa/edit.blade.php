@extends('products.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Mahasiswa
                </div>
                <div class="float-end">
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start">Nim</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ $mahasiswa->nim }}">
                            @if ($errors->has('nim'))
                                <span class="text-danger">{{ $errors->first('nim') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama" class="col-md-4 col-form-label text-md-end text-start">Nama</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $mahasiswa->nama }}">
                            @if ($errors->has('nama'))
                                <span class="text-danger">{{ $errors->first('nama') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="jurusan" class="col-md-4 col-form-label text-md-end text-start">Jurusan</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" name="jurusan" value="{{ $mahasiswa->jurusan }}">
                            @if ($errors->has('jurusan'))
                                <span class="text-danger">{{ $errors->first('jurusan') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="alamat" class="col-md-4 col-form-label text-md-end text-start">Alamat</label>
                        <div class="col-md-6">
                          <input type="text" step="0.01" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ $mahasiswa->alamat }}">
                            @if ($errors->has('alamat'))
                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection