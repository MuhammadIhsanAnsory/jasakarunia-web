@extends('layouts.front')

@section('title')
Bus
@endsection

@section('content')
<div class="bg-dark" style="height: 100px">
</div>
<div class="my-5">
  <div class="container">
    <h1>Bus</h1>
    <div class="row">
      @forelse ($buses as $bus)
      <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 ftco-animate">
        <div class="destination rental-destiny">
          @php
          $images = json_decode($bus->images);
          @endphp
          <a href="{{ route('front.bus.show', [$bus->id, $bus->slug]) }}"
            class="img img-2 d-flex justify-content-center align-items-center rental-img"
            style="background-image: url({{ asset('uploads/buses/'. $bus->id. '/' . $images[0]) }});"></a>
          <div class="text p-3 text-rental">
            <div class="seat">
              <strong>{{ $bus->seat }}</strong>
              <span>seat</span>
            </div>
            <div class="d-flex mt-2">
              <div class="one">
                <h3><a href="{{ route('front.bus.show', [$bus->id, $bus->slug]) }}">{{ $bus->name }}</a> </h3>
                <p class="rate">
                  <i class="icon-star"></i>
                  <i class="icon-star"></i>
                  <i class="icon-star"></i>
                  <i class="icon-star"></i>
                  <i class="icon-star-o"></i>
                  <span>8
                    Rating</span>
                </p>
              </div>
            </div>

            <p>{{ \Illuminate\Support\Str::limit($bus->description, 30, '...') }} </p>
            <div class="features-rental">
              <ul>
                <li>
                  <i class="fas fa-tv"></i>
                </li>
                <li>
                  <i class="fas fa-microphone"></i>
                </li>
                <li>
                  <i class="fas fa-fan"></i>
                </li>
                <li>
                  <i class="fas fa-smoking"></i>
                </li>
              </ul>
            </div>
            <div class="text-center mt-3">
              <a href="{{ route('front.bus.show', [$bus->id, $bus->slug]) }}" class="btn btn-orange btn-sm"><i
                  class="fas fa-eye"></i>
                Detail</a>
              <a href="{{ route('front.cart.store', [$bus->id, $bus->slug]) }}" class="btn btn-outline-info btn-sm"><i
                  class="fas fa-cart-plus"></i></a>
            </div>
          </div>
        </div>
      </div>
      @empty

      @endforelse

    </div>
    {{ $buses->links() }}
  </div>
</div>
@endsection

@include('layouts.components.image_viewer')