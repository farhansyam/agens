@extends('backend.master')
@section('content')
<div class="card">
    <div class="card-content">
        <h5 class=" activator" style="font-size:24px; ">Edit Data Kolam<i class="material-icons right tooltipped" data-position="left" data-delay="50" data-tooltip="Get Code">more_vert</i></h5>
        <form action="{{url('kolam/setupdate')}}" method="post"><br>
            @csrf
            <div class="row">
                <div class="input-field col s12">
                    <h2 class="card-title">Nama Kolam</h2>
                    <input type="text" name="namaKolam" id="" value="{{$ref['namaKolam']}}">
                    <input type="text" name="kodeKolam" id="" value="{{$kodeKolam}}" style="display: none">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <h2 class="card-title">Diameter</h2>
                    <input type="text" name="diameter" id="" value="{{$ref['diameter']}}">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <h2 class="card-title">Ketinggian</h2>
                    <input type="text" name="ketinggian" id="" value="{{$ref['ketinggian']}}">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button class="btn green waves-effect waves-light right" type="submit" name="action">Set</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection