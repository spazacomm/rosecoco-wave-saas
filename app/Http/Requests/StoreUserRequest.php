<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role_id' => 'nullable|exists:roles,id',
            'verification_code' => 'nullable|string',
            'verified' => 'nullable|boolean',
            'trial_ends_at' => 'nullable|date',
            'is_approved' => 'nullable|boolean',
            'incall' => 'nullable|boolean',
            'outcall' => 'nullable|boolean',
            'address' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'whatsapp_number' => 'nullable|string',
            'telegram_number' => 'nullable|string',
            'bio' => 'nullable|string',
            'dob' => 'nullable|date',
            'gender' => 'nullable|string',
            'orientation' => 'nullable|string',
            'nationality' => 'nullable|string',
            'languages' => 'nullable|string',
            'body_type' => 'nullable|string',
            'height' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'nullable|string',
        ];
    }
}
