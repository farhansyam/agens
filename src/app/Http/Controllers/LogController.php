<?php

namespace App\Http\Controllers;

use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Database;
use App\Models\notif;


use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $factory = (new Factory)
        ->withServiceAccount(__DIR__.'/monitoring-kolam.json')
        ->withDatabaseUri('https://monitoring-kolam-6febd-default-rtdb.firebaseio.com');

        $this->auth = $factory->createAuth();
        $this->database = $factory->createDatabase();
    }

    public function index($kolam)
    {   
         $notifs = notif::whereStatus(1)->get();
         $jumlahNotif = count($notifs);
         $ref = $this->database->getReference(auth()->user()->name.'/'.$kolam)->getValue();
        $col = $kolam;
        $factory = (new Factory)
        ->withServiceAccount(__DIR__.'/monitoring-kolam.json');
        $firestore = $factory->createFirestore();
        $kolam = $firestore->database()->collection(auth()->user()->name.'/'.$kolam.'/update')->orderby('jam','DESC')->limit(6)->documents(); //FireStoreClient Object
        foreach($kolam as $k)
            $jams[] = date('h:i', strtotime($k->data()['jam'].' + 5 hours'));
        foreach($kolam as $k)
            $phs[] = $k->data()['ph'];
        foreach($kolam as $k)
            $turb[] = $k->data()['turbidity'];
        foreach($kolam as $k)
            $temp[] = $k->data()['temp'];
        foreach($kolam as $k)
            $oxy[] = $k->data()['oxygen'];
        return view('log.index',compact('kolam','jams','phs','turb','temp','oxy','ref','col','jumlahNotif','notifs'));
    }

    public function listkolam()
    {    $notifs = notif::whereStatus(1)->get();
         $jumlahNotif = count($notifs);
        
        $user = auth()->user()->name;

        $ref = $this->database->getReference($user)->getValue();
        if($ref == false){
        $buat = $this->database->getReference($user.'/'."kolam-1")
        ->set([
            
                "diameter" => 20,
                "ketinggian" => 20,
                "namaKolam" => "Kolam-1",
                "oxygen" => 0,
                "ph" => 0,
                "temp" => 0,
                "turbidity" => 0,
                "updated_at" => "Nan"
            
        ]);
        $factory = (new Factory)
        ->withServiceAccount(__DIR__.'/monitoring-kolam.json');
        $firestore = $factory->createFirestore();
        $kolam = $firestore->database()->collection(auth()->user()->name.'/kolam-1/update')->newDocument()->set([
                "jam" => 20,
                "temp" => 20,
                "oxygen" => 0,
                "ph" => 0,
                "turbidity" => 0,
        ]); //FireStoreClient Object
        $key = $this->database->getReference($user)->getChildKeys();

        return view('log.log_list',compact('buat','key'));

        }
        $key = $this->database->getReference($user)->getChildKeys();
        foreach($key as $keys)
        $refdetail[] = $this->database->getReference(auth()->user()->name.'/'.$keys)->getValue();
        return view('log.log_list',compact('ref','key','refdetail','jumlahNotif','notifs'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
