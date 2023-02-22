@extends('layout.main')

@section('isi')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
    @section('judul')
        Tambah Product
    @endsection
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="{{ url('produk') }}">Back</a>
        </div>
        <form action="">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Name Product</label>
                    <input type="text" name="name" class="form-control form-control-user"
                        placeholder="Input the name" autofocus>
                </div>
                <div class="form-group">
                    <label for="">Detail Product</label>
                    <input type="text" name="detail" class="form-control form-control-user"
                        placeholder="Input the detail...">
                </div>
                <div class="form-group">
                    <label for="">Image Product</label>
                    <input type="file" name="image" class="form-control form-control-user"
                        placeholder="Input the image">
                </div>
                <div class="text-right">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
