@extends('layouts.front')

@section('title')
Selamat Datang di
@endsection

@section('content')
<div>
  {{-- <section class="header-mereun">
    <div class="hero-wrap js-fullheight">
      <img src="assets/front/images/bali.jpg" alt="" class="animate-background">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
          data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><strong>Jasa Jiwa
                <br></strong> Menyuguhkan Jiwa</h1>
            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Temukan jiwa anda di tempat yg
              tidak terduga</p>
          </div>
        </div>
      </div>
    </div>
  </section> --}}

  {{-- <section class="ftco-section services-section bg-light">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block text-center">
            <div class="d-flex justify-content-center">
              <div class="icon"><span class="flaticon-guarantee"></span></div>
            </div>
            <div class="media-body p-2 mt-2">
              <h3 class="heading mb-3">Best Price Guarantee</h3>
              <p>Harga yang bersaing. Tidak akan menguran dompet Anda</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block text-center">
            <div class="d-flex justify-content-center">
              <div class="icon"><span class="flaticon-like"></span></div>
            </div>
            <div class="media-body p-2 mt-2">
              <h3 class="heading mb-3">Travellers Love Us</h3>
              <p>Berwisata dengan kami, dapatkan pengalaman lebih</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block text-center">
            <div class="d-flex justify-content-center">
              <div class="icon"><span class="flaticon-detective"></span></div>
            </div>
            <div class="media-body p-2 mt-2">
              <h3 class="heading mb-3">Best Travel Agent</h3>
              <p>Agen travel terbaik untuk Anda</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block text-center">
            <div class="d-flex justify-content-center">
              <div class="icon"><span class="flaticon-support"></span></div>
            </div>
            <div class="media-body p-2 mt-2">
              <h3 class="heading mb-3">Our Dedicated Support</h3>
              <p>Kami mengutamakan kepuasan pelayanan</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}

  <div class="bg-dark" style="height: 100px">
  </div>

  <section class="jumbotroninfo">
    <div class="container">
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            @php
            $image1 = json_decode($buses[0]->images);
            @endphp
            <img src="{{ asset('uploads/buses/'. $buses[0]->id. '/' . $image1[0]) }}"
              class="d-block w-100 image-carousel" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <a href="{{ route('front.bus.show', [$buses[0]->id, $buses[0]->slug]) }}">
                <h5 class="text-shadow text-white">{{ $buses[0]->name }}</h5>
                <p class="text-shadow text-white">Lihat Detail</p>
              </a>
            </div>
          </div>
          @forelse ($buses as $i=>$bus)
          @php
          $images = json_decode($bus->images);
          @endphp
          @if ($i > 0)
          <div class="carousel-item">
            <img src="{{ asset('uploads/buses/'. $bus->id. '/' . $images[0]) }}" class="d-block w-100 image-carousel"
              alt="...">
            <div class="carousel-caption d-none d-md-block">
              <a href="{{ route('front.bus.show', [$bus->id, $bus->slug]) }}">
                <h5 class="text-shadow text-white">{{ $bus->name }}</h5>
                <p class="text-shadow text-white">Lihat Detail</p>
              </a>
            </div>
          </div>
          @endif
          @if ($i == 3)
          @break
          @endif
          @empty
          @endforelse
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <h4 class="text-center my-5">Temukan Bus dengan Pelayanan Terbaik di <b>Jasa Karunia</b></h4>

      <div class="row">
        <div class="col-6">
          <label for="keyword">Nama Layanan</label>
          <input type="text" class="form-control" placeholder="cari e.g. Paket Bus" name="keyword">
        </div>
        <div class="col-4">
          <label for="service">Jenis Layanan</label>
          <select name="service" id="service" class="form-control">
            <option value="bus">Bus</option>
            <option value="wisata">Paket Wisata</option>
            <option value="dekorasi">Dekorasi</option>
          </select>
        </div>
        <div class="col-2">
          <div style="height: 37px"></div>
          <button type="submit" class="btn btn-orange"><i class="fas fa-search"></i> Cari</button>
        </div>

      </div>

    </div>

    <div class="container">
      <div class="row justify-content-start mt-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate">
          <span class="subheading">Special
            Jiwa</span>
          <h2 class="mb-4">
            <strong>Sewa</strong>
            Bus Jiwa</h2>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        @forelse ($buses as $i=>$bus)
        @if ($i > 3)
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 ftco-animate">
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
        @endif
        @if ($i === 7)
        @break
        @endif
        @empty

        @endforelse

      </div>
    </div>

  </section>

  <section class="ftco-section ftco-destination">
    <div class="container">
      <div class="row justify-content-start mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate">
          <span class="subheading">Featured</span>
          <h2 class="mb-4"><strong>Paket</strong> Wisata Jiwa</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="destination-slider owl-carousel ftco-animate">
            <div class="item">
              <div class="destination destiny">
                <a href="#" class="img d-flex justify-content-center align-items-center full-img"
                  style="background-image: url(assets/front/images/destination-1.jpg);">
                </a>
                <div class="text p-3 overlay-text">
                  <h3><a href="#">Ciledug</a></h3>
                  <span class="listing packet">5 Paket</span>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="destination destiny">
                <a href="#" class="img d-flex justify-content-center align-items-center full-img"
                  style="background-image: url(assets/front/images/destination-2.jpg);">
                </a>
                <div class="text p-3 overlay-text">
                  <h3><a href="#">Papua</a></h3>
                  <span class="listing packet"">7 Paket</span>
                </div>
              </div>
            </div>
            <div class=" item">
                    <div class="destination destiny">
                      <a href="#" class="img d-flex justify-content-center align-items-center full-img"
                        style="background-image: url(assets/front/images/destination-3.jpg);">
                      </a>
                      <div class="text p-3 overlay-text">
                        <h3><a href="#">Balukumba</a></h3>
                        <span class="listing packet"">10 Paket</span>
                </div>
              </div>
            </div>
            <div class=" item">
                          <div class="destination destiny">
                            <a href="#" class="img d-flex justify-content-center align-items-center full-img"
                              style="background-image: url(assets/front/images/destination-4.jpg);">
                            </a>
                            <div class="text p-3 overlay-text">
                              <h3><a href="#">Garut</a></h3>
                              <span class="listing packet"">7 Paket</span>
                </div>
              </div>
            </div>
            <div class=" item">
                                <div class="destination destiny">
                                  <a href="#" class="img d-flex justify-content-center align-items-center full-img"
                                    style="background-image: url(assets/front/images/destination-5.jpg);">
                                  </a>
                                  <div class="text p-3 overlay-text">
                                    <h3><a href="#">Banyuresmi</a></h3>
                                    <span class="listing packet"">3 Paket</span>
                </div>
              </div>
            </div>
            <div class=" item">
                                      <div class="destination destiny">
                                        <a href="#"
                                          class="img d-flex justify-content-center align-items-center full-img"
                                          style="background-image: url(assets/front/images/destination-6.jpg);">
                                        </a>
                                        <div class="text p-3 overlay-text">
                                          <h3><a href="#">Saluyu</a></h3>
                                          <span class="listing packet"">2 Paket</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

 

  <section class=" ftco-section ftco-counter img" id="section-counter"
                                            style="background-image: url(assets/front/images/bg_1.jpg); background-attachment: fixed;">
                                            <div class="container">
                                              <div class="row justify-content-center mb-5 pb-3">
                                                <div
                                                  class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                                                  <h2 class="mb-4">Some fun facts</h2>
                                                  <span class="subheading">More than 100,000 websites hosted</span>
                                                </div>
                                              </div>
                                              <div class="row justify-content-center">
                                                <div class="col-md-10">
                                                  <div class="row">
                                                    <div
                                                      class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                                                      <div class="block-18 text-center">
                                                        <div class="text">
                                                          <strong class="number" data-number="100000">0</strong>
                                                          <span>Happy Customers</span>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div
                                                      class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                                                      <div class="block-18 text-center">
                                                        <div class="text">
                                                          <strong class="number" data-number="40000">0</strong>
                                                          <span>Destination Places</span>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div
                                                      class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                                                      <div class="block-18 text-center">
                                                        <div class="text">
                                                          <strong class="number" data-number="87000">0</strong>
                                                          <span>Hotels</span>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div
                                                      class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                                                      <div class="block-18 text-center">
                                                        <div class="text">
                                                          <strong class="number" data-number="56400">0</strong>
                                                          <span>Restaurant</span>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
  </section>


  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-start mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate">
          <span class="subheading">Special Jiwa</span>
          <h2 class="mb-4"><strong>Paket</strong> Dekorasi Jiwa</h2>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 col-md-6 col-lg ftco-animate">
          <div class="destination decoration" style="background-image: url(assets/front/images/hotel-1.jpg);">
            <div class=" p-3">
              <div class="d-flex decoration-text">
                <div class="one">
                  <h3><a href="#" class="text-white">Paket Dokarasi Ulang Tahun</a></h3>
                </div>
              </div>
              <p>Jln, Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae, aliquam.</p>

              <span class="price per-price price-decoration">Rp. 1.000.000</span>
              <ul class="rate">
                <li><i class="fas fa-star text-white"></i></li>
                <li><i class="fas fa-star text-white"></i></li>
                <li><i class="fas fa-star text-white"></i></li>
                <li><i class="fas fa-star text-white"></i></li>
                <li><i class="fas fa-star-half-alt text-white"></i></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg ftco-animate">
          <div class="destination decoration" style="background-image: url(assets/front/images/hotel-2.jpg);">
            <div class=" p-3">
              <div class="d-flex decoration-text">
                <div class="one">
                  <h3><a href="#" class="text-white">Paket Dokarasi Ulang Tahun</a></h3>
                </div>
              </div>
              <p>Jln, Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae, aliquam.</p>

              <span class="price per-price price-decoration">Rp. 1.000.000</span>
              <ul class="rate">
                <li><i class="fas fa-star text-white"></i></li>
                <li><i class="fas fa-star text-white"></i></li>
                <li><i class="fas fa-star text-white"></i></li>
                <li><i class="fas fa-star text-white"></i></li>
                <li><i class="fas fa-star-half-alt text-white"></i></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg ftco-animate">
          <div class="destination decoration" style="background-image: url(assets/front/images/hotel-3.jpg);">
            <div class=" p-3">
              <div class="d-flex decoration-text">
                <div class="one">
                  <h3><a href="#" class="text-white">Paket Dokarasi Ulang Tahun</a></h3>
                </div>
              </div>
              <p>Jln, Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae, aliquam.</p>

              <span class="price per-price price-decoration">Rp. 1.000.000</span>
              <ul class="rate">
                <li><i class="fas fa-star text-white"></i></li>
                <li><i class="fas fa-star text-white"></i></li>
                <li><i class="fas fa-star text-white"></i></li>
                <li><i class="fas fa-star text-white"></i></li>
                <li><i class="fas fa-star-half-alt text-white"></i></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg ftco-animate">
          <div class="destination decoration" style="background-image: url(assets/front/images/hotel-4.jpg);">
            <div class=" p-3">
              <div class="d-flex decoration-text">
                <div class="one">
                  <h3><a href="#" class="text-white">Paket Dokarasi Ulang Tahun</a></h3>
                </div>
              </div>
              <p>Jln, Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae, aliquam.</p>

              <span class="price per-price price-decoration">Rp. 1.000.000</span>
              <ul class="rate">
                <li><i class="fas fa-star text-white"></i></li>
                <li><i class="fas fa-star text-white"></i></li>
                <li><i class="fas fa-star text-white"></i></li>
                <li><i class="fas fa-star text-white"></i></li>
                <li><i class="fas fa-star-half-alt text-white"></i></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section testimony-section bg-light">
    <div class="container">
      <div class="row justify-content-start">
        <div class="col-md-5 heading-section ftco-animate">
          <span class="subheading">Best Directory Website</span>
          <h2 class="mb-4 pb-3"><strong>Why</strong> Choose Us?</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
            live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics,
            a large language ocean.</p>
          <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
            unorthographic life.</p>
          <p><a href="#" class="btn btn-primary btn-outline-primary mt-4 px-4 py-3">Read more</a></p>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-6 heading-section ftco-animate">
          <span class="subheading">Testimony</span>
          <h2 class="mb-4 pb-3"><strong>Our</strong> Guests Says</h2>
          <div class="row ftco-animate">
            <div class="col-md-12">
              <div class="carousel-testimony owl-carousel">
                <div class="item">
                  <div class="testimony-wrap d-flex">
                    <div class="user-img mb-5" style="background-image: url(assets/front/images/person_1.jpg)">
                      <span class="quote d-flex align-items-center justify-content-center">
                        <i class="icon-quote-left"></i>
                      </span>
                    </div>
                    <div class="text ml-md-4">
                      <p class="mb-5">Far far away, behind the word mountains, far from the
                        countries Vokalia and Consonantia, there live the blind texts.</p>
                      <p class="name">Dennis Green</p>
                      <span class="position">Guest from italy</span>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="testimony-wrap d-flex">
                    <div class="user-img mb-5" style="background-image: url(assets/front/images/person_2.jpg)">
                      <span class="quote d-flex align-items-center justify-content-center">
                        <i class="icon-quote-left"></i>
                      </span>
                    </div>
                    <div class="text ml-md-4">
                      <p class="mb-5">Far far away, behind the word mountains, far from the
                        countries Vokalia and Consonantia, there live the blind texts.</p>
                      <p class="name">Dennis Green</p>
                      <span class="position">Guest from London</span>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <div class="testimony-wrap d-flex">
                    <div class="user-img mb-5" style="background-image: url(assets/front/images/person_3.jpg)">
                      <span class="quote d-flex align-items-center justify-content-center">
                        <i class="icon-quote-left"></i>
                      </span>
                    </div>
                    <div class="text ml-md-4">
                      <p class="mb-5">Far far away, behind the word mountains, far from the
                        countries Vokalia and Consonantia, there live the blind texts.</p>
                      <p class="name">Dennis Green</p>
                      <span class="position">Guest from Philippines</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-start mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate">
          <span class="subheading">Recent Blog</span>
          <h2><strong>Tips</strong> &amp; Articles</h2>
        </div>
      </div>
      <div class="row d-flex">
        <div class="col-md-3 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20"
              style="background-image: url('assets/front/images/image_1.jpg');">
            </a>
            <div class="text p-4 d-block">
              <span class="tag">Tips, Travel</span>
              <h3 class="heading mt-3"><a href="#">8 Best homestay in Philippines that you don't miss
                  out</a></h3>
              <div class="meta mb-3">
                <div><a href="#">August 12, 2018</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20"
              style="background-image: url('assets/front/images/image_2.jpg');">
            </a>
            <div class="text p-4">
              <span class="tag">Culture</span>
              <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the
                  blind texts</a></h3>
              <div class="meta mb-3">
                <div><a href="#">August 12, 2018</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20"
              style="background-image: url('assets/front/images/image_3.jpg');">
            </a>
            <div class="text p-4">
              <span class="tag">Tips, Travel</span>
              <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the
                  blind texts</a></h3>
              <div class="meta mb-3">
                <div><a href="#">August 12, 2018</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20"
              style="background-image: url('assets/front/images/image_4.jpg');">
            </a>
            <div class="text p-4">
              <span class="tag">Tips, Travel</span>
              <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the
                  blind texts</a></h3>
              <div class="meta mb-3">
                <div><a href="#">August 12, 2018</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection