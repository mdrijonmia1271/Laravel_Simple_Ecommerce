@extends('layout')

@section('body')
    <div class="main-content-inner pt-4">
        <div class="row">
            <div class="col-md-12  ">
                <div style="overflow-x:auto;" data-aos="fade-up" class="shadow bg-white  py-5 px-4">

                    <form action="{{ url('packet/update/'.$packets->id) }}" method="post">
                        @csrf
                        <h5>Update Products Packet</h5>
                        <table style="width:100%" class="current-data-table">
                            <tr>
                                <th>Packet Name:</th>
                                <td>
                                    <br>
                                    <input type="text" name="packet_name" value="{{ $packets->packet_name }}">
                                    <br>
                                    @error('packet_name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror

                                </td>
                            </tr>
                            <br>
                            <tr>
                                <th>Size Name:</th>
                                <td>
                                    <select name="size_id">
                                        <option value="">-- Select Option --</option>
                                        @foreach ($sizes as $size)
                                            {{-- <option value="{{ $category->id }}" {!! $subCategory->categories_id == $category->id ? "selected='selected'" : '' !!}>{{ $category->category_name }}</option>                                    --}}
                                            <option value="{{ $size->id }}"{{ $size->id == $packets->size_id ? 'selected' : '' }}>{{ $size->size_name }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                    @error('size_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th>Packet Description:</th>
                                <td>
                                    <br>
                                    <textarea cols="50" name="packet_description">{{ $packets->packet_description }}</textarea>
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
