@extends('layout.main')

@section('isi')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
    @section('judul')
        Daftar User
    @endsection
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="{{ url('create') }}">Add Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Level</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($users as $key => $u)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->level }}</td>
                                <td>{{ $u->email }}</td>
                                <td>
                                    <a href="" class="btn btn-secondary">Edit</a>
                                    <a href="{{ route('show', $u->id) }}" class="btn btn-secondary">Detail</a>
                                    @csrf
                                    @method('DELETE')
                                    <a href="" class="btn btn-secondary" data-toggle="modal"
                                        data-target="#deleteModal">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
