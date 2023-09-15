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
                        <form method="post" action="{{ URL::to('/laporan_pengaduan/store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="judul_pengaduan">Judul pengaduan</label>
                                <input required type="text" class="form-control main-radius mt-2" name="judul_pengaduan">
                            </div>
                            <div class="form-group">
                                <label for="detail_pengaduan">Detail pengaduan</label>
                                <textarea required name="detail_pengaduan" id="detail_pengaduan" cols="30" rows="10"
                                    class="form-control main-radius"></textarea>
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
