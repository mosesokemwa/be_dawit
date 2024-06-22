<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\ContactForm;
use Illuminate\Support\Facades\Log;

class ContactFormController extends Controller
{

    public function index(): JsonResponse
    {
        $formData = ContactForm::all();
        return response()->json($formData);
    }
    public function store(Request $request): JsonResponse
    {
        Log::info($request->all());
        $contactForm = new ContactForm();

        Log::debug($contactForm->rules());

        // Validate the request
        $request->validate($contactForm->rules());
        // Save the data in bulk
        $contactForm->fill($request->all());
        $contactForm->save();
        // Send email if subscribed
        $contactForm->sendEmailIfSubscribed();
        // return response with converted model object to array
        return response()->json(
            ['data' => $contactForm->toArray(),
                'message' => 'Contact form submitted successfully'
            ]);
    }
}
