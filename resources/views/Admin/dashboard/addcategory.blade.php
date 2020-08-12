@extends('Admin.layouts.mainapp')
@section('tittle','dashboard')
@section('dashboard','active')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Category</h4>
                  
                </div>
                <div class="card-body">
                  <form action="{{route('admin::post_addcategory')}} " method="post">
                  	@csrf
                                       
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category Name</label>
                          <input type="text" name="categoryname" class="form-control">
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
                        <th>Categoryname</th>
                      </thead>
                      <tbody>
                      @foreach($categorys as $value)
                        <tr>
                        <td>{{$value->id}}</td> 
                        <td>{{$value->categoryname}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  
                  
                 
                </div>
              </div>
            </div>
	</div>
	
</div>
@endsection
