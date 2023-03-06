
@extends('layout')

@section('body')
<div class="main-content-inner pt-4">
        <div class="row" >
          <div class="col-md-12  " >
            <div style="overflow-x:auto;" data-aos="fade-up" class="shadow bg-white  py-5 px-4">

           <form action="{{ route('addsubcategory.form') }}" method="post" >
            @csrf
              <h5>Products Sub Category</h5>
              <table style="width:100%" class="current-data-table" > 
                <tr>
                  <th>Sub Category Name:</th>
                  <td>
                    <br>
                  <input type="text" name="sub_category_name"  placeholder="Category Name">
                  <br>
                  @error('sub_category_name')
                    <strong class="text-danger">{{ $message }}</strong>
                  @enderror
                  
                </td>
                </tr>
                <br>
                    <tr>
                        <th>Category Name:</th>
                        <td>
                            <select name="category_id">
                                <option value="">-- Select Category --</option>                                   
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
                  <th>Category Description:</th>
                  <td>
                      <br>
                    <textarea cols="50" name="sub_category_description" placeholder="Sub Category Description"></textarea>
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