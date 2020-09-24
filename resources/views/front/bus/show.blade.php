@extends('layouts.front')

@section('title')
Detail Bus {{ $bus->name }}
@endsection

@section('content')
<div class="bg-dark" style="height: 100px">
</div>
<div class="mt-2">
  <div class="container">
    <h1 class="text-center">Detail Bus {{ $bus->name }}</h1>
    <div class="row">
      @isset($bus->images)
      @foreach (json_decode($bus->images) as $i=>$image)
      <div class="col-lg-3 col-md-4 col-sm-6 thumb">
        <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
          data-image="{{ asset('uploads/buses') . '/' . $bus->id . '/' . $image }}" data-target="#image-gallery">
          <img class="img-thumbnail" src="{{ asset('uploads/buses') . '/' . $bus->id . '/' . $image }}"
            alt="Foto produk">
        </a>
      </div>
      @endforeach
      @endisset
      @empty($bus->images)
      <i>Gambar tidak ada</i>
      @endempty
    </div>
    <table class="table table-hover table-borderless">
      <tr>
        <th>Nama Bus</th>
        <td>:</td>
        <td>{{ $bus->name }}</td>
      </tr>
      <tr>
        <th>Seat</th>
        <td>:</td>
        <td>{{ $bus->seat }} Kursi</td>
      </tr>
      <tr>
        <th>Pintu</th>
        <td>:</td>
        <td>{{ $bus->door }} Pintu</td>
      </tr>
      <tr>
        <th>Bagasi</th>
        <td>:</td>
        <td>{{ $bus->bagagge }} Bagasi</td>
      </tr>
      <tr>
        <th>AC</th>
        <td>:</td>
        <td>
          @if ($bus->ac === 1)
          <span class="badge badge-info"><i class="fas fa-check-circle"></i> Ya</span>
          @else
          <span class="badge badge-secondary"><i class="fas fa-times-circle"></i> Tidak</span>
          @endif
        </td>
      </tr>
      <tr>
        <th>TV</th>
        <td>:</td>
        <td>
          @if ($bus->tv === 1)
          <span class="badge badge-info"><i class="fas fa-check-circle"></i> Ya</span>
          @else
          <span class="badge badge-secondary"><i class="fas fa-times-circle"></i> Tidak</span>
          @endif
        </td>
      </tr>
      <tr>
        <th>Karaoke</th>
        <td>:</td>
        <td>
          @if ($bus->karaoke === 1)
          <span class="badge badge-info"><i class="fas fa-check-circle"></i> Ya</span>
          @else
          <span class="badge badge-secondary"><i class="fas fa-times-circle"></i> Tidak</span>
          @endif
        </td>
      </tr>
      <tr>
        <th>Smoking Area</th>
        <td>:</td>
        <td>
          @if ($bus->smoking_area === 1)
          <span class="badge badge-info"><i class="fas fa-check-circle"></i> Ya</span>
          @else
          <span class="badge badge-secondary"><i class="fas fa-times-circle"></i> Tidak</span>
          @endif
        </td>
      </tr>
      <tr>
        <th>Transmisi</th>
        <td>:</td>
        <td>
          @if ($bus->smoking_area === 1)
          <span class="badge badge-info">Auto</span>
          @else
          <span class="badge badge-secondary">Manual</span>
          @endif
        </td>
      </tr>
    </table>


    <div class="my-5">
      <h2>Deskripsi</h2>
      <p>
        {{ $bus->description }}
      </p>
      <a href="{{ route('front.cart.store', [$bus->id, $bus->slug]) }}" class="btn btn-outline-info"><i
          class="fas fa-cart-plus"></i> Tambah ke Keranjang</a>
    </div>

  </div>
</div>
@endsection

@include('layouts.components.image_viewer')