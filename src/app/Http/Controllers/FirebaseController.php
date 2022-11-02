<?php

namespace App\Http\Controllers;

use Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Factory;
use App\Models\User;
use App\Models\notif;
use Kreait\Firebase\Auth;
use Firebase\Auth\Token\Exception\InvalidToken;
use Kreait\Firebase\Exception\Auth\RevokedIdToken;
use App\Notifications\SendPushNotification;


class FirebaseController extends Controller
{
    protected $auth, $database;

    public function __construct()
    {
        $factory = (new Factory)
        ->withServiceAccount(__DIR__.'/monitoring-kolam.json')
        ->withDatabaseUri('https://monitoring-kolam-6febd-default-rtdb.firebaseio.com');

        $this->auth = $factory->createAuth();
        $this->database = $factory->createDatabase();
    }

    public function signUp()
    {
        $email = "angelicdemon@gmail.com";
        $pass = "anya123";

        try {
            $newUser = $this->auth->createUserWithEmailAndPassword($email, $pass);
            dd($newUser);
        } catch (\Throwable $e) {
            switch ($e->getMessage()) {
                case 'The email address is already in use by another account.':
                    dd("Email sudah digunakan.");
                    break;
                case 'A password must be a string with at least 6 characters.':
                    dd("Kata sandi minimal 6 karakter.");
                    break;
                default:
                    dd($e->getMessage());
                    break;
            }
        }
    }

    public function signIn()
    {
        $email = "angelicdemon@gmail.com";
        $pass = "anya123";

        try {
            $signInResult = $this->auth->signInWithEmailAndPassword($email, $pass);
            // dump($signInResult->data());

            Session::put('firebaseUserId', $signInResult->firebaseUserId());
            Session::put('idToken', $signInResult->idToken());
            Session::save();

            dd($signInResult);
        } catch (\Throwable $e) {
            switch ($e->getMessage()) {
                case 'INVALID_PASSWORD':
                    dd("Kata sandi salah!.");
                    break;
                case 'EMAIL_NOT_FOUND':
                    dd("Email tidak ditemukan.");
                    break;
                default:
                    dd($e->getMessage());
                    break;
            }
        }
    }

    public function signOut()
    {
        if (Session::has('firebaseUserId') && Session::has('idToken')) {
            // dd("User masih login.");
            $this->auth->revokeRefreshTokens(Session::get('firebaseUserId'));
            Session::forget('firebaseUserId');
            Session::forget('idToken');
            Session::save();
            dd("User berhasil logout.");
        } else {
            dd("User belum login.");
        }
    }

    public function userCheck()
    {
        // $idToken = "";

        // $this->auth->revokeRefreshTokens("");

        // if (Session::has('firebaseUserId') && Session::has('idToken')) {
        //     dd("User masih login.");
        // } else {
        //     dd("User sudah logout.");
        // }

        try {
            $verifiedIdToken = $this->auth->verifyIdToken($idToken, $checkIfRevoked = true);
            dump($verifiedIdToken);
            dump($verifiedIdToken->claims()->get('sub')); // uid
            dump($this->auth->getUser($verifiedIdToken->claims()->get('sub')));
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }

        // try {
        //     $verifiedIdToken = $this->auth->verifyIdToken(Session::get('idToken'), $checkIfRevoked = true);
        //     $response = "valid";
        //     // dd("Valid");
        //     // $uid = $verifiedIdToken->getClaim('sub');
        //     // $user = $auth->getUser($uid);
        //     // dump($uid);
        //     // dump($user);
        // } catch (\InvalidArgumentException $e) {
        //     // dd('The token could not be parsed: '.$e->getMessage());
        //     $response = "The token could not be parsed: " . $e->getMessage();
        // } catch (InvalidToken $e) {
        //     // dd('The token is invalid: '.$e->getMessage());
        //     $response = "The token is invalid: " . $e->getMessage();
        // } catch (RevokedIdToken $e) {
        //     $response = "revoked";
        // } catch (\Throwable $e) {
        //     if (substr(
        //         $e->getMessage(),
        //         0,
        //         21
        //     ) == "This token is expired") {
        //         $response = "expired";
        //     } else {
        //         $response = "something_wrong";
        //     }
        // }
        // return $response;
    }

     // Block Notif
    public function notifPh()
    {
        $title = "🐟 Agens Notif 🐟";
        $message = " PH Air Kolam Terlalu rendah Segera Cek";
        $fcmTokens = auth()->user()->device_token;
        // $fcmTokens =
        notif::create([
                     'judul' => 'Ph Air Rendah',
                       'deskripsi' => "Ph air rendah segera cek",
                       'status' => 1, 
                       'time' => date("Y-m-d H:i:s")]);

        Notification::send(null,new SendPushNotification($title,$message,$fcmTokens));
    }
    public function notifTemp()
    {
        $title = "🐟 Agens Notif 🐟";
        $message = "🔥 Suhu Air Kolam Terlalu Panas Segera Cek";
        notif::create([
                       'judul' => "Suhu air panas",
                       'deskripsi' => "Suhu air panas segera cek",
                       'status' => 1, 
                       'time' => date("Y-m-d H:i:s")]);

        $fcmTokens = auth()->user()->device_token;
        // $fcmTokens =
        Notification::send(null,new SendPushNotification($title,$message,$fcmTokens));
    }
    public function notifOxy()
    {
        $title = "🐟 Agens Notif 🐟";
        $message = "Kadar Oxygen Kolam Terlalu Rendah";
        notif::create([
                       'judul' => "Oxygen Air Rendah",
                       'deskripsi' => "Oxygenn air rendah segera cek",
                       'status' => 1, 
                       'time' => date("Y-m-d H:i:s")]);

        $fcmTokens = auth()->user()->device_token;
        // $fcmTokens =
        Notification::send(null,new SendPushNotification($title,$message,$fcmTokens));
    }
    public function notifKeruh()
    {
        
        $title = "🐟 Agens Notif 🐟";
        $message = "Air Kolam Terlalu Keruh Segera Cek";
        $fcmTokens = auth()->user()->device_token;
        
        auth()->user()->notify(new SendPushNotification($title,$message,$fcmTokens));
        // $fcmTokens =
       notif::create([
                       'judul' => "Air Terlalu keruh",
                       'deskripsi' => "Air kolam keruh segera cek",
                       'status' => 1, 
                       'time' => date("Y-m-d H:i:s")]);
    }

    public function read()
    {
        $notifs = notif::whereStatus(1)->get();
        $jumlahNotif = count($notifs);

        $user = auth()->user()->name;
        // $ref = $this->database->getReference($user)->getValue();
        $factory = (new Factory)
        ->withServiceAccount(__DIR__.'/monitoring-kolam.json');
        $firestore = $factory->createFirestore();
        $col = 'kolam-1';

        $kolam = $firestore->database()->collection(auth()->user()->name.'/'.'kolam-1/update-harian')->orderby('jam','DESC')->limit(7)->documents(); //FireStoreClient Object
        if($kolam == NULL){
            $factory = (new Factory)
        ->withServiceAccount(__DIR__.'/monitoring-kolam.json');
        $firestore = $factory->createFirestore();
        $kolam = $firestore->database()->collection(auth()->user()->name.'/kolam-1/update-harian')->newDocument()->set([
                "jam" => "10.10.10",
                "temp" => 20,
                "oxygen" => 0,
                "ph" => 0,
                "turbidity" => 0,
        ]); //FireStoreClient Object
        
        }


        $ref = $this->database->getReference(auth()->user()->name.'/'.'kolam-1')->getValue();
        foreach($kolam as $k)
            $tanggal[] = date('Y-m-d', strtotime($k->data()['jam']));
        foreach($kolam as $k)
            $phs[] = $k->data()['ph'];
        foreach($kolam as $k)
            $turb[] = $k->data()['turbidity'];
        foreach($kolam as $k)
            $temp[] = $k->data()['temp'];
        foreach($kolam as $k)
            $oxy[] = $k->data()['oxygen'];
        // return view('log.index',compact());
        $total = $this->database->getReference($user)->getValue();
        $kolams = count($total);
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
            
        }
        return view('home',compact('kolams','ref','kolam','tanggal','phs','turb','temp','oxy','ref','col','notifs','jumlahNotif'));
    }

    public function update(Request $request)
    {
        // before
        $user = auth()->user()->name;
        $refData = $this->database->getReference($user.'/'.$request->kodeKolam)->getValue();
        $ref = $this->database->getReference($user.'/'.$request->kodeKolam)
        ->update([
            
                "diameter" => $request->diameter,
                "ketinggian" => $request->ketinggian,
                "namaKolam" => $request->namaKolam,
                "oxygen" => $refData['oxygen'],
                "ph" => $refData['ph'],
                "temp" => $refData['temp'],
                "turbidity" => $refData['turbidity'],
            
        ]);

        return redirect('log');
    }

    public function set(Request $request)
    {
        // set data
        $user = auth()->user()->name;
        $ref = $this->database->getReference($user.'/'.$request->kodeKolam)
        ->set([
            
                "diameter" => $request->diameter,
                "ketinggian" => $request->ketinggian,
                "namaKolam" => $request->namaKolam,
                "oxygen" => 0,
                "ph" => 0,
                "temp" => 0,
                "turbidity" => 0,
                "updated_at" => "nan"
            
        ]);
        

        // after
        return redirect('dashboard');
    }
    
    public function delete($kodeKolam)
    {
        $user = auth()->user()->name;
        $ref = $this->database->getReference($user.'/'.$kodeKolam)->remove();
        return redirect('read');
    }

    public function create()
    {
        return view('backend.createKolam');
    }

    // public function detail($kodeKolam)
    // {
    //     $ref = $this->database->getReference(auth()->user()->name.'/'.$kodeKolam)->getValue();
    //     return view('backend.detail',compact('ref','kodeKolam'));
    // }
    public function detailApi($kodeKolam)
    {
        $user = auth()->user()->name;
        $ref = $this->database->getReference($user.'/'.$kodeKolam)->getValue();
        return($ref);
    }
    public function edit($kodeKolam)
    {
         $notifs = notif::whereStatus(1)->get();
        $jumlahNotif = count($notifs);
        $kode = $kodeKolam;
        $user = auth()->user()->name;
        $ref = $this->database->getReference($user.'/'.$kodeKolam)->getValue();
        return view('backend.editKolam',compact('ref','kodeKolam','jumlahNotif','notifs'));
    }
        
    // Notif
    public function updateToken(Request $request){
    try{
        $request->user()->update(['device_token'=>$request->token]);
        return response()->json([
            'success'=>true
        ]);
    }catch(\Exception $e){
        report($e);
        return response()->json([
            'success'=>false
        ],500);
    }
    }
    

    public function notification(Request $request){
    $request->validate([
        'title'=>'required',
        'message'=>'required'
    ]);

    try{
        $fcmTokens = User::whereNotNull('device_token')->pluck('device_token')->toArray();

        //Notification::send(null,new SendPushNotification($request->title,$request->message,$fcmTokens));

        /* or */

        //auth()->user()->notify(new SendPushNotification($title,$message,$fcmTokens));

        /* or */

        Larafirebase::withTitle($request->title)
            ->withBody($request->message)
            ->sendMessage($fcmTokens);

        return redirect()->back()->with('success','Notification Sent Successfully!!');

    }catch(\Exception $e){
        report($e);
        return redirect()->back()->with('error','Something goes wrong while sending notification.');
    }
}
}