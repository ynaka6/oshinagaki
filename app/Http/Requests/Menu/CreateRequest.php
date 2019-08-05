<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateRequest extends FormRequest
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
            'font_id' => [
                'required',
                'exists:fonts,id',
            ],
            'wallpaper_id' => [
                'nullable',
                'exists:wallpapers,id',
            ],
            'date' => [
                'required',
                'date',
                'date_format:Y-m-d',
            ],
            'title' => [
                'nullable',
                'string',
                'max:20',
            ],
            'signature_title' => [
                'required',
                'string',
                'max:20',
            ],
            'signature_name' => [
                'required',
                'string',
                'max:20',
            ],

            'sections.*.title' => [
                'required',
                'string',
                'max:5',
            ],

            'sections.*.items.*.title' => [
                'required',
                'string',
                'max:20',
            ],
        ];
    }

    public function attributes()
    {
        return [
            'font_id' => 'フォント',
            'wallpaper_id' => '壁紙',
            'date' => '日付',
            'signature_title' => '署名',
            'signature_name' => '氏名',
            'sections.*.title' => '項目名',
            'sections.*.items.*.title' => '献立',
        ];
    }

    /**
     * [override] バリデーション失敗時ハンドリング
     *
     * @param Validator $validator
     * @throw HttpResponseException
     * @see FormRequest::failedValidation()
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = [];
        foreach ($validator->errors()->toArray() as $key => $value) {
            array_set($errors, $key, $value);
        }

        throw new HttpResponseException(
            response()->json([
                'errors' => $errors
            ], 422 )
        );
    }
}
