@extends('layouts.app')

@section('content')
<h1 class="text-center mb-10 mt-2">PRODUCT </h1>
<div class="container">
    <a href="/additem" class="btn btn-success mb-3">Insert Item</a>
    <div class="row">
        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
           {{ $message }}
          </div>
        @endif

<table class="table table-striped mt-10">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Images</th>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">Category</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($barang as $key=>$row )
        <tr>
            <th scope="row">{{ $barang->firstItem() + $key }}</th>

            <td>
                <img src="{{ asset('img/'.$row->images) }}" style="width: 50px" alt="">
            </td>
            <td>{{ $row->namabarang }}</td>
            <td><strong>Rp. </strong>{{ number_format($row->harga) }}</td>
            <td>{{ $row->category->name }}</td>
            <td>{{ $row->keterangan }}</td>

            <td>
              <a href="/viewitem/{{ $row->id }}" class="btn btn-primary bi bi-pencil-square mb-1"></a>
              <a href="/deleteitem/{{ $row->id }}"class="btn btn-danger bi bi-trash3"></a>
            </td>
          </tr>

        @endforeach

      </tbody>
    </table>
    </div>
</div>
<div>
<div class="d-flex justify-content-start">
    Showing
    {{ $barang->firstItem() }}
    to
    {{ $barang->lastItem() }}
    of
    {{ $barang->total() }}

</div>
<div class="d-flex justify-content-end">
    <p class="bg-dark">{{ $barang->links() }}</p>
</div>
</div>

@endsection
