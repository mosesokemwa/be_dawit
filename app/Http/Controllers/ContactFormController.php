<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ContactForm;

class ContactFormController extends Controller
{



    public function store(Request $request): string
    {

        $contactForm = new ContactForm();


        // Validate the request
        $request->validate($contactForm->rules());

//        if ($request->input('subscribe')) {
////            // create subscription
//            $subscription = new Subscription();
//            $subscription->email = $request->input('email');
//            $subscription->save();
//        }

        // Save the data in bulk
        $contactForm->fill($request->all());
        $contactForm->save();
        return "Form has been submitted successfully!";
    }

    // Send email
    // Mail::to($data['email'])->send(new ContactFormMail($data));

}
