@extends('layouts.app')

@section('content')

<style>
    body{
        background-color:white;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" ><a href="/"class=" text-dark text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item" ><a href="/product"class=" text-dark text-decoration-none">Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Details</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-1">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('img/'.$barang->images) }}" class="rounded mx-auto d-block" width="100%" alt="">
                        </div>
                        <div class="col-md-6 mt-5">
                            <h2>{{ $barang->namabarang }}</h2>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Category</td>
                                        <td>:</td>
                                        <td> <img src="{{ url('img/'.$barang->category->images)  }}" class="img-fluid"
                                            width="50"></td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <td>:</td>
                                        <td>Rp. {{ number_format($barang->harga) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Stock</td>
                                        <td>:</td>
                                        <td>{{ number_format($barang->stok) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td>:</td>
                                        <td>{{ $barang->keterangan }}</td>
                                    </tr>

                                    @auth
                                    @if (Auth::user()->level == 'admin')

                                    @endif
                                    @if (Auth::user()->level == 'member')
                                    <tr>
                                        <td>Order Quantity</td>
                                        <td>:</td>
                                        <td>
                                             <form method="post" action="{{ url('barang') }}/{{ $barang->id }}" >
                                            @csrf
                                                <input type="text" class="form-group col-md-2" name="jumlah_pesan" class="form-control" required="">
                                                <div class="form-group" ><button type="submit" class="btn btn-primary mt-2 col-md-6 "><i class="bi bi-cart2"></i> Add to Cart</button>
                                                </div>

                                            </form>
                                        </td>
                                    </tr>
                                    @endif
                                    @endauth
                                    @guest


                                             <form method="post" action="{{ url('barang') }}/{{ $barang->id }}" >
                                            @csrf
                                                <button type="submit" class="btn btn-outline-dark mt-2"><i class="bi bi-box-arrow-in-right"></i>  Login to buy</button>
                                            </form>

                                    @endguest



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
