@extends('backend.master')
@section('content')
    <div class="row">
            <div class="col s12">
              <div class="card">
                <div class="card-content">
                  <h5 class="title">Logs Data Monitoring Kolam pada Akun <b>{{auth()->user()->name}}</b></h5>
                  <br>
                </div>
              </div>
            </div>
          </div>
          

          <div class="row">
            @for ($i = 0; $i <count($ref); $i++)
            <div class="col l6 m6 s12">
              <div class="card">
                  <div class="card-content">
                      <div class="d-flex align-items-center no-block">
                          <div>
                              <h3 class="font-light">{{$key[$i]}}</h3>
                              <h6 class="active">Terakhir di update : {{date('Y-m-d h:i:s', strtotime($refdetail[$i]['updated_at']));}} </h6>
                          </div>
                          <div class="ml-auto">
                              <div data-label="20%" class="css-bar m-b-0 css-bar-primary css-bar-20"><a href="{{url('log/'.$key[$i])}}"><button class="waves-effect waves-light green btn"><i class="material-icons dp48 top tooltipped green" data-position="top" data-delay="50" data-tooltip="Lihat">remove_red_eye</i></button></a>
                              <a href="{{url('kolam/edit/'.$key[$i])}}"><button class="waves-effect waves-light orange btn "><i class="material-icons dp48 top tooltipped orange" data-position="top" data-delay="50" data-tooltip="Edit">edit</i></button></a>
                              <a href="{{url('kolam/delete/'.$key[$i])}}"><button class="waves-effect waves-light red btn "><i class="material-icons dp48 top tooltipped red" data-position="top" data-delay="50" data-tooltip="Hapus">delete</i></button></a>
                              
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>    
            @endfor
            
        
          </div>
            <div class="fixed-action-btn">
              <a class="btn-floating btn-large blue waves-effect waves-light" href="{{url('kolam/create')}}">
                <i class="large material-icons">add</i>aa
              </a>
            </div>    
@endsection