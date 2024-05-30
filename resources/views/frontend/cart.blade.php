@extends('layouts.frontend')
@section('content')
@section('nav-item-keranjang', 'active')
<div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Keranjang</h3>
          <span class="breadcrumb"><a href="/">Beranda</a> > Keranjang</span>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container mt-3">
      <form action="/transaction/store" method="POST">
        @csrf
        <div class="row trending-box">
          @foreach ($data as $item)
            <div class="list-cart">
              <!-- Keperluan post -->
              <input type="hidden" name="place_id[]" value="{{ $item->cartDetail[0]->place->id }}">
              <input type="hidden" name="price[]" value="{{ $item->cartDetail[0]->place->price }}">
              <div class="row mb-5">
                <div class="col-12 trending-items">
                  <div class="item p-4">
                    <h4><button type="button" data-id="{{ $item->id }}" class="btn btn-sm btn-danger delete-item"><i class="fa fa-times"></i></button> {{ $item->code }}</h4>
                    <div class="row mt-2">
                      <div class="col-2">
                        <img class="rounded" src="{{ $item->cartDetail[0]->place->placeDetails[0]->images }}" alt="">
                      </div>
                      <div class="col">
                        <h5 class="fw-bold">{{ $item->cartDetail[0]->place->name }}</h5>
                        {!! $item->cartDetail[0]->place->description !!}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <br><span class="price bg-success text-white rounded p-2">{{ "Rp ".str_replace(",", ".", number_format($item->cartDetail[0]->place->price)) }}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <button type="submit" class="btn btn-success btn-block btn-md" style="float: right"><i class="fa fa-check"></i> Checkout</button>
      </form>
    </div>
  </div>
@endsection

@push('js')
    <script>
      $('.delete-item').click(function(){
        let id = $(this).data('id');
        let elem = $(this);
        swalConfirm('hapus', function(){
          $.ajax({
            url : `/cart/delete/${id}`,
            type : "GET",
            success:function(res){
              toast("Berhasil Hapus!");
              elem.parents().closest('.list-cart').remove();
            }
          });
        });
      });
    </script>
@endpush