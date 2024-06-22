<?php

use App\Mail\ContactFormReceived;
use App\Models\ContactForm;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::get('/mailable', function () {
    $contactForm = ContactForm::find(3);
    Log::info($contactForm);

    return new ContactFormReceived($contactForm);
});

require __DIR__.'/auth.php';
