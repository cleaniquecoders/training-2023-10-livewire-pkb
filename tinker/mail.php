<?php

use App\Jobs\SendMail;
use App\Mail\SupportRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

$emails = [
    'nasrulhazim.m@gmail.com',
    'nasr@nas.com',
];

foreach ($emails as $email) {
    SendMail::dispatch(
        $email,
        new SupportRequest('Send mail from queue.')
    )->onQueue('mailing');
}

exit;
