@extends('admin.layout.app')
@section('title')
    Single Product
@endsection
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Product</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Product
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                            <div class="dropdown">
                                <a class="btn btn-primary dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown">
                                    Export AS
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('download_product_single_csv', ['id' => $style_code->style_code]) }}">CSV</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- basic table  Start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix mb-20">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Style Code: {{ $style_code->style_code }}</h4>
                        </div>
                    </div>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                {{-- <th scope="col">Product</th> --}}
                                <th scope="col">SKU #</th>
                                <th scope="col">Price</th>
                                <th scope="col">Color Name</th>
                                <th scope="col">Color</th>
                                <th scope="col">Size</th>
                                <th scope="col">Weight</th>
                                <th scope="col">Carton Size</th>
                                <th scope="col">Max Inventory</th>
                                <th scope="col">Maintain Date</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $item)
                                <tr>
                                    {{-- <th><img src="{{ $item->domain }}{{ $item->front_of_image_name }}" width="150" height="150" alt=""></th> --}}
                                    <td>{{ $item->sku }}</td>
                                    <td>{{ $item->piece_price }}</td>
                                    <td>{{ $item->color_name }}</td>
                                    <td>
                                        @if ($item->hex_code)
                                            @foreach (explode(',', $item->hex_code) as $color)
                                                <div
                                                    style="display:inline-block; width:20px; height:20px; background-color:#{{ $color }}; border:1px solid #000;">
                                                </div>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>{{ $item->size_name }}</td>
                                    <td>{{ $item->weight }}</td>
                                    <td>{{ $item->carton_length }} x {{ $item->carton_width }} x {{ $item->carton_height }}
                                    </td>
                                    <td>{{ $item->max_inventory }}</td>
                                    <td>{{ $item->maint_date }}</td>


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
