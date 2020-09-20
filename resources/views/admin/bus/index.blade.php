@extends('layouts.admin')

@section('title')
List Bus
@endsection

@section('content')
<div class="section-header">
  <h1>List Bus</h1>
</div>
<div class="section-body">
  <div class="card">
    <div class="card-body">
      <a href="{{ route('admin.bus.create') }}" class="btn btn-primary mb-2"><i class="fas fa-pencil-alt"></i> Tambah
        Bus</a>
      <table class="table table-striped table-hover">
        <thead>
          <th>#</th>
          <th>Gambar</th>
          <th>Nama Bus</th>
          <th>Seat</th>
          <th>AC</th>
          <th class="text-center">
            Aksi<br>
            <small>
              <i>Detail | Edit | Hapus</i>
            </small>
          </th>
        </thead>
        <tbody>
          @forelse ($buses as $bus)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
              <div class="row">
                @php
                $images = json_decode($bus->images);
                @endphp
                <div class="thumb">
                  <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title=""
                    data-image="{{ asset('uploads/buses') . '/' . $bus->id . '/' . $images[0] }}"
                    data-target="#image-gallery">
                    <img class="img-thumbnail" src="{{ asset('uploads/buses') . '/' . $bus->id . '/' . $images[0] }}"
                      alt="Foto produk" width="100px">
                  </a>
                </div>
              </div>
            </td>
            <td>{{ $bus->name }}</td>
            <td>{{ $bus->seat }}</td>
            <td>
              @if ($bus->ac === 1)
              <span class="badge badge-success">Ya</span>
              @else
              <span class="badge badge-warning">Tidak</span>
              @endif
            </td>
            <td class="text-center">
              <form action="{{ route('admin.bus.destroy', [$bus->id, $bus->slug]) }}" method="post">
                @method('delete')
                @csrf
                <a href="{{ route('admin.bus.show', [$bus->id, $bus->slug]) }}" class="btn btn-sm btn-info"><i
                    class="fas fa-eye"></i></a>
                <a href="{{ route('admin.bus.edit', [$bus->id, $bus->slug]) }}" class="btn btn-sm btn-success"><i
                    class="fas fa-edit"></i></a>
                <button type="submit" onclick="return confirm('Yakin hapus produk ini?')"
                  class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="7"><i>Bus tidak ada</i></td>
          </tr>
          @endforelse
        </tbody>
      </table>
      {{ $buses->links() }}
    </div>
  </div>
</div>
@endsection

@include('layouts.components.image_viewer_no_arrow')