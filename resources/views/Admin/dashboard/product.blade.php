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
                  <h4 class="card-title">Product</h4>
                </div>
                <div class="card-body">
                  <form action="{{route('admin::post_product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Product Name</label>
                          <input type="text" class="form-control" name="productname">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Product Quantity</label>
                          <input type="text" class="form-control" name="product_quantity">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Price</label>
                          <input type="text" class="form-control" name="price">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <select id="select_category" name="Category"  >
                  	 			<option><----------selected Category------------></option>
                          @foreach($cates as $value)
                              <option value="{{$value->id}}">{{$value->categoryname}}</option>
                            @endforeach
                  	 		
                			</select> 
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <select id="select" name="subcategory"  >
                  	 			<option><----------selected Subcategory--------></option>
                  	 			
                			</select> 
                        </div>
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="input-group control-group increment" >
                          <input type="file" name="filenames" class="form-control" multiple>
                          
                        </div>
                      </div>
                      </div><br>
                      <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Description</label>
                          <div class="form-group">
                            
                            <textarea class="form-control" name="description" rows="5"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                      
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
@endsection