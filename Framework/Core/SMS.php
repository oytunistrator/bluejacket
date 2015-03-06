<?php
/**
 * Created by PhpStorm.
 * User: Mehmet Nuri Öztürk
 * Date: 3/6/15
 * Time: 4:23 PM
 */


class SMS extends Text
{
    public function Send($username,$password, $message, $mobileno, $message_header)
    {

        $startdate=date('d.m.Y H:i');
        $startdate=str_replace('.', '',$startdate );
        $startdate=str_replace(':', '',$startdate);
        $startdate=str_replace(' ', '',$startdate);

        $stopdate=date('d.m.Y H:i', strtotime('+1 day'));
        $stopdate=str_replace('.', '',$stopdate );
        $stopdate=str_replace(':', '',$stopdate);
        $stopdate = str_replace(' ', '', $stopdate);
        $convert = new Text();
        $message = $convert->convert($message, 'tr', 'en');


        $service_url="http://api.netgsm.com.tr/bulkhttppost.asp?usercode=$username&password=$password&gsmno=$mobileno&message=$message&msgheader=$message_header&startdate=$startdate&stopdate=$stopdate";


        $curl_operation = curl_init();
        curl_setopt($curl_operation,CURLOPT_URL,$service_url);
        curl_setopt($curl_operation,CURLOPT_RETURNTRANSFER,true);
        $output=curl_exec($curl_operation);
        curl_close($curl_operation);
        return $output;

    }

}