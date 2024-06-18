<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'contact_form_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'message',
        'privacyPolicy',
        'phoneNumber',
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

    public static function create(array $data)
    {

    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    protected function casts(): array
    {
        return [
            'privacyPolicy' => 'boolean',
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
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'privacyPolicy' => 'required|boolean',
            'phoneNumber' => 'nullable|string|max:255',
            'subscribe' => 'nullable|boolean',
            'company' => 'nullable|string|max:255',
        ];
    }

    /**
     * Get the validation error messages that apply to the request.
     *
     * @return array<string, string>
     */

    public function messages(): array
    {
        return [
            'firstName.required' => 'First name is required',
            'firstName.string' => 'First name must be a string',
            'firstName.max' => 'First name must not be greater than 255 characters',
            'lastName.required' => 'Last name is required',
            'lastName.string' => 'Last name must be a string',
            'lastName.max' => 'Last name must not be greater than 255 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'email.max' => 'Email must not be greater than 255 characters',
            'message.required' => 'Message is required',
            'message.string' => 'Message must be a string',
            'privacyPolicy.required' => 'Privacy policy is required',
            'privacyPolicy.boolean' => 'Privacy policy must be a boolean',
            'phoneNumber.string' => 'Phone number must be a string',
            'phoneNumber.max' => 'Phone number must not be greater than 15 characters',
            'subscribe.boolean' => 'Subscribe must be a boolean',
            'company.string' => 'Company must be a string',
            'company.max' => 'Company must not be greater than 255 characters',
        ];
    }
}
