@extends('layout')

@section('body')
    <div class="main-content-inner pt-4">
        <div class="row pb-3 pt-3">
            <div class="col-md-3 col-sm-3">
                <h4 style="margin-bottom: 0;">All Products</h4>
            </div>
            <div class="col-md-10 col-sm-10"> </div>
        </div>
        @if (session('update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('update') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('delete'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('delete') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row" data-aos="fade-up">
            <div class="col-md-12">
                <div class="recentUser">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row pt-4 pb-4 px-2">
                                <div class="col-md-12">
                                    <div class="product-add-btn">
                                        <a href="{{ route('add.product') }}" class="add-user">Add Product</a>
                                    </div>
                                    <!-- This is table data show start -->
                                    <table class="table"">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Category Name</th>
                                                <th scope="col">Sub Category Name</th>
                                                <th scope="col">Color Name</th>
                                                <th scope="col">Size Name</th>
                                                <th scope="col">Packet Name</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Create Date</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $serial = 1;
                                            @endphp
                                            @foreach ($allProducts as $allProduct)
                                                <tr>
                                                    <th scope="row">{{ $serial++ }}</th>
                                                    <td>{{ $allProduct->product_name }}</td>
                                                    <td>{{ $allProduct->category->category_name }}</td>
                                                    <td>{{ $allProduct->subcategory->sub_category_name }}</td>
                                                    <td>{{ $allProduct->colors->color_name }}</td>
                                                    <td>{{ $allProduct->sizes->size_name }}</td>
                                                    <td>{{ $allProduct->packets->packet_name }}</td>
                                                    <td>{{ $allProduct->quantity }}</td>
                                                    <td>{{ $allProduct->create_date }}</td>
                                                    <td>
                                                        <a href="{{ url('product/edit/' . $allProduct->id) }}" type="button"
                                                            class="btn btn-sm btn-outline-primary">Edit</a>
                                                        <a href="{{ url('product/delete/' . $allProduct->id) }}"
                                                            onclick="return confirm('Are you sure to delete')"
                                                            type="button" class="btn btn-sm btn-outline-danger">Delete</a>
                                                        {{-- <a href="{{ route('deleteCategory', $row->id) }}" onclick="return confirm('Are you sure to delete')" type="button" class="btn btn-sm btn-outline-danger">Delete</a> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- This is table data show start -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
