@extends('layouts.admin')

@section('title')
Edit Bus {{ $bus->name }}
@endsection

@section('content')

<div class="section-header">
  <h1>Edit Bus</h1>
</div>
<div class="section-body">
  <div class="card">
    <div class="card-body">
      <nav aria-label="breadcrumb mb-2">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.bus.index') }}">List Bus</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit Produk</li>
        </ol>
      </nav>
      @if ($errors->any())
      <div class="alert alert-warning">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <form action="{{ route('admin.bus.update', [$bus->id, $bus->slug]) }}" method="post"
        enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="form-group">
          <label for="name">Nama Bus</label>
          <input type="text" name="name" id="name" required class="form-control @error('name')is-invalid @enderror"
            value="{{ $bus->name }}">
          @error('name')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="seat">Seat</label>
          <input type="number" name="seat" id="seat" required class="form-control @error('seat')is-invalid @enderror"
            min="0" value="{{ $bus->seat }}">
          @error('seat')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="door">Pintu</label>
          <input type="number" name="door" id="door" required class="form-control @error('door')is-invalid @enderror"
            min="0" value="{{ $bus->door }}">
          @error('door')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="bagagge">Bagasi</label>
          <input type="number" name="bagagge" id="bagagge" required
            class="form-control @error('bagagge')is-invalid @enderror" min="0" value="{{ $bus->bagagge }}">
          @error('bagagge')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="ac">AC</label>
          <div class="custom-control custom-radio">
            <input type="radio" id="ac1" name="ac" class="custom-control-input" value="1" @if($bus->ac == 1) checked
            @endif>
            <label class="custom-control-label" for="ac1">Ya</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="ac2" name="ac" class="custom-control-input" value="0" @if($bus->ac === 0) checked
            @endif>
            <label class="custom-control-label" for="ac2">Tidak</label>
          </div>
          @error('ac')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="gear_shift">Transmisi</label>
          <div class="custom-control custom-radio">
            <input type="radio" id="gear_shift1" name="gear_shift" class="custom-control-input" value="1"
              @if($bus->gear_shift === 1) checked @endif>
            <label class="custom-control-label" for="gear_shift1">Otomatis</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="gear_shift2" name="gear_shift" class="custom-control-input" value="0"
              @if($bus->gear_shift === 0) checked @endif> <label class="custom-control-label"
              for="gear_shift2">Manual</label>
          </div>
          @error('gear_shift')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="karaoke">Karaoke</label>
          <div class="custom-control custom-radio">
            <input type="radio" id="karaoke1" name="karaoke" class="custom-control-input" value="1" @if($bus->karaoke
            === 1) checked @endif>
            <label class="custom-control-label" for="karaoke1">Ya</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="karaoke2" name="karaoke" class="custom-control-input" value="0" @if($bus->karaoke
            === 0) checked @endif>
            <label class="custom-control-label" for="karaoke2">Tidak</label>
          </div>
          @error('karaoke')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="tv">TV</label>
          <div class="custom-control custom-radio">
            <input type="radio" id="tv1" name="tv" class="custom-control-input" value="1" @if($bus->tv === 1) checked
            @endif>
            <label class="custom-control-label" for="tv1">Ya</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="tv2" name="tv" class="custom-control-input" value="0" @if($bus->tv === 0) checked
            @endif>
            <label class="custom-control-label" for="tv2">Tidak</label>
          </div>
          @error('tv')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="smoking_area">Smoking Area</label>
          <div class="custom-control custom-radio">
            <input type="radio" id="smoking_area1" name="smoking_area" class="custom-control-input" value="1"
              @if($bus->smoking_area === 1) checked @endif>
            <label class="custom-control-label" for="smoking_area1">Ya</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="smoking_area2" name="smoking_area" class="custom-control-input" value="0"
              @if($bus->smoking_area === 0) checked @endif>
            <label class="custom-control-label" for="tv2">Tidak</label>
          </div>
          @error('smoking_area')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="description">Deskripsi dan Fitur Tambahan</label>
          <textarea name="description" id="description" required cols="30" rows="10"
            class="form-control @error('description')is-invalid @enderror">{{ $bus->description }}</textarea>
          @error('description')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-4 col-sm-12">
              <label for="images">Gambar (optional)</label>
              <input type="file" accept="image/*" name="images[]" id="images" multiple
                class="form-control @error('images')is-invalid @enderror">
              @error('images')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-8 col-sm-12">
              <div class="row">
                @isset($bus->images)
                @foreach (json_decode($bus->images) as $image)
                <div class="col-lg-4 col-md-6 col-sm-6 thumb">
                  <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                    data-image="{{ asset('uploads/buses') . '/' . $bus->id . '/' . $image }}"
                    data-target="#image-gallery">
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
        </div>
        <p> <i><b>Apabila gambar ditambahkan, maka gambar yang sebelumnya akan dihapus dan diganti dengan yang
              baru.</b></i> </p>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>
</div>
@endsection

@include('layouts.components.image_viewer')