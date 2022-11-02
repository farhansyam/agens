@extends('backend.master')
@section('content')
<div class="card">
    <div class="card-content">
        <h5 class=" activator" style="font-size:24px; ">Form Penambahan Monitoring kolam baru<i class="material-icons right tooltipped" data-position="left" data-delay="50" data-tooltip="Get Code">more_vert</i></h5>
            <form action="{{url('kolam/set')}}" method="post" ><br>
                        @csrf
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="Contoh : Kolam-1" name="kodeKolam" id="kodeKolam" type="text">
                                <label for="kodeKolam" class="active" style="font-size:18px; font-weight:bold;">Kode Kolam</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="Contoh : Kolam A" id="nama" type="text" name="namaKolam">
                                <label for="nama" class="active" style="font-size:18px; font-weight:bold;">Nama Kolam</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="Contoh : 100 M" id="diameter" type="number" name="diameter">
                                <label for="diameter" class="active" style="font-size:18px; font-weight:bold;">Diameter</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="Contoh : 50 M" id="ketinggian" name="ketinggian">
                                <label for="ketinggian" class="active" style="font-size:18px; font-weight:bold;">Ketinggian</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <button class="btn green waves-effect waves-light right" type="submit" name="action">Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div></div>
@endsection
