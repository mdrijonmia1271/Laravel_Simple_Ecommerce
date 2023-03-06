@extends('layout')

@section('body')
    <div class="main-content-inner pt-4">
        <div class="row">
            <div class="col-md-12  ">
                <div style="overflow-x:auto;" data-aos="fade-up" class="shadow bg-white  py-5 px-4">

                    <form action="{{ route('add.packet.form') }}" method="post">
                        @csrf
                        <h5>Add Products Packet</h5>
                        <table style="width:100%" class="current-data-table">
                            <tr>
                                <th>Packet Name:</th>
                                <td>
                                    <br>
                                    <input type="text" name="packet_name" placeholder="Packet Name">
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
                                <th>Packet Description:</th>
                                <td>
                                    <br>
                                    <textarea cols="50" name="packet_description" placeholder="Packet Description"></textarea>
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
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                        <!-- </div> -->

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
