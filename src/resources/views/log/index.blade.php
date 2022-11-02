@extends('backend.master')
@section('content')
<div class="row">
            <div class="col s12">
              <div class="card">
                <div class="card-content">
                  <h5 class="card-title">DETAIL KOLAM</h5>
                  <h5 class="card-title"><span style="font-weight:300;"> Nama Kolam   :</span> {{$ref['namaKolam']}}</h5>
                  <h5 class="card-title"><span style="font-weight:300;"> Ketinggian   :</span> {{$ref['ketinggian']}}</h5>
                  <h5 class="card-title"><span style="font-weight:300;"> Diameter     :</span> {{$ref['diameter']}}</h5>
                  <h5 class="card-title"><span style="font-weight:300;"> Terakhir Update :</span> {{date('Y-m-d h:i:s', @$ref['updated_at'])}}</h5>
                </div>
              </div>
            </div>
</div>
          <div class="row">
            <!-- col -->
            <div class="col m6 s12 l3">
              <div class="card">
                <div class="p-15">
                  <div class="d-flex no-block align-items-center">
                    <div class="m-r-10 red-text text-accent-4">
                      {{-- <i class="small material-icons">insert_chart</i> --}}
                      <span class="iconify" data-icon="mdi:thermometer" data-width="48" data-height="48"></span>
                    </div>
                    <div>
                      <span>Temperature</span>
                      <h4 class="font-medium m-b-0"><span class="temp">{{$ref['temp']}}</span> ° C</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- col -->
            <!-- col -->
            <div class="col m6 s12 l3">
              <div class="card">
                <div class="p-15">
                  <div class="d-flex no-block align-items-center">
                    <div class="m-r-10 light-blue-text">
                      <span class="iconify" data-icon="ic:sharp-water-drop" data-width="48"></span>
                    </div>
                    <div>
                      <span>Ph Air</span>
                      <h4 class="font-medium m-b-0 ph">{{ceil($ref['ph'])}}</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- col -->
            <!-- col -->
            <div class="col m6 s12 l3">
              <div class="card">
                <div class="p-15">
                  <div class="d-flex no-block align-items-center">
                    <div class="m-r-10 orange-text text-darken-2 text-darken-1">
                      <span class="iconify" data-icon="bx:water" data-width="48" data-height="48"></span>
                    </div>
                    <div>
                      <span>Turbidity</span>
                      <h4 class="font-medium m-b-0"><span class="turbidity">{{ceil($ref['turbidity'])}}</span> NTU</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- col -->
            <!-- col -->
            <div class="col m6 s12 l3">
              <div class="card">
                <div class="p-15">
                  <div class="d-flex no-block align-items-center">
                    <div class="m-r-10 deep-purple-text text-accent-2">
                      <span class="iconify" data-icon="healthicons:oxygen-tank" data-width="48" data-height="48"></span>
                    </div>
                    <div>
                      <span>Oxygen</span>
                      <h4 class="font-medium m-b-0"><span class="oxygen"> <!-- {{$ref['oxygen']}} --> </span> mV</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- col -->
          </div>`
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
          <script>

            // realtime monitor
        setInterval(function()
        {
          var second = parseInt((new Date().getTime() / 1000) % 30);
            if(second === 0) {
                var url = "{{url('kolam/detail/'.$col)}}";
                $.get(url, function(data, status) {
                  $(".oxygen").text(data.oxygen);
                  $(".ph").text(Math.ceil(data.ph));
                  $(".temp").text(data.temp);
                  $(".turbidity").text(Math.ceil(data.turbidity));
                  console.log('update data monitoring')
                  }
                );
              }
        },1000); // or less than 1 sec    
          </script>
<script src="https://code.highcharts.com/highcharts.js"></script>
  <div class="row">
    <div class="col s6">
        <div id="grafik-ph" style="height: 240px; width:100%"></div>
    </div>
    <div class="col s6">
        <div id="grafik-temp" style="height: 240px; width:100%"></div>
    </div> 
  </div>
  <br>
<div class="row">
    <div class="col s6">
        <div id="grafik-oxy" style="height: 240px;"></div>
    </div>
    <div class="col s6">
        <div id="grafik-turbidity" style="height: 240px; width:100%"></div>
    </div>
</div>
<div class="container-fluid">
    <div class="card">
        <table class="responsive-table centered ">
            <tr class="center-align centered">
                <th>Jam</th>
                <th>Temp</th>
                <th>Kekeruhan</th>
                <th>Ph</th>
                <th>Oxygen</th>
            </tr>
            @foreach ($kolam as $data)
            <tr class="centered">
                <td>
                    {{$data->data()['jam']}}
                </td>
                <td>
                    {{$data->data()['temp']}}
                </td>
                <td>
                    {{$data->data()['turbidity']}}
                </td>
                <td>
                    {{$data->data()['ph']}}
                </td>
                <td>
                    {{$data->data()['oxygen']}}
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

<script>
    var ph = <?= json_encode($phs)?>;
    var time = <?= json_encode($jams)?>;
    var turbidity = <?= json_encode($turb)?>;
    Highcharts.chart('grafik-ph',{
        title : {
            text : 'PH Air'
        },
         subtitle: {
        text: 'ph air kolam'
         },
        xAxis : {
            categories : time,
            title:{
                text:"Jam"
            }
        },
        yAxis : {
            title:{
                text : 'Ph Air'
            }
        },
        legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
        plotOption : {
            series :{
                allowPointSelect: true
                }
        },
        series:[
            {
                name: 'PH Air',
                data:ph
            }
        ]

    })

</script>
<script>
    var ph = <?= json_encode($temp)?>;
    var turbidity = <?= json_encode($turb)?>;
    Highcharts.chart('grafik-temp',{
        title : {
            text : 'Temperatur Air'
        },
         subtitle: {
        text: 'Temperatur air kolam'
         },
        xAxis : {
            categories : time,
            title:{
                text:"Jam"
            }
        },
        yAxis : {
            title:{
                text : 'temp Air'
            }
        },
        legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
        plotOption : {
            series :{
                allowPointSelect: true
                }
        },
        series:[
            {
                name: 'Temperature Air',
                data:ph
            }
        ]

    })

</script>
<script>

    var ph = <?= json_encode($oxy)?>;
    var turbidity = <?= json_encode($turb)?>;
    Highcharts.chart('grafik-oxy',{
        title : {
            text : 'Kadar Oxygen Air'
        },
         subtitle: {
        text: 'Kadar Oxygen air kolam'
         },
        xAxis : {
            categories : time,
            title:{
                text:"Jam"
            }
        },
        yAxis : {
            title:{
                text : 'Oxygen'
            }
        },
        legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
        plotOption : {
            series :{
                allowPointSelect: true
                }
        },
        series:[
            {
                name: 'Oxygen',
                data:ph
            }
        ]

    })

</script>
<script>

    var ph = <?= json_encode($turb)?>;
    var turbidity = <?= json_encode($turb)?>;
    Highcharts.chart('grafik-turbidity',{
        title : {
            text : 'Kekeruhan Air'
        },
         subtitle: {
        text: 'Kekeruhan air kolam'
         },
        xAxis : {
            categories : time,
            title:{
                text:"Jam"
            }
        },
        yAxis : {
            title:{
                text : 'Kekeruhan Air'
            }
        },
        legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
        plotOption : {
            series :{
                allowPointSelect: true
                }
        },
        series:[
            {
                name: 'Kekeruhan Air',
                data:ph
            }
        ]

    })

</script>
@endsection