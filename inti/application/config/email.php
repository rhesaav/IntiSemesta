<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'protocol' => 'mail', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_user' => 'rhesaav@gmail.com',
    'smtp_pass' => 'Persik1950',
    'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
    'mailtype' => 'html', //plaintext 'text' mails or 'html'
    'smtp_timeout' => '20', //in seconds
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
);
