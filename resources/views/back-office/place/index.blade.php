@extends('layouts.back-office')

@section('title', 'Master')
@section('title-desc', 'Data utama')

@section('content')
<div class="box-header with-border">
    <h3 class="box-title">Data Tempat <button type="button" class="btn btn-xs btn-success add"><i class="fa fa-plus"></i></button></h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
    </div>
</div>
<div class="box-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>

    <!-- dynamic modal -->
    <div class="modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <b class="title-modal">...</b>
                    <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-place">
                        
                        <div class="form-group">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control name" name="name">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Latitude</label>
                            <input type="text" class="form-control latitude" name="latitude">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Longitude</label>
                            <input type="text" class="form-control longitude" name="longitude">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select name="status" id="" class="form-control status">
                                <option value="1">Ready</option>
                                <option value="2">Booked</option>
                                <option value="3">Closed</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="action btn btn-primary" data-type="">...</button>
                    <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('back-office/page/js/place.js') }}"></script>
@endpush