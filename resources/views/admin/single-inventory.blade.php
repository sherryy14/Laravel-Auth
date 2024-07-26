@extends('admin.layout.app')
@section('title')
    Single Inventory
@endsection
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Inventory</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Inventory
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
                                    <a class="dropdown-item" href="{{ route('download_inventory_single_csv', ['id' => $sku->sku]) }}">CSV</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- basic table  Start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix mb-20">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Inventory On SKU: {{$sku->sku}}</h4>
                        </div>
                    </div>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">SKU #</th>
                                <th scope="col">GTIN</th>
                                <th scope="col">SKU-ID Master</th>
                                <th scope="col">Style ID</th>
                                <th scope="col">WarehouseAbbr</th>
                                <th scope="col">SKU-ID</th>
                                <th scope="col">Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventory as $item) <!-- Make sure you pass 'inventories' to the view -->
                                <tr>
                                    <th scope="row">{{ $item->sku }}</th>
                                    <td>{{ $item->gtin }}</td>
                                    <td>{{ $item->skuID_Master }}</td>
                                    <td>{{ $item->styleID }}</td>
                                    <td><span class="badge badge-primary">{{ $item->warehouseAbbr }}</span></td>
                                    <td>{{ $item->skuID }}</td>
                                    <td>{{ $item->qty }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pagination-container">
                    {!! $inventory->links('admin.pagination') !!}
                </div>
                <!-- basic table  End -->

@endsection
