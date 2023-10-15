<?php

use App\Mail\SupportRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

$emails = [
    'nasrulhazim.m@gmail.com',
    'nasr@nas.com',
];

foreach ($emails as $email) {
    Mail::to($email)->send(
        new SupportRequest(Str::random(255)),
    );
}

exit;
