@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Data Menu</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Data</a></div>
        <div class="breadcrumb-item"><a href="#">Menu</a></div>
        <div class="breadcrumb-item">Index</div>
    </div>
    </div>
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('menuAdd') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-database"></i> Tambah Data</a>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kantin</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $categories = \App\Menu::all();
                    @endphp
                    @foreach($categories as $res)
                    @php
                        $kantin = \App\Kantin::where('id', $res->id_kantin)->value('nama_kantin');
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kantin }}</td>
                        <td>{{ $res->nama }}</td>
                        <td>{{ $res->kategori }}</td>
                        <td>{{ $res->stok }}</td>
                        <td>{{ $res->gambar }}</td>
                        <td>{{ $res->harga }}</td>
                        <td>
                            <a href="{{ route('menuEdit', $res->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="#" data-uri="{{ route('menuDelete', $res->id) }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteCModal">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>

        @if(session('alertHapus'))
            <script>
                iziToast.success({
                    title: 'Berhasil menghapus Data!',
                    message: "{{ session('alertHapus') }}",
                    position: 'bottomRight'
                });
            </script>
        
        @elseif(session('alertEdit'))
            <script>
                iziToast.success({
                    title: 'Berhasil mengedit Data!',
                    message: "{{ session('alertEdit') }}",
                    position: 'bottomRight'
                });
            </script>
        
        @elseif(session('alertTambah'))
            <script>
                iziToast.success({
                    title: 'Berhasil menambah Data!',
                    message: "{{ session('alertTambah') }}",
                    position: 'bottomRight'
                });
            </script>
        
        @endif
@endsection