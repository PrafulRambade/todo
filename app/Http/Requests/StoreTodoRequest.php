<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class StoreTodoRequest extends FormRequest
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
        // $validator = Validator::make($request->all(), [
        //     'title'=> 'required',
        //     'detail'=>'required',
        // ]);
        // if($validator->fails())
        // {
        //     return response()->json([
        //         'status'=>422,
        //         'errors'=>$validator->messages()
        //     ]);
        // }
        return [
            'title' => 'required',
            'detail' => 'required',
        ];
    }
    public function messages()
    {
        return [
            "title.required" => "Please write a title",
            "detail.required" => "The title has to have at least :min characters.",
        ];
    }
}
