@extends('layouts.v_template')

@section('content')
    <section class="section">

        <div class="row">
            <div class="col-lg-12">
                @foreach ($pengaduan as $row)
                    <div class="card ">
                        <div class="card-header d-flex flex-column justify-content-start align-items-start">
                            <h4> {{ $row->judul_pengaduan }}</h4>
                            <p><small>{{ $row->detail_pengaduan }}</small></p>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('data/gambar_pengaduan/' . $row->gambar) }}" alt=""
                                class="img-thumbnail">
                            <div class="p-5 timeline-wrapper">
                                @if ($row->status == 'selesai')
                                    <ul class="timeline">
                                        @include('pages.laporan_pengaduan.proses', [
                                            'status' => 'selesai',
                                            'date' => '',
                                        ])
                                    </ul>
                                @endif
                                @if ($row->status == 'pengerjaan')
                                    <ul class="timeline">
                                        @include('pages.laporan_pengaduan.proses', [
                                            'status' => 'pengerjaan',
                                            'date' => '',
                                        ])
                                    </ul>
                                @endif
                                @if ($row->status == 'proses')
                                    <ul class="timeline">
                                        @include('pages.laporan_pengaduan.proses', [
                                            'status' => 'proses',
                                            'date' => '',
                                        ])
                                    </ul>
                                @endif
                                @if ($row->status == 'pending' || $row->status == '')
                                    <ul class="timeline">
                                        @include('pages.laporan_pengaduan.proses', [
                                            'status' => 'pending',
                                            'date' => '',
                                        ])
                                    </ul>
                                @endif
                            </div>
                        </div>
                        @if (auth()->user()->role == 'Administrator')
                            <div class="card-footer">
                                <div class="button">
                                    <a href="{{ URL::to('/status_laporan/update/proses/' . $row->id) }}"
                                        class="btn btn-outline-primary">Proses</a>
                                    <a href="{{ URL::to('/status_laporan/update/pengerjaan/' . $row->id) }}"
                                        class="btn btn-outline-primary">Pengerjaan</a>
                                    <a href="{{ URL::to('/status_laporan/update/selesai/' . $row->id) }}"
                                        class="btn btn-outline-primary">Selesai</a>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>



    </section>
@endsection
@section('script')
    <script>
        $('#liStatusLaporan').addClass('active');
    </script>
@endsection
