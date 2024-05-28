@extends('layouts.frontend')
@section('content')

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>{{ $detail->name }}</h3>
          <span class="breadcrumb"><a href="#">Beranda</a>  >  <a href="#">Tempat</a>  >  {{ $detail->name }}</span>
        </div>
      </div>
    </div>
  </div>

  <div class="single-product section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="left-image">
            <img src="{{ asset($detail->placeDetails[0]->images) }}" alt="">
          </div>
        </div>
        <div class="col-lg-6 align-self-center">
          <h4>{{ $detail->name }}</h4>
          <span class="price">{{ "Rp ".str_replace(",", ".", number_format($detail->price)) }}</span>
          {!! $detail->description !!}
          <form id="qty" action="#">
            <button type="submit"><i class="fa fa-shopping-bag"></i> Tambah ke keranjang</button>
          </form>
          <ul>
            <li><span>Diposting Pada:</span> {{ date('d-m-Y', strtotime($detail->created_at)) }}</li>
          </ul>
        </div>
        <div class="col-lg-12">
          <div class="sep"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="more-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="tabs-content">
            <div class="row">
              <div class="nav-wrapper ">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Deskripsi</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Gambar ({{ count($detail->placeDetails) }})</button>
                  </li>
                </ul>
              </div>              
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                  {!! $detail->description !!}
                </div>
                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                  <div class="container">
                    <div class="row">
                        @foreach ($detail->placeDetails as $item)
                          <div class="col-lg col-sm-6 col-xs-12">
                            <div class="item">
                              <div class="thumb">
                                <a href="#"><img src="{{ asset($item->images) }}" alt=""></a>
                              </div>
                              <span>{{ $item->description }}</span>
                            </div>
                          </div>
                        @endforeach
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection