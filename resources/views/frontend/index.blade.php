
@extends('layouts.frontend')
@section('nav-item-beranda', 'active')
@section('content')
  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="caption header-text">
            <h6>Selamat Datang Di Rentalku</h6>
            <h2>Penyedia Sewa Terbaik</h2>
            <p>
                Temukan solusi sewa yang terbaik dengan kami! Penyedia Sewa Terbaik menjamin pengalaman sewa yang mudah, cepat, dan terpercaya, dengan beragam pilihan untuk memenuhi kebutuhan Anda. Hemat waktu dan dapatkan layanan berkualitas bersama kami.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="features">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <a href="#terbaru">
            <div class="item">
              <h4>Terbaru</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#termurah">
            <div class="item">
              <h4>Termurah</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#termahal">
            <div class="item">
              <h4>Termahal</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#most-played">
            <div class="item">
              <h4>Paling Laris</h4>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="section trending" id="terbaru">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>Terbaru</h6>
            <h2>Tempat Terbaru</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-button">
            <a href="{{ url('/product') }}">Lihat Semua</a>
          </div>
        </div>
        @foreach ($terbaru as $itemterbaru)    
            <div class="col-lg-3 col-md-6">
                <div class="item">
                    <div class="thumb">
                        <a href="{{ url('/detail/'.$itemterbaru->id) }}"><img src="{{ $itemterbaru->placeDetails[0]->images }}" alt=""></a>
                        <span class="price">{{ "Rp ".str_replace(",", ".", number_format($itemterbaru->price)) }}</span>
                        </div>
                        <div class="down-content">
                        <h4>{{ $itemterbaru->name }}</h4>
                        <span class="category">{!! substr($itemterbaru->description, 0, 100) !!}...</span>
                        <a href="{{ url('/detail/'.$itemterbaru->id) }}" class="mt-3"><i class="fa fa-shopping-bag"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="section trending" id="termurah">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>Termurah</h6>
            <h2>Beberapa Opsi Termurah</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-button">
            <a href="{{ url('/product') }}">Lihat Semua</a>
          </div>
        </div>
        @foreach ($termurah as $itemtermurah)    
            <div class="col-lg-3 col-md-6">
                <div class="item">
                    <div class="thumb">
                        <a href="{{ url('/detail/'.$itemtermurah->id) }}"><img src="{{ $itemtermurah->placeDetails[0]->images }}" alt=""></a>
                        <span class="price">{{ "Rp ".str_replace(",", ".", number_format($itemtermurah->price)) }}</span>
                        </div>
                        <div class="down-content">
                        <h4>{{ $itemtermurah->name }}</h4>
                        <span class="category">{!! substr($itemtermurah->description, 0, 100) !!}...</span>
                        <a href="{{ url('/detail/'.$itemtermurah->id) }}" class="mt-3"><i class="fa fa-shopping-bag"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="section trending" id="termahal">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>Termahal</h6>
            <h2>Beberapa Opsi Termahal</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-button">
            <a href="{{ url('/product') }}">Lihat Semua</a>
          </div>
        </div>
        @foreach ($termahal as $itemtermahal)    
            <div class="col-lg-3 col-md-6">
                <div class="item">
                    <div class="thumb">
                        <a href="{{ url('/detail/'.$itemtermahal->id) }}"><img src="{{ $itemtermahal->placeDetails[0]->images }}" alt=""></a>
                        <span class="price">{{ "Rp ".str_replace(",", ".", number_format($itemtermahal->price)) }}</span>
                        </div>
                        <div class="down-content">
                        <h4>{{ $itemtermahal->name }}</h4>
                        <span class="category">{!! substr($itemtermahal->description, 0, 100) !!}...</span>
                        <a href="{{ url('/detail/'.$itemtermahal->id) }}" class="mt-3"><i class="fa fa-shopping-bag"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
      </div>
    </div>
  </div>

  <div class="section most-played" id="most-played">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>Terlaris</h6>
            <h2>Daftar Paling Laris</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-button">
            <a href="{{ url('/product') }}">Lihat Semua</a>
          </div>
        </div>
        {{-- <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="item">
            <div class="thumb">
              <a href="product-details.html"><img src="{{ asset('frontend') }}/assets/images/top-game-01.jpg" alt=""></a>
            </div>
            <div class="down-content">
                <span class="category">Adventure</span>
                <h4>Assasin Creed</h4>
                <a href="product-details.html">Explore</a>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
  </div>

  {{-- <div class="section cta">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="shop">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <h6>Our Shop</h6>
                  <h2>Go Pre-Order Buy & Get Best <em>Prices</em> For You!</h2>
                </div>
                <p>Lorem ipsum dolor consectetur adipiscing, sed do eiusmod tempor incididunt.</p>
                <div class="main-button">
                  <a href="{{ url('/product') }}">Shop Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-2 align-self-end">
          <div class="subscribe">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <h6>NEWSLETTER</h6>
                  <h2>Get Up To $100 Off Just Buy <em>Subscribe</em> Newsletter!</h2>
                </div>
                <div class="search-input">
                  <form id="subscribe" action="#">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your email...">
                    <button type="submit">Subscribe Now</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
@endsection