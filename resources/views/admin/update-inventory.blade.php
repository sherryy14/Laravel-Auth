@extends('admin.layout.app')
@section('title')
    Update Inventory
@endsection
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Update Inventory</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Update Inventory
                                    </li>
                                </ol>
                            </nav>
                        </div>

                        {{-- <div class="col-md-6 col-sm-12 d-flex justify-content-end">
                            <a class="btn btn-primary mx-2" href="#">
                                Update Inventory
                            </a>
                            <div class="dropdown">
                                <a class="btn btn-primary dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown">
                                    Export AS
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('download_product_csv') }}">CSV</a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <!-- basic table  Start -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="pd-20 card-box mb-30">
                    <h4 class="text-blue h4">Update Inventory CSV</h4>
                    <div class="clearfix mb-20">

                        <form action="{{ route('update.inventory') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <input type="submit" value="Update" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </form>



                    </div>


                </div>
                <div class="pagination-container">

                </div>
                <!-- basic table  End -->
            @endsection
