<?php
/**
 * This class is send sms for your members
 * @author Mehmet Nuri Öztürk <info@mehmetnuriozturk.com.tr>
 * @copyright Copyright 2015, UPSF Corp.
 * @version 1.0
 * @since 2015
 */

class SasMS extends Text
{
    public  function startdateconvert($startdate)
    {
        $startdate=date('d.m.Y H:i');
        $startdate=str_replace('.', '',$startdate);
        $startdate=str_replace(':', '',$startdate);
        $startdate=str_replace(' ', '',$startdate);

        return $startdate;
    }

    public function stopdateconvert($stopdate){
        $stopdate=date('d.m.Y H:i', strtotime('+1 day'));
        $stopdate=str_replace('.', '',$stopdate );
        $stopdate=str_replace(':', '',$stopdate);
        $stopdate = str_replace(' ', '', $stopdate);

        return $stopdate;
    }
    public function Send($username,$password, $message, $mobileno, $message_header, $startdate, $stopdate)
    {
        $startdate = $this->startdateconvert($startdate);
        $stopdate = $this->stopdateconvert($stopdate);
        $message = $this->convert($message, 'tr', 'en');


        $service_url="http://api.netgsm.com.tr/bulkhttppost.asp?usercode=$username&password=$password&gsmno=$mobileno&message=$message&msgheader=$message_header&startdate=$startdate&stopdate=$stopdate";


        $curl_operation = curl_init();
        curl_setopt($curl_operation,CURLOPT_URL,$service_url);
        curl_setopt($curl_operation,CURLOPT_RETURNTRANSFER,true);
        $output=curl_exec($curl_operation);
        curl_close($curl_operation);
        return $output;

    }

    public  function Report($username, $password, $bulkid, $mobilenumber, $type, $status, $ver, $startdate, $stopdate)
    {
        $startdate = $this->startdateconvert($startdate);
        $stopdate = $this->stopdateconvert($stopdate);

        $service_url = "http://api.netgsm.com.tr/httpbulkrapor.asp?usercode=$username&password=$password&bulkid=$bulkid&type=$type&status=$status&versiyon=$ver";

        $crl_operation = curl_init();
        curl_setopt($crl_operation, CURLOPT_URL, $service_url);
        curl_setopt($crl_operation, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($crl_operation);
        curl_close($crl_operation);
        return $output;



    }

}