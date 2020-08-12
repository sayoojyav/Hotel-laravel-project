@extends('Admin.layouts.mainapp')
@section('tittle','dashboard')
@section('dashboard','active')

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Simple Table</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>PRODUCT_Name</th>
                        <th>PRODUCT_QUANTITY</th>
                        <th>PRICE</th>
                        <th>CATEGORY</th>
                        <th>SUBCATEGORY</th>
                        <th>IMAGE</th>
                        <th>DESCRIPTION</th>
                      </thead>
                      <tbody>
                        @foreach($product as $data)
                        <tr>
                          <td>{{$data->id}}</td>
                          <td>{{$data->productname}}</td>
                          <td>{{$data->product_quantity}}</td>
                          <td>{{$data->price}}</td>
                          <td>{{$data->category}}</td>
                          <td>{{$data->subcategory}}</td>
                          <td>{{$data->image}}</td>
                          <td>{{$data->description}}</td>
                          @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
@endsection