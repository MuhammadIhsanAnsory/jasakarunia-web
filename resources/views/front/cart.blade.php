@extends('layouts.front')

@section('title')
Keranjang
@endsection

@section('content')
<div class="bg-dark" style="height: 100px">
</div>
<div class="my-5">
  <div class="container">
    <h1 class="text-center">Keranjang Anda</h1>
    <table class="table table-hover table-borderless mb-5">
      <thead>
        <th>No.</th>
        <th>Nama</th>
        <th>Foto</th>
        <th>Aksi</th>
      </thead>
      <p>

      </p>
      <tbody>
        @if ($carts)
        @foreach ($carts as $cart)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $cart['name'] }}</td>
          <td>
            <div class="row">
              @php
              $images = json_decode($cart['images']);
              @endphp
              <div class="thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                  data-image="{{ asset('uploads/buses') . '/' . $cart['id'] . '/' . $images[0] }}"
                  data-target="#image-gallery">
                  <img class="img-thumbnail" src="{{ asset('uploads/buses') . '/' . $cart['id'] . '/' . $images[0] }}"
                    alt="Foto produk" width="100px">
                </a>
              </div>
            </div>
          </td>
          <td>
            <form action="{{ route('front.cart.destroy', [$cart['id'], $cart['slug']]) }}" method="post">
              @csrf
              @method('delete')
              <button type="submit" onclick="return confirm('Yakin hapus produk ini?')" class="btn btn-sm btn-danger"><i
                  class="fas fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
        @else
        <td colspan="4"><i>Keranjang kosong</i></td>
        @endif
      </tbody>
    </table>
    <div class="text-center">
      <a href="{{ route('front.cart.order') }}" class="btn btn-success btn-lg"><i class="fas fa-check-double"></i> PESAN
        SEKARANG!</a>
    </div>
  </div>
</div>
@endsection

@include('layouts.components.image_viewer_no_arrow')