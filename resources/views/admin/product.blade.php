@extends('admin.layout.app')
@section('title')
    Products
@endsection
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Products</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Products
                                    </li>
                                </ol>
                            </nav>
                        </div>

                        <div class="col-md-6 col-sm-12 d-flex justify-content-end">
                            {{-- <a class="btn btn-primary mx-2" href="{{ route('product-inventory.view') }}">
                                Update Inventory
                            </a> --}}
                            <div class="dropdown">
                                <a class="btn btn-primary dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown">
                                    Export AS
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('download_product_csv') }}">CSV</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- basic table  Start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix mb-20">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Products List</h4>
                        </div>

                    </div>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Style Code</th>
                                <th scope="col">SKU #</th>
                                <th scope="col">Product Count</th>
                                <th scope="col">Price</th>
                                <th scope="col">Maintain Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $item)
                                <tr>
                                    <th><img src="{{ $item->domain }}{{ $item->front_of_image_name }}" width="150" height="150" alt=""></th>
                                    <td>{{ $item->style_code }}</td>
                                    <td>{{ $item->sku }}</td>
                                    <td>{{ $item->product_count }}</td>
                                    <td>{{ $item->piece_price }}</td>
                                    <td>{{ $item->maint_date }}</td>
                                    <td>
                                        <a href="{{ route('product.single', ['id' => $item->style_code]) }}"
                                            class="btn btn-sm btn-secondary">View</a>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
                <div class="pagination-container">
                    {!! $product->links('admin.pagination') !!}
                </div>
                <!-- basic table  End -->
            @endsection
