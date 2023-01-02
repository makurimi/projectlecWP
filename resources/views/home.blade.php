@extends('layouts.app')
@section('content')
<style>
    body{
        background-color: #161618;
    }
    h3{
        color: white;
    }
    h5{
        color: white;
    }
    a{
        color: white;
    }
    i{
        color: white;
    }
</style>

<div class="slider" style="margin-top: 50px;">

    <!-- slide -->
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://blogger.googleusercontent.com/img/a/AVvXsEjJ6f5RJOuC72F1Kkbzn9aAXyzylg_otTkuNmJUfbY-POHv4uBOZYPc8aSOskPP2xvu3BO-NX6p4nPcVFKgfEJyQKMxac_JUQY_ofvr4Cv3cl8U36CCAkpuyOcZb48qw3m40BpNnLGSpp8pAdq3tqZk68gorx4nfJJwMInm6iIb7slEbkZ-FMXg8cmd" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://blogger.googleusercontent.com/img/a/AVvXsEjJ6f5RJOuC72F1Kkbzn9aAXyzylg_otTkuNmJUfbY-POHv4uBOZYPc8aSOskPP2xvu3BO-NX6p4nPcVFKgfEJyQKMxac_JUQY_ofvr4Cv3cl8U36CCAkpuyOcZb48qw3m40BpNnLGSpp8pAdq3tqZk68gorx4nfJJwMInm6iIb7slEbkZ-FMXg8cmd" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://blogger.googleusercontent.com/img/a/AVvXsEjJ6f5RJOuC72F1Kkbzn9aAXyzylg_otTkuNmJUfbY-POHv4uBOZYPc8aSOskPP2xvu3BO-NX6p4nPcVFKgfEJyQKMxac_JUQY_ofvr4Cv3cl8U36CCAkpuyOcZb48qw3m40BpNnLGSpp8pAdq3tqZk68gorx4nfJJwMInm6iIb7slEbkZ-FMXg8cmd" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
</button>
</div>
</div>

<div class="container">
    <section class="pilih-brand mt-4">
       <h3><strong>Category</strong></h3>
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
          <strong>Latest Release</strong>
          <a href="/product" class="btn btn-outline-dark" style="color: white;"><i class=""></i> Lihat Semua </a>
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
                         <a href="{{ url('barang') }}/{{ $barang->id }}" class="btn btn-outline-dark" style="color: white;"><i class="bi bi-eye"></i> Detail</a>
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
