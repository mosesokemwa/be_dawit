<?php

namespace App\Models;

use App\Mail\ContactFormReceived;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class ContactForm extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'message',
        'privacy_policy',
        'phone_number',
        'subscribe',
        'company',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    protected function casts(): array
    {
        return [
            'privacy_policy' => 'boolean',
            'subscribe' => 'boolean',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, string>
     */

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'privacy_policy' => 'required|boolean',
            'subscribe' => 'nullable|boolean',
            'company' => 'nullable|string|max:255',
        ];
    }
    /**
     * Send email if subscribe is True
     */

    public function sendEmailIfSubscribed(): void
    {
        if ($this->subscribe) {
            Mail::to($this->email)->send(new ContactFormReceived($this));
        }
    }


}
