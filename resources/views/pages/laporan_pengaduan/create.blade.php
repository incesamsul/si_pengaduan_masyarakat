@extends('layouts.v_template')

@section('content')
    <section class="section">

        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header">
                        <h4>Tambah Laporan pengaduan</h4>
                        <a href="{{ URL::to('/laporan_pengaduan') }}" class="span span-primary">
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        @if ($id)
                            <form method="post" action="{{ URL::to('/laporan_pengaduan/update') }}"
                                enctype="multipart/form-data">
                                @method('put')
                            @else
                                <form method="post" action="{{ URL::to('/laporan_pengaduan/store') }}"
                                    enctype="multipart/form-data">
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="judul_pengaduan">Judul pengaduan</label>
                            <input type="hidden" name="id" value="{{ $id }}">
                            <input value="{{ $id ? $edit->judul_pengaduan : '' }}" required type="text"
                                class="form-control main-radius mt-2" name="judul_pengaduan">
                        </div>
                        <div class="form-group">
                            <label for="detail_pengaduan">Detail pengaduan</label>
                            <textarea required name="detail_pengaduan" id="detail_pengaduan" cols="30" rows="10"
                                class="form-control main-radius">{{ $id ? $edit->detail_pengaduan : '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="gambar">gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control main-radius">
                        </div>
                        <div class="form-group">
                            <button class="main-radius btn bg-main text-white">
                                Simpan
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </section>
@endsection
@section('script')
    <script>
        $('#liBantuan').addClass('active');
    </script>
@endsection
