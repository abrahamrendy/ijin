<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use QrCode;
use DNS2D;
use Storage;
use Image;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $count = DB::table('registrant')->where('type',1)->count();
        $limit = false;
        // if ($count >= 66) {
        //     $limit = true;
        // }
        return view('fail',['limit'=>$limit]);
    }

    public function check_user ($fullname,$dob) {
        $birth = date("Y-m-d", strtotime($dob));
        $arrName = explode(' ', $fullname);
        $name = $arrName[0];
        $isExist = DB::table('peserta')
                                        ->where([
                                                    ['fullname', 'like', '%'.$name.'%'],
                                                    ['birth', '=', $birth]
                                                ])
                                        ->get();

        return json_encode($isExist);
    }

    public function getType() {
        $type = DB::table('category')->get();
        return json_encode($type);
    }

    public function permit( Request $request ) {
        $type = strip_tags($request->input('type'));
        $user_id = strip_tags($request->input('name'));
        $date = strip_tags($request->input('dnh'));
        $details = strip_tags($request->input('details'));
        $currDate = date('Y-m-d H:i:s' , strtotime('now'));

        $user = DB::table('user')->where('id',$user_id)->first();

        if (!empty($user)) {
            $insert = DB::table('permit')->insertGetId(
                                        ['user_id' => $user_id,
                                         'category_id' => $type,
                                         'date' => $date,
                                         'details' => $details,
                                         'status' => 0,
                                         'created_at' => $currDate,
                                        ] );
        }
    }

    public function sendRegisterEmail ($to,$code,$name) {
        $url = url('/');
        $subject = 'Your ASSEMBLE - NextGen Leaders Conference 2020 e-Ticket';
        $message = '<html>
                        <head>
                            <title>ASSEMBLE - NextGen Leaders Conference 2020</title>
                        </head>
                        <body>
                            <table width=700px style="background-color:#07121E; padding:40px 40px">
                                <tr>
                                    <td>
                                        <table width=100% style="background-color: #1d252f; padding:20px 20px;font-family: sans-serif;color: #fff">
                                            <tr><td><br>
                                            <tr>
                                                <td align="center">
                                                    <p>
                                                    <h1 style="word-break: break-word;">Registration Code</h1>
                                                    <h3 style="word-break: break-word;">ASSEMBLE - NextGen Leaders Conference 2020</h3>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div style="display: inline-block;width: 100%">
                                                        <img src="https://assemble.gbisukawarna.org/img/ASSEMBLE!.jpg" width="100%">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <p>
                                                        Cetak atau tunjukkan lembar ini untuk melakukan registrasi ulang.
                                                    </p>
                                                    <hr>
                                                    <p>
                                                        <i>Print or show this receipt to re-registration at our booth.</i>
                                                    </p>
                                                    <br>
                                                    <div style="background-color: #fff; display: inline-block; padding: 15px;">
                                                        <img src="'.asset('img/qrcodes/'.$code.'.png').'"></img>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr><td><br>
                                            <tr><td><br>

                                            <tr>
                                                <td>
                                                    <p style="color: #848484; font-size: 15px">
                                                        Details:
                                                    </p>
                                                    <p style="line-height: 20px;">
                                                        <b>Code: '.$code.'</b>
                                                        <br>
                                                        Name: '.$name.'
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr><td><br>
                                            <tr>
                                                <td>
                                                    <p style="color: #848484; font-size: 15px">
                                                        Venue Details:
                                                    </p>
                                                    <p style="line-height: 20px;">
                                                        Location: <b>Villa Diamond</b>
                                                        <br>
                                                        Address: <b>Jl. Sersan Bajuri KM 3,8 Lembang, Bandung, Jawa Barat</b>
                                                        <br>
                                                        Date: <b>3-5 Maret 2020</b>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr><td><br>
                                            <tr><td><br>
                                            <tr>
                                                <td>
                                                    <div style="
                                                    background-color: #560100;
                                                    font-family: sans-serif;
                                                    position: relative;
                                                    text-align: center;
                                                    color: white;
                                                    border-color: #560100 !important;
                                                    border-width: 1px;
                                                    border-radius: 3px;
                                                    border-style: solid;
                                                    -webkit-transition: all 0.5s;
                                                    -o-transition: all 0.5s;
                                                    transition: all 0.5s;
                                                    padding: 10px;
                                                    display: none;
                                                    ">
                                                        Konter Penukaran E-Ticket dibuka mulai <b>pkl 16.00</b>.
                                                        <hr>
                                                        E-Ticket Exchange Counter open at <b>4:00 PM</b>.
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr><td><br>
                                            <tr>
                                                <td>
                                                    <div style="
                                                    background-color: #560100;
                                                    font-family: sans-serif;
                                                    position: relative;
                                                    text-align: center;
                                                    color: white;
                                                    border-color: #560100 !important;
                                                    border-width: 1px;
                                                    border-radius: 3px;
                                                    border-style: solid;
                                                    -webkit-transition: all 0.5s;
                                                    -o-transition: all 0.5s;
                                                    transition: all 0.5s;
                                                    padding: 10px;
                                                    display: none;
                                                    ">
                                                        <div>
                                                        </div>
                                                        <div>
                                                            <b>Informasi.</b> Pintu dibuka 1 jam sebelum acara dimulai.
                                                            <hr>
                                                            <b>Information.</b> Door Open 1 hour before start time.
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr><td><br>
                                            <tr><td><br>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </body>
                    </html>';
        $type = 'html'; // or HTML
        $charset = 'utf-8';

        // Headers
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        $headers[] = 'From: GBI Sukawarna <gbisukawarna@gbisukawarna.org>';
        //End of send email//
        return mail($to, $subject, $message, implode("\r\n", $headers));                                                                              
    }
}
