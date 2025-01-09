<?php

namespace App\Http\Controllers;

use App\Mpesa\STKPush;
use App\Models\MpesaSTK;
use Iankumu\Mpesa\Facades\Mpesa;//import the Facade
use Illuminate\Http\Request;
use Carbon\Carbon;

class MpesaSTKPUSHController extends Controller
{
    


    public function generateAccessToken(){
        // *** Authorization Request in PHP ***|
        $consumer_key = "pgjejy4DbAsfOoixtbSOfhKz8HweSak2YbIcEDAbevGvnXzb";
        $consumer_secret = "x9ysi72mhqljkHpNOp6e4foFp9tlAm6m9d6yD1coeMFhOwWGuIdOgnEhCBCPZeR6";
 
        $ch = curl_init('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Basic ' . base64_encode($consumer_key . ':' . $consumer_secret)]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        
        $access_token = json_decode($response);

        return $access_token->access_token;
    }

    // INITITAING stk

    Public function STKPush(){
        $BusinessShortCode = 174379;
        $passkey ='bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $timestamp= Carbon::rawParse('now')->format('YmdHms');

        $password = base64_encode($BusinessShortCode.$passkey.$timestamp);
        $Amount= 5;
        $PartyA = 254713631923;
        $PartyB = 174379;


        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
  
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer ACCESS_TOKEN')); //setting custom header
        
        
        $curl_post_data = array(
          //Fill in the request parameters with valid values
          'BusinessShortCode' => $BusinessShortCode,
          'Password' => $password,
          'Timestamp' => $timestamp,
          'TransactionType' => 'CustomerPayBillOnline',
          'Amount' => $Amount,
          'PartyA' => $PartyA,
          'PartyB' => $PartyB,
          'PhoneNumber' => $PartyA,
          'CallBackURL' => 'https://4ebb-154-159-252-124.ngrok-free.app/primaryerp/',
          'AccountReference' => 'RUTH MISIKO ',
          'TransactionDesc' => 'Testing stkpush on Sandbox '
        );
        
        $data_string = json_encode($curl_post_data);
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        
        $curl_response = curl_exec($curl);
        
        
        return $curl_response;
    }
  

   
}