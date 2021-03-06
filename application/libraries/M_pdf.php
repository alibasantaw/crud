<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
define("_MPDF_TEMP_PATH", '../../common/tempfiles/');

class M_pdf {
    public $param;
    public $pdf;

    function __construct($param = "'c', 'A4-L'")
    {
        $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }
 
    function load($param=NULL)
    {
        include_once APPPATH.'third_party/mpdf/mpdf.php';
         
        if ($params == NULL)
        {
            $param = '"en-GB-x","A4","","",10,10,10,10,6,3';          
        }
         
        return new mPDF($param);
    }
}