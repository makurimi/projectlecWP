@extends('layouts.app')

@section('content')
<h1 class="text-center mb-10">Insert Item </h1>
    <div class="container ">
        <div class="row justify-content-center">
         <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="/iteminserted" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 col-md-10">
                            <label for="exampleInputEmail1" class="form-label">Product Name</label>
                            <input type="text"name="namabarang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-4 row">
                                <div class="form-group col-md-3">
                                  <label for="harga">Price</label>
                                  <input type="text" class="form-control" id="inputprice" name="harga">
                                </div>
                                <div class="form-group col-md-3">
                                  <label for="inputState">Category</label>
                                    <select id="inputState" class="form-control" name="category_id" >
                                        @foreach ($categories as $category)
                                            <option selected value="{{ $category->id}}">{{ $category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                  <label for="inputid">Item ID</label>
                                  <input type="text" class="form-control" id="inputid" name="itemid" value="">
                                </div>
                              </div>

                        <div class="mb-4 col-md-10">
                            <label for="exampleInputEmail1" class="form-label">Stock</label>
                            <input type="number" min="0" step="1" class="form-control" name="stock" id="amountInput" >
                          </div>
                        <div class="mb-4 col-md-10">
                            <label for="exampleInputEmail1" class="form-label">Description</label>
                            <input type="text" name="keterangan"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>
                        <div class="mb-4 col-md-10">
                            <label for="exampleInputEmail1" class="form-label">Images</label>
                            <input type="file"name="images" class="form-control"  aria-describedby="emailHelp">
                        </div>

                        <button type="submit" class="btn btn-primary">Insert</button>
                      </form>
                </div>
            </div>
         </div>
        </div>
    </div>


@endsection
