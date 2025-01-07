@extends('products.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                   Informasi Produk
                </div>
                <div class="float-end">
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="nim" class="col-md-4 col-form-label text-md-end text-start"><strong>NIM:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $mahasiswa->nim }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Nama:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $mahasiswa->nama }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="jurusan" class="col-md-4 col-form-label text-md-end text-start"><strong>Jurusan:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $mahasiswa->jurusan }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="alamat" class="col-md-4 col-form-label text-md-end text-start"><strong>Alamat:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $mahasiswa->alamat }}
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection