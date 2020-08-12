@extends('Admin.layouts.mainapp')
@section('tittle','dashboard')
@section('dashboard','active')

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Sub Category</h4>
                </div>
                <div class="card-body">
                  <form actiom="{{route('admin::post_subcategory')}} " method="Post">
                  	@csrf
                  	 <div class="row">
                  	 	<div class="col-75">
                  	 		<select id="select" name="Category"  >
                  	 			<option><----------selected------------></option>
                  	 			@foreach($cate as $value)
                       	 			<option value="{{$value->id}}">{{$value->categoryname}}</option>
                       	 		@endforeach
                			</select>                  
                		</div>
            		</div><br>
                  	<div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">SubCategory List</label>
                          <input type="text" name="subcategory_list" class="form-control">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-body">
                  <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>SUBCATEGORY_LIST</th>
                      </thead>
                      <tbody>
                      <tr>
                      	<th>Foods</th>
                      </tr>
                      @foreach($subcate as $value)
                      @if($value->parent_id ==1)
                        <tr>
                        <td>{{$value->id}}</td> 
                        <td>{{$value->subcategory_list}}</td>
                        </tr>
                        @endif
                        @endforeach
                        <tr>
                      		<th>Rooms</th>
                      	</tr>
                      	@foreach($subcate as $value)
	                      @if($value->parent_id ==2)
	                        <tr>
	                        <td>{{$value->id}}</td> 
	                        <td>{{$value->subcategory_list}}</td>
	                        </tr>
	                        @endif
                        @endforeach
                        
                      </tbody>
                    </table>
                </div>
              </div>
            </div>

        </div>
        </div>
      </div>
@endsection
