@extends('layout.main')

@section('judul')
    Dashboad Admin
@endsection

@section('isi')
    <div class="col-lg-12">
        <div class="card shadow mb-12">
            <div class="card-body text-right">
                <a href="#" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">{{ $user->name }}</span>
                </a>
            </div>
        </div>
    </div>
@endsection
