@extends('layouts.admin')

@section('title')
Detail Bus {{ $bus->name }}
@endsection

@section('content')

<div class="section-header">
  <h1>Tambah Bus</h1>
</div>
<div class="section-body">
  <div class="card">
    <div class="card-body">
      <nav aria-label="breadcrumb mb-2">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.bus.index') }}">List Bus</a></li>
          <li class="breadcrumb-item active" aria-current="page">Detail Produk</li>
        </ol>
      </nav>
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <table class="table table-hover table-striped">
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
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="row">
            @isset($bus->images)
            @foreach (json_decode($bus->images) as $image)
            <div class="col-lg-4 col-md-6 col-sm-6 thumb">
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
        </div>
      </div>
      <div class="row">
        <button type="button" class="btn btn-secondary mr-2" onclick="goBack()"><i class="fas fa-arrow-left"></i>
          Kembali</button>
        <a href="{{ route('admin.bus.edit', [$bus->id, $bus->slug]) }}" class="btn btn-success"><i
            class="fas fa-edit"></i> Edit Bus</a>
      </div>
    </div>
  </div>
</div>

@endsection

@include('layouts.components.image_viewer')