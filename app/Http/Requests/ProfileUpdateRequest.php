<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    protected $redirect = '/dashboard';
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => array('required', 'regex:/^[\x{4e00}-\x{9fa5}_a-zA-Z0-9\s\.\,\。\;\'\"\(\)\，\/\-\=\+\?\!\~\>\<]+$/u'),
            'budget'=> 'required',
            'height' => 'required|between:140,200|numeric',
            'city'=> 'required',
            'area'=> 'required',
            'birthdate'=> 'required|date|before:today',
            'marriage'=> 'required',
            'smoking'=> 'required',
            'drinking'=> 'required',
            'education'=> 'required',
            // 'occupation'=> 'required',
            'about'=> 'required',
            'style' => 'required'

            // 'title' => array('required', 'regex:/^[\x{4e00}-\x{9fa5}_a-zA-Z0-9\s\.\,\。\;\'\"\(\)\，\/\-\=\+\?\!\~\>\<]+$/u'),
            // 'about'=> array('regex:/^[\x{4e00}-\x{9fa5}_a-zA-Z0-9\s\.\,\。\;\'\"\(\)\，\/\-\=\+\?\!\~\>\<]+$/u'),
            // 'style' => array('regex:/^[\x{4e00}-\x{9fa5}_a-zA-Z0-9\s\.\,\。\;\'\"\(\)\，\/\-\=\+\?\!\~\>\<]+$/u')
            // 'assets' => 'required_if:voucher_enabled,1|integer|nullable'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '請輸入暱稱',
            'name.regex' => '暱稱格式輸入錯誤',
            'budget.required' => '請輸入預算',
            'height.required' => '請輸入身高',
            'height.numeric' => '請輸入數字',
            'height.between' => '身高請輸入數字140~200之間',
            'city.required' => '請輸入城市',
            'area.required' => '請輸入鄉鎮',
            'birthdate.required' => '請輸入生日',
            'birthdate.date' => '請輸入正確日期',
            'birthdate.before' => '生日日期輸入錯誤',
            'marriage.required' => '請輸入婚姻',
            'smoking.required' => '請輸入抽菸習慣',
            'drinking.required' => '請輸入喝酒習慣',
            'education.required' => '請輸入教育程度',
            // 'occupation.required' => '請輸入現況',
            'about.required' => '請輸入關於我',
            'style.required' => '請輸入期待約會模式',

            // 'title.required' => '請輸入標題',
            // 'title.regex' => '標題格式輸入錯誤',
            // 'about.regex' => '關於我格式輸入錯誤',
            // 'about.required' => '關於我格式輸入錯誤',
            // 'style.regex' => '期待的約會模式輸入錯誤',
            // 'style.required' => '期待的約會模式輸入錯誤',
            // 'assets.integer' => '資產必須為數字'
            // 'height.digits_between' => '請輸入1~200的數字'
        ];
    }
}
