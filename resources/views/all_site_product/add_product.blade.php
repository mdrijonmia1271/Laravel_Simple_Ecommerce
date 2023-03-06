@extends('layout')

@section('body')
    <div class="main-content-inner pt-4">
        <div class="row">
            <div class="col-md-12  ">
                <div style="overflow-x:auto;" data-aos="fade-up" class="shadow bg-white  py-5 px-4">

                    <form action="{{ route('add.productForm') }}" method="post">
                        @csrf
                        <h5>Add Product</h5>
                        <table style="width:100%" class="current-data-table">
                            <tr>
                                <th>Product Name:</th>
                                <td>
                                    <br>
                                    <input type="text" name="product_name" placeholder="Product Name">
                                    <br>
                                    @error('product_name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror

                                </td>
                            </tr>
                            <br>
                            <tr>
                                <th>Category Name:</th>
                                <td>
                                    <select name="category_id">
                                        <option value="">-- Select Option --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    @error('category_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Sub Category Name:</th>
                                <td>
                                    <select name="sub_category_id">
                                        <option value="">-- Select Option --</option>
                                        @foreach ($subCategories as $subCategory)
                                            <option value="{{ $subCategory->id }}">{{ $subCategory->sub_category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <br>
                                    @error('sub_category_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Color Name:</th>
                                <td>
                                    <select name="color_id">
                                        <option value="">-- Select Option --</option>
                                        @foreach ($colories as $color)
                                            <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    @error('color_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Size Name:</th>
                                <td>
                                    <select name="size_id">
                                        <option value="">-- Select Option --</option>
                                        @foreach ($sizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->size_name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    @error('size_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Packet Name:</th>
                                <td>
                                    <select name="packet_id">
                                        <option value="">-- Select Option --</option>
                                        @foreach ($packets as $packet)
                                            <option value="{{ $packet->id }}">{{ $packet->packet_name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    @error('packet_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Quantity:</th>
                                <td>
                                    <br>
                                    <input type="text" name="quantity" placeholder="Enter Quantity">
                                    <br>
                                    @error('quantity')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror

                                </td>
                            </tr>
                            <tr>
                                <th>Product Description:</th>
                                <td>
                                    <br>
                                    <textarea cols="50" name="product_description" placeholder="Product Description"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td><label class="switch">
                                        <input type="checkbox" name="status">
                                        <span class="slider round"></span>
                                    </label></td>
                                <!-- <input type="checkbox" name="status" value="status" > -->
                            </tr>
                        </table>
                        <!-- <div class="col-6 categorySubmit "> -->
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                        <!-- </div> -->

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
