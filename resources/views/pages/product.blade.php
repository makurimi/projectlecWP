@extends('layouts.app')

@section('content')

<style>
    body{
        background-color: #FFFAFA;
    }

    h5{
        text-align: left;
    }

.card .details .center h5 {
    margin: 0;
    padding: 0;
    line-height: 20px;
    font-size: 20px;
    text-transform: uppercase;
}
.card .details .center h5 p {
    font-size: 14px;
    color: #262626;
}
</style>
<div class="container">
    <div class="row mb-2">
        <div class="col">
            <nav aria-label="breadcrumb mt-2">
                <ol class="breadcrumb mt-2">
                    <li class="breadcrumb-item"><a href="/" class="text-dark text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List Laptop</li>
                </ol>
            </nav>
        </div>
    </div>
        <div class="col-md-3">
            <form action="{{ url('/product/search')}}" class="d-flex">
                <input type="search" class="form-control me-2" placeholder="Search" aria-label="search" name="search">
                <button class="btn btn-outline-dark bi bi-search" type="submit"></button>
            </form>
        </div>
    </div>

    <section class="products mt-2 mb-5">
       <div class="row mt-4">
          @foreach($barangs as $barang)
          <div class="col-md-3">
             <div class="text-decoration-none"><a href="{{ url('barang') }}/{{ $barang->id }}" class="text-dark text-decoration-none">
                <div class="text-center">
                   <img src="{{ asset('img/'.$barang->images) }}" style="max-height: 300px" class="img-fluid">
                   <div class="row mt-2">
                      <div class="col-md-12">
                        <br>
                         <h5><strong>{{ $barang->namabarang }}</strong> </h5>
                         <h5>Rp. {{ number_format($barang->harga) }}</h5>
                      </div>
                   </div>
                   </a>
                </div>
             </div>
          </div>
          @endforeach
       </div>
    </section>
        <div class="row">
            <div class="col">
                {{ $barangs->links() }}
            </div>
        </div>
    </section>
 @endsection
