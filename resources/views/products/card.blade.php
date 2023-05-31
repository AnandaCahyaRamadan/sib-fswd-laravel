@extends('layouts.main')
@section('content')
@if ($products->count() > 0)
<div class="container pt-5 pb-5">
    <div class="row g-4">
      @foreach ($products as $key => $product)
        <div class="col-12 col-sm-4 col-md-4">
            <div class="card" style="width: 100%;">
                <img class="card-img-top" src="{{ asset('storage/' . $product->gambar )}}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title my-1">{{ $product->nama_product }}</h5>
                  <small class="fs-xmall fw-bold bg-warning pe-2 ps-2 pb-1 pt-1 rounded">{{ $product->categories->category_name }}</small>
                  <p class="card-text my-1 text-warning text-bold">Rp. {{ $product->harga }}</p>
                  <small class="card-text">{{ $product->deskripsi }}</small>
                  <div class="mt-2">
                    @for ($i = 1 ; $i <= $product->rating ; $i++)
                     <i class="fa fa-star text-warning"></i>
                    @endfor
                    <span> {{ $product->rating }}/5</span>
                  </div>
                  <div class="mt-4">
                    <a href="https://wa.me/6281999651534" class="btn btn-warning fw-bold" style="width:100%"><i class="fab fa-whatsapp"></i> Pesan Sekarang</a>
                  </div>

                </div>
            </div>
        </div>
      @endforeach
    </div>
</div>
@else
<div class="container pt-2 pb-5">
  <p>Product Belum ditambahkan</p>
</div>
@endif
@endsection