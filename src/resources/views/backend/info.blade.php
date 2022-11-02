@extends('backend.master')
@section('content')

<style>
  .banner{
    margin-left:-20px;
    margin-top:-30px;
  }

  @media only screen and (min-width: 722px) {
    .banner {
        width:100px;
    }
  }
</style>
<div class="banner">
    <img src="{{asset('assets/images/banner.png')}}" alt="" width="1300" class="card-image">
</div>   
<div class="row">
    <div class="col s12">
        <div class="card-content container">
            <div class="row">
            <div class="col s12 m6" style="margin-top:50px;">
                <h5 class="card-title" style=" font-size:24px;  color: #194cbc; font-weight:bold;">Mengapa Perlu Monitoring?</h5>
                <p class="mt-4">
                    PH meter adalah sebuah alat elektronik yang berfungsi untuk mengukur pH (derajat keasaman atau kebasaan) suatu cairan (ada elektroda khusus yang berfungsi untuk mengukur pH bahan-bahan semi-padat). 
                </p>
                <p>
                    Sebuah pH meter terdiri dari sebuah elektroda (probe pengukur) yang terhubung ke sebuah alat elektronik yang mengukur dan menampilkan nilai pH. Alat ini sangat berguna untuk industri air minum, laboratorium, akuarium.
                </p>
            </div>
            <div class="col s12 m6">
                <img src="{{('assets/images/dashboard.png')}}" style="width:380px;">
            </div>
            </div>
        
    </div>
</div>
<div class="row">
    <div class="col s12">
        <div class="card">
        <div class="card-content">
            <h5 class="card-title">Faqs AGENS</h5>
            <br>
            <ul class="collapsible popout collapsible-dark">
            <li class="">
                <div class="collapsible-header" tabindex="0"><i class="material-icons">question_answer</i>Apa itu
                Aplikasi AGENS?
                </div>
                <div class="collapsible-body" style=""><span>
                    Artificial Intelligence and Internet of Fish (AGENS) merupakan sebuah alat monitoring kualitas air dan sebagai kontrol mesin aerator pada kolam budidaya ikan. 
                    Alat ini terdiri dari perangkat keras yang bekerja sebagai indikasi kualitas air dalam segi kelembaban, ph, kekeruhan, dan oksidasi; 
                    dan perangkat lunak yang berbasis website sebagai indikator yang diperoleh dari hasil kerja  perangkat keras.</span></div>
            </li>
            <li class="">
                <div class="collapsible-header" tabindex="0"><i class="material-icons">question_answer</i>Bagaimana
                cara kerjanya?</div>
                <div class="collapsible-body" style=""><span>Anim pariatur cliche reprehenderit,
                    enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon
                    officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                    nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a
                    bird on it squid single-origin coffee nulla assumenda shoreditch et.
                    Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                    nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                    Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth
                    nesciunt you probably haven't heard of them accusamus labore sustainable
                    VHS.</span></div>
            </li>
            <li class="">
                <div class="collapsible-header" tabindex="0"><i class="material-icons">question_answer</i>Bagaimana
                cara memakainya?
                </div>
                <div class="collapsible-body" style=""><span>Anim pariatur cliche reprehenderit,
                    enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon
                    officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                    nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a
                    bird on it squid single-origin coffee nulla assumenda shoreditch et.
                    Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                    nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                    Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth
                    nesciunt you probably haven't heard of them accusamus labore sustainable
                    VHS.</span></div>
            </li>
            </ul>
        </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content container">
                <div class="row">
                    <div class="col s12 m4">
                        <img src="{{('assets/images/ph.png')}}" style="width:250px;">
                    </div>
                    <div class="col s12 m8" style="margin-top:20px;">
                        <h5 class="card-title" style=" font-size:24px;  color: #194cbc;">Sensor Ph</h5>
                        <p class="mt-4">
                            PH meter adalah sebuah alat elektronik yang berfungsi untuk mengukur pH (derajat keasaman atau kebasaan) suatu cairan (ada elektroda khusus yang berfungsi untuk mengukur pH bahan-bahan semi-padat). 
                            Sebuah pH meter terdiri dari sebuah elektroda (probe pengukur) yang terhubung ke sebuah alat elektronik yang mengukur dan menampilkan nilai pH. Alat ini sangat berguna untuk industri air minum, laboratorium, akuarium.
                        </p>
                    </div>
                    <div class="col s12 m12">
                        <h2 class="card-title" style="margin-bottom:15px; font-size:20px;  width:200px; bottom: -25px; height: -35px; background-image: linear-gradient(to top, #194cbc,#4b2de6); margin: 0 auto; border-radius:15px; color:#ffffff; text-align:center;">Kadar Sensor</h2>
                        <img src="" alt="">
                    </div>
                    <div class="col s12 m12">
                        <p class="mt-4">
                            OPTIMUS merupakan sebuah website yang berisi tentang bagaimana cara menerapkan pola hidup sehat. 
                            OPTIMUS memiliki berbagai fitur seperti tips hidup sehat, resep ramuan sehat, kalkulator BMI, dan mini game yang bisa dimainkan untuk hiburan.
                        </p>
                        <div class="card-image">
                            <img src="{{('assets/images/phalat.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content container">
                <div class="row">
                    <div class="col s12 m4">
                        <img src="{{('assets/images/orp.png')}}" style="width:250px;">
                    </div>
                    <div class="col s12 m8" style="margin-top:20px;">
                        <h5 class="card-title" style=" font-size:24px;  color: #194cbc;">Sensor ORP</h5>
                        <p class="mt-4">
                            Oxidation reducion potensial (ORP) adalah sebuah pengukuran (dalam mV) dari kecenderungan atau kekuatan yang menunjukkan apakah suatu larutan oksidator atau mengurangi (= deoxidizing).
                            Setiap angka positif menunjukkan bahwa larutan oksidator; yang lebih tinggi,  atau semakin oksidasi.  Teori yang sama berlaku pada sisi negatif, hanya dalam arah yang berlawanan; yang lebih rendah, semakin deoxidizing.  Dan tentu saja, semua angka negatif menunjukkan kecenderungan mengurangi atau deoxidizing.
                        </p>
                    </div>
                    <div class="col s12 m12">
                        <h2 class="card-title" style="margin-bottom:15px; font-size:20px;  width:200px; bottom: -25px; height: -35px; background-image: linear-gradient(to top, #194cbc,#4b2de6); margin: 0 auto; border-radius:15px; color:#ffffff; text-align:center;">Kadar Sensor</h2>
                        <img src="" alt="">
                    </div>
                    <div class="col s12 m12">
                        <p class="mt-4">
                            OPTIMUS merupakan sebuah website yang berisi tentang bagaimana cara menerapkan pola hidup sehat. 
                            OPTIMUS memiliki berbagai fitur seperti tips hidup sehat, resep ramuan sehat, kalkulator BMI, dan mini game yang bisa dimainkan untuk hiburan.
                        </p>
                        <div class="card-image">
                            <img src="{{('assets/images/kadarorp.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content container">
                <div class="row">
                    <div class="col s12 m4">
                        <img src="{{('assets/images/turb.png')}}" style="width:250px;">
                    </div>
                    <div class="col s12 m8" style="margin-top:10px;">
                        <h5 class="card-title" style=" font-size:24px;  color: #194cbc;">Sensor Turbidity</h5>
                        <p class="mt-3">
                            Turbidity sensor merupakan alat yang dapat mendeteksi serta membantu membaca tingkat kekeruhan air dengan membaca sifat optic air pada sinar. 
                            Sensor ini bekerja pada tegangan SVDC dan menghasilkan tegangan output di rentang 0 4.5 VDC.
                            Perubahan tingkat kekeruhan zat cair akan mempengaruhi jumlah cahaya yang akan di terima oleh receiver kemudian diolah menjadi sinyal listrik yang bisa di definikan sebagai perubahan nilai kekeruhan dengan satuan Nephelometric Turbidity Unit(NTU)
                        </p>
                    </div>
                    <div class="col s12 m12">
                        <h2 class="card-title" style="margin-bottom:15px; font-size:20px;  width:200px; bottom: -25px; height: -35px; background-image: linear-gradient(to top, #194cbc,#4b2de6); margin: 0 auto; border-radius:15px; color:#ffffff; text-align:center;">Kadar Sensor</h2>
                        <img src="" alt="">
                    </div>
                    <div class="col s12 m12">
                        <p class="mt-3">
                            OPTIMUS merupakan sebuah website yang berisi tentang bagaimana cara menerapkan pola hidup sehat. 
                            OPTIMUS memiliki berbagai fitur seperti tips hidup sehat, resep ramuan sehat, kalkulator BMI, dan mini game yang bisa dimainkan untuk hiburan.
                        </p>
                        <div class="card-image">
                            <img src="" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content container">
                <div class="row">
                    <div class="col s12 m4">
                        <img src="{{('assets/images/suhu.png')}}" style="width:250px;">
                    </div>
                    <div class="col s12 m8" style="margin-top:10px;">
                        <h5 class="card-title" style=" font-size:24px;  color: #194cbc;">Sensor Suhu</h5>
                        <p class="mt-3" >
                            Sensor Suhu atau Temperature Sensors adalah suatu komponen yang dapat mengubah besaran panas menjadi besaran listrik sehingga dapat mendeteksi gejala perubahan suhu pada obyek tertentu. 
                            Sensor suhu melakukan pengukuran terhadap jumlah energi panas/dingin yang dihasilkan oleh suatu obyek sehingga memungkinkan kita untuk mengetahui atau mendeteksi gejala perubahan-perubahan suhu tersebut dalam bentuk output Analog maupun Digital.
                        </p>
                    </div>
                    <div class="col s12 m12" >
                        <h2 class="card-title" style="margin-bottom:15px; font-size:20px;  width:200px; bottom: -25px; height: -35px; background-image: linear-gradient(to top, #194cbc,#4b2de6); margin: 0 auto; border-radius:15px; color:#ffffff; text-align:center;">Kadar Sensor</h2>
                        <img src="" alt="">
                    </div>
                    <div class="col s12 m12">
                        <p class="mt-3">
                            OPTIMUS merupakan sebuah website yang berisi tentang bagaimana cara menerapkan pola hidup sehat. 
                            OPTIMUS memiliki berbagai fitur seperti tips hidup sehat, resep ramuan sehat, kalkulator BMI, dan mini game yang bisa dimainkan untuk hiburan.
                        </p>
                        <div class="card-image">
                            <img src="" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection