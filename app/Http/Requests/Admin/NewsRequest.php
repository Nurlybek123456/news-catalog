<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'header'=>$required.'|string',
            'announcement'=>$required.'|string',
            'content'=>$required.'|string',
            'author_id'=>$required.'|integer',
            'heading_id'=>$required.'|integer',
            'is_published'=>'nullable|boolean',
            'published_at'=>'nullable|date|format:Y-m-d H:i:s'
        ];
    }

        public function messages(): array
    {
        return [
            'header.required' => 'Поле заголовок обязательно для заполнения.',
            'header.string' => 'Поле заголовок должно быть строкой.',
            'announcement.required' => 'Поле анонс обязательно для заполнения.',
            'announcement.string' => 'Поле анонс должно быть строкой.',
            'content.required' => 'Поле контент обязательно для заполнения.',
            'content.string' => 'Поле контент должно быть строкой.',
            'heading_id.required' => 'Поле ID рубрики обязательно для заполнения.',
            'heading_id.integer' => 'Поле ID рубрики должно быть целым числом.',
            'author_id.required' => 'Поле ID автора обязательно для заполнения.',
            'author_id.integer' => 'Поле ID автора должно быть целым числом.',
            'is_published.boolean' => 'Поле опубликовано должно быть булевым значением.',
            'published_at.date' => 'Поле дата публикации должно быть датой.',
            'published_at.format' => 'Поле дата публикации должно быть в формате Y-m-d H:i:s.',
        ];
    }




}
