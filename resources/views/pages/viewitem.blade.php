@extends('layouts.app')

@section('content')

<h1 class="text-center mb-10">Update Item</h1>
    <div class="container ">
        <div class="row justify-content-center">

         <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="/updateitem/{{ $barang->id }}" method="POST" >
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Product Name</label>
                            <input type="text" value="{{ $barang->namabarang }}" name="namabarang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-4 row">
                            <div class="form-group col-md-3">
                              <label for="inputharga">Price</label>
                              <input type="text" class="form-control" id="inputharga" name="harga" value="{{ $barang->harga }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputState">Category</label>
                                <select id="inputState" class="form-control" name="category_id" >
                                  @foreach ($categories as $category)
                                  <option value="{{ $category->id}}" {{ $barang->category_id == $category->id ? 'selected':''}}>
                                    {{ $category->name}}
                                </option>
                                  @endforeach
                                </select>
                              </div>
                            <div class="form-group col-md-3">
                              <label for="inputid">Item ID</label>
                              <input type="DISABLE" class="form-control" id="inputid" name="itemid" value="LP{{ $barang->itemid }}" disabled>
                            </div>
                          </div>
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">Stock</label>
                            <input type="text" value="{{ $barang->stok }}" name="stok" class="form-control"  aria-describedby="emailHelp">
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">Description</label>
                            <input type="text" value="{{ $barang->keterangan }}" name="keterangan" class="form-control"  aria-describedby="emailHelp">
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">Images</label>
                            <input type="file" value="{{ $barang->images }}" name="images" class="form-control"  aria-describedby="emailHelp" >
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                </div>
            </div>
         </div>
        </div>
    </div>
@endsection
