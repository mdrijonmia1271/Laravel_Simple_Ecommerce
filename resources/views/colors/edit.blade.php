@extends('layout')

@section('body')
    <div class="main-content-inner pt-4">
        <div class="row">
            <div class="col-md-12  ">
                <div style="overflow-x:auto;" data-aos="fade-up" class="shadow bg-white  py-5 px-4">

                    <form action="{{ url('/color/update/'.$colories->id) }}" method="post">
                        @csrf
                        <h5>Update Products Color</h5>
                        <table style="width:100%" class="current-data-table">
                            <tr>
                                <th>Color Name:</th>
                                <td>
                                    <br>
                                    <input type="text" name="color_name" value="{{ $colories->color_name }}">
                                    <br>
                                    @error('color_name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror

                                </td>
                            </tr>
                            <br>
                            <tr>
                                <th>Sub Category Name:</th>
                                <td>
                                    <select name="sub_category_id">
                                        <option value="">-- Select Option --</option>
                                        @foreach ($subCategories as $subCategory)
                                            {{-- <option value="{{ $category->id }}" {!! $subCategory->categories_id == $category->id ? "selected='selected'" : '' !!}>{{ $category->category_name }}</option>                                    --}}
                                            <option value="{{ $subCategory->id }}"{{ $subCategory->id == $colories->sub_category_id ? 'selected' : '' }}>{{ $subCategory->sub_category_name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    @error('sub_category_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Color Description:</th>
                                <td>
                                    <br>
                                    <textarea cols="50" name="color_description">{{ $colories->color_description }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td><label class="switch">
                                        <input type="checkbox" name="status">
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <!-- <input type="checkbox" name="status" value="status" > -->
                            </tr>
                        </table>
                        <!-- <div class="col-6 categorySubmit "> -->
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>

                        <!-- </div> -->

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
