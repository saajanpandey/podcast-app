<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpFoundation\JsonResponse;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // public function failedValidation(Validator $validator)
    // {
    //     throw new HttpResponseException(response()->json([

    //         'message'  => $validator->errors()
    //     ]));
    // }

    // public function response(array $errors)
    // {
    //     return new JsonResponse($errors, 422);
    //     // yours might look more like this ->  return new JsonResponse($errors, 422);
    // }
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users',
            'password' => ['required', Password::min(6)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()],
            'name' => 'required|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
        ];
    }
}
