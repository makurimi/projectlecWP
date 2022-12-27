@extends('layouts.app')
@section('content')
<style>

</style>

<!-- slide -->


<div class="container">
    <section class="pilih-brand mt-4">
       <h3><strong>Pilih Brand</strong></h3>
       <div class="row mt-4">
          @foreach($categories as $kategori)
          <div class="col">
             <a href="/categories/{{ $kategori->id }}">
                <div class="card shadow">
                   <div class="card-body text-center">
                      <img src="{{ asset('img/'.$kategori->images) }}" style="max-height: 100px" class="img-fluid">
                   </div>
                </div>
             </a>
          </div>
          @endforeach
       </div>
    </section>

    <section class="products mt-5 mb-5">
       <h3>
          <strong>Best Products</strong>
          <a href="/product" class="btn btn-outline-dark"><i class=""></i> Lihat Semua </a>
       </h3>
       <div class="row mt-4">
          @foreach($barangs as $barang)
          <div class="col-md-3">
             <div class="card outline">
                <div class="card-body text-center">
                   <img src="{{ asset('img/'.$barang->images) }}" style="max-height: 150px" class="img-fluid">
                   <div class="row mt-2">
                      <div class="col-md-12">
                         <h5><strong>{{ $barang->namabarang }}</strong> </h5>
                         <h5>Rp. {{ number_format($barang->harga) }}</h5>
                      </div>
                   </div>
                   <div class="row mt-2">
                      <div class="col-md-12">
                         <a href="{{ url('barang') }}/{{ $barang->id }}" class="btn btn-outline-dark"><i class="bi bi-eye"></i> Detail</a>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          @endforeach
       </div>
    </section>
 </div>
@endsection
