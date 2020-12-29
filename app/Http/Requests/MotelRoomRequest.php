<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MotelRoomRequest extends FormRequest
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
            'acc_title' => 'required|min:20|max:120',
            'acc_description' => 'required|min:30|max:4000',
            'acc_address' => 'required',
            'acc_item' => 'required',
            'acc_price' => 'required',
            'acc_area' => 'required',
            'category_id' => 'required',
            'phone' => 'required',
            'image' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'acc_title.required' => 'Nhập tiêu đề bài đăng',
            'category_id.required' => 'Chọn danh mục bài đăng',
            'acc_price.required' => 'Nhập giá thuê phòng trọ',
            'acc_area.required' => 'Nhập diện tích phòng trọ',
            'phone.required' => 'Nhập SĐT chủ phòng trọ (cần liên hệ)',
            'acc_description.required' => 'Nhập mô tả ngắn cho phòng trọ',
            'acc_address.required' => 'Nhập hoặc chọn địa chỉ phòng trọ trên bản đồ'
        ];
    }
}
