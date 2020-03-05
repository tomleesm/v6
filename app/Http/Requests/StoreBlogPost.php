<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Uppercase;
use App\Rules\ChineseChar;

class StoreBlogPost extends FormRequest
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
    public function rules()
    {
        return [
            'title' => 'required||size:5',
            'body' => 'required',
            'author.name' => ['required', new ChineseChar()],
            'author.description' => 'required',
            'published_date' => 'nullable|date|after:tomorrow',
            'email' => 'nullable|email',
            'accept' => 'boolean',
            'url' => 'active_url',
            'qty' => 'required|integer',
            'password' => 'confirmed',
            'start_date' => 'required|date|different:published_date',
            'a' => 'string',
            'b' => ['string', 'different:a', new Uppercase()],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => '請輸入標題',
            // 不是 title.min:5
            'title.min' => '標題請輸入至少5個字元',
            'title.unique' => '標題重複',
            'title.max' => '標題請輸入最多15個字元',

            'body.required' => '請輸入主體',
            'author.name.required' => '請輸入作者姓名',
            'author.description.required' => '請輸入作者描述',

            'published_date.date' => '出版日期格式請輸入西元年月日，例如 2020-01-20',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after( function ($validator)
        {
            if ($this->userIsTom()) {
                $validator->errors()->add('warning', 'Tom is not allowed to access here !');
            }
        });
    }

    private function userIsTom()
    {
        return false;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            // 只是把預設英文的錯誤訊息中的 email 改成 E-mail address
            'email' => 'E-mail address',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'published_date' => str_replace('/', '-', $this->published_date)
        ]);
    }
}
