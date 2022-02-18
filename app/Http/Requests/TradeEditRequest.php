<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TradeEditRequest extends FormRequest
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
            'user_id' => 'required|numeric|min:1|max:999999999',//道具名稱
            'trade_id' => 'required|numeric|min:1|max:999999999',//道具名稱
            'goods_name' => 'required|string|min:1|max:40',//道具名稱
            // 'server_type' => 'required|numeric|min:1|max:10',//伺服器類型
            'platform_type' => 'required|numeric|min:1|max:10',//平台類型
            'alliance_type' => 'required|numeric|min:1|max:30',//聯盟類型
            'goods_type' => 'required|numeric|min:1|max:30',//道具類型
            'amulet_type' => 'required_if:goods_type,4|numeric|min:1|max:10',//護身符類型
            'equipment_type' => 'required_if:goods_type,1|min:1|max:10',//裝備類型
            'gem_type' => 'required_if:goods_type,3|numeric|min:1|max:10',//寶石種類
            'rune_type' => 'required_if:goods_type,2|numeric|min:1|max:33',//符石種類
            'goods_item.*' => 'string|min:1|max:20',//道具屬性
            'goods_item_value.*' => 'numeric|min:1|max:9999',//道具屬性最小值(>=)
            'image' => 'required|mimes:jpeg,jpg,png|max:5120',//圖片 (5MB)
            'buyname' => 'string|min:1|max:20',//收購道具
            'price' => 'numeric|min:1|max:99999999',//價值
            'remark' => 'string|min:1|max:100',//備註
        ];
    }
}
