@extends('layouts.v_template')

@section('content')
    <section class="section">

        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header">
                        <h4>Laporan pengaduan</h4>
                        <a href="{{ URL::to('/laporan_pengaduan/create') }}" class="span span-primary">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="table-data">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul pengaduah</th>
                                    <th>Detail pengaduah</th>
                                    <th>Lokasi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($laporan_pengaduan as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->judul_pengaduan }}</td>
                                        <td>{{ $row->detail_pengaduan }}</td>
                                        <td>
                                            <a href="" class="badge badge-primary">Lihat</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
