<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $required = $isUpdate ? '' : 'required';

        return [
            'name' => $required . '|string',
            'surname' => $required . '|string',
            'patronymic' => $required . '|string',
            'email' => $required . '|unique:authors,email',
            'avatar' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле имя обязательно для заполнения.',
            'name.string' => 'Поле имя должно быть строкой.',
            'surname.required' => 'Поле фамилия обязательно для заполнения.',
            'surname.string' => 'Поле фамилия должно быть строкой.',
            'patronymic.required' => 'Поле отчество обязательно для заполнения.',
            'patronymic.string' => 'Поле отчество должно быть строкой.',
            'email.required' => 'Поле email обязательно для заполнения.',
            'email.unique' => 'Пользователь с таким email уже существует.',
            'avatar.string' => 'Поле аватар должно быть строкой.',
        ];
    }



}
