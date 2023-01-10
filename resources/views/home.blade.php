@extends('layouts.app')
@section('content')
<style>
    body{
        background: white;
    }
    .card{
        background: rgb(255,255,255,0.7);
    }
    .img {
        transition: transform .9s ease-in-out;
        padding: 0px;
    }
    img:hover {
        transform: rotate(360deg);
    }
    h5{
        text-align: left;
    }
</style>
<br>
<!-- slide -->
<div id="carouselExample" class="carousel slide shadow-lg">
  <div class="carousel-inner shadow-lg">
    <div class="carousel-item active">
      <img src="https://blogger.googleusercontent.com/img/a/AVvXsEjJ6f5RJOuC72F1Kkbzn9aAXyzylg_otTkuNmJUfbY-POHv4uBOZYPc8aSOskPP2xvu3BO-NX6p4nPcVFKgfEJyQKMxac_JUQY_ofvr4Cv3cl8U36CCAkpuyOcZb48qw3m40BpNnLGSpp8pAdq3tqZk68gorx4nfJJwMInm6iIb7slEbkZ-FMXg8cmd" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://blogger.googleusercontent.com/img/a/AVvXsEj9AZOTi1VHAdWkq6kX25AHNZH8m51wxA4iVi0rM7XpR8xDf9eG76o3U0wkdeRQiXqkL0bdanVSwoKjD0TgjSLpGbLjdRRVJyXjuCdCmKO2ThyDtFOZJWCTjEm4iC6_3JtJyYknN6ssDZ6aQN-Z7v84rqDlpZV978JLNPXGNSHTa1w7eGTa0bQ7Bnnm" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://blogger.googleusercontent.com/img/a/AVvXsEjsTHNNxBLfFWruIzYpgtZpOEqMFrhBgy7xn1u_w9b69mZ5UlebXnl5T6y5OAkrKCS2bVkLMFpEViZhBT3jjtH55yhTahMJ-mDhls2aIcRpvorwyZvh5h4U0b3O1Xjp4QaHyXEj2_xM1T4G6p5ya1xu_8GsLW0VSVEZj8zSa9br1wjrJnk83OAQm9R9" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="text-center mt-2" >
    <a href="{{ url('product') }}"><img src="{{ asset('img/banner.jpg') }}" style="max-height: 700px" alt=""></a>
 </div>
 <div class="container">
    <section class="pilih-brand mt-4">
       <h3><strong class="text-dark">Category</strong class="text-dark"></h3>
       <div class="row mt-4">
          @foreach($categories as $kategori)
          <div class="col">
             <a href="/categories/{{ $kategori->id }}">
                <div >
                   <div class="text-center" >
                      <img src="{{ asset('img/'.$kategori->images) }}" style="width: 90%" class="img-fluid img rounded-circle img-thumbnail shadow-4-strong">
                   </div>
                </div>
             </a>
          </div>
          @endforeach
       </div>
    </section>

    <section class="mt-5 mb-5">
       <h3>
          <strong class="text-dark">Latest Release</strong>
          <a href="/product" class="btn btn-outline-dark"><span class="text-end"> Lihat Semua </span></a>
       </h3>
       <div class="row mt-4 ">
          @foreach($barangs as $barang)
          <div class="col-md-3">
             <div class="text-decoration-none"><a href="{{ url('barang') }}/{{ $barang->id }}" class="text-dark text-decoration-none">
                <div class="text-center">
                   <img src="{{ asset('img/'.$barang->images) }}" style="max-height: 550px" class="img-fluid">
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
 </div>

@endsection
