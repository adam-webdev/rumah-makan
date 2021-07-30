@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')
<form action="{{route('barang.update', [$barang->id])}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <fieldset>
        <legend>Edit Data Barang</legend>
        <div class="form-group row">
            <div class="col-md-5">
                <label for="nama_barang">Nama Barang</label>
                <input id="nama_barang" type="text" name="nama_barang" class="form-control"
                    value="{{$barang->nama_barang}}" required>
            </div>
            <div class="col-md-5">
                <label for="kode_barang">Kode Barang</label>
                <input id="kode_barang" type="text" name="kode_barang" class="form-control"
                    value="{{$barang->kode_barang}}" required>
            </div>
            <div class="col-md-5">
                <label for="harga_barang">Harga Barang</label>
                <input id="harga_barang" type="text" name="harga_barang" class="form-control"
                    value="{{$barang->harga_barang}}" required>
            </div>
            <div class="col-md-5">
                <label for="jumlah_barang">Jumlah Barang</label>
                <input id="jumlah_barang" type="text" name="jumlah_barang" class="form-control" required value="{{$barang->jumlah_barang}}">
            </div>
        </div>
        {{-- <div class="form-group row">
            <div class="col-md-5">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                    <option selected value="{{$dokter->jenis_kelamin}}">
                        {{$dokter->jenis_kelamin}}</option>
                    @if($dokter->jenis_kelamin === 'Laki-laki')
                        <option value="P">Perempuan</option>
                    @else
                        <option value="L">Laki-laki</option>
                    @endif
                </select>
            </div>
            <div class="col-md-5">
                <label for="telepon">Nomor telepon</label>
                <input id="no_hp" type="text" name="no_hp" class="form-control" required value="{{$dokter->no_hp}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-5">
                <label for="tarif">Tarif </label>
            <input required id="tarif" type="text" name="tarif" value="{{$dokter->tarif}} "class="form-control">
            </div>
            <div class="col-md-5">
                <label for="Alamat">Alamat</label>
                <textarea id="alamat" type="text" name="alamat" cols="5" required rows="5" class="form-control" required
                    value="{{$dokter->alamat}}">{{$dokter->alamat}}</textarea>
                </div> --}}
        <input type="submit" class="btn btn-success btn-send" value="Update">
        <input type="Button" class="btn btn-primary btn-send" value="Kembali" onclick="history.go(-1)">
    </fieldset>
</form>
@endsection
