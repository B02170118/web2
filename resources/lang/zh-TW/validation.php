<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'        => '必須接受 :attribute。',
    'active_url'      => ':attribute 不是有效的網址。',
    'after'           => ':attribute 必須要晚於 :date。',
    'after_or_equal'  => ':attribute 必須要等於 :date 或更晚。',
    'alpha'           => ':attribute 只能以字母組成。',
    'alpha_dash'      => ':attribute 只能以字母、數字、連接線(-)及底線(_)組成。',
    'alpha_num'       => ':attribute 只能以字母及數字組成。',
    'array'           => ':attribute 必須為陣列。',
    'before'          => ':attribute 必須要早於 :date。',
    'before_or_equal' => ':attribute 必須要等於 :date 或更早。',
    'between'         => [
        'numeric' => ':attribute 必須介於 :min 至 :max 之間。',
        'file'    => ':attribute 必須介於 :min 至 :max KB 之間。 ',
        'string'  => ':attribute 必須介於 :min 至 :max 個字元之間。',
        'array'   => ':attribute: 必須有 :min - :max 個元素。',
    ],
    'boolean'        => ':attribute 必須為布林值。',
    'confirmed'      => ':attribute 確認欄位的輸入不一致。',
    'date'           => ':attribute 不是有效的日期。',
    'date_equals'    => ':attribute 必須等於 :date。',
    'date_format'    => ':attribute 不符合 :format 的格式。',
    'different'      => ':attribute 與 :other 必須不同。',
    'digits'         => ':attribute 必須是 :digits 位數字。',
    'digits_between' => ':attribute 必須介於 :min 至 :max 位數字。',
    'dimensions'     => ':attribute 圖片尺寸不正確。',
    'distinct'       => ':attribute 已經存在。',
    'email'          => ':attribute 必須是有效的 E-mail。',
    'ends_with'      => ':attribute 結尾必須包含下列之一：:values',
    'exists'         => ':attribute 不存在。',
    'file'           => ':attribute 必須是有效的檔案。',
    'filled'         => ':attribute 不能留空。',
    'gt'             => [
        'numeric' => ':attribute 必須大於 :value。',
        'file'    => ':attribute 必須大於 :value KB。',
        'string'  => ':attribute 必須多於 :value 個字元。',
        'array'   => ':attribute 必須多於 :value 個元素。',
    ],
    'gte' => [
        'numeric' => ':attribute 必須大於或等於 :value。',
        'file'    => ':attribute 必須大於或等於 :value KB。',
        'string'  => ':attribute 必須多於或等於 :value 個字元。',
        'array'   => ':attribute 必須多於或等於 :value 個元素。',
    ],
    'image'    => ':attribute 必須是一張圖片。',
    'in'       => '所選擇的 :attribute 選項無效。',
    'in_array' => ':attribute 沒有在 :other 中。',
    'integer'  => ':attribute 必須是一個整數。',
    'ip'       => ':attribute 必須是一個有效的 IP 位址。',
    'ipv4'     => ':attribute 必須是一個有效的 IPv4 位址。',
    'ipv6'     => ':attribute 必須是一個有效的 IPv6 位址。',
    'json'     => ':attribute 必須是正確的 JSON 字串。',
    'lt'       => [
        'numeric' => ':attribute 必須小於 :value。',
        'file'    => ':attribute 必須小於 :value KB。',
        'string'  => ':attribute 必須少於 :value 個字元。',
        'array'   => ':attribute 必須少於 :value 個元素。',
    ],
    'lte' => [
        'numeric' => ':attribute 必須小於或等於 :value。',
        'file'    => ':attribute 必須小於或等於 :value KB。',
        'string'  => ':attribute 必須少於或等於 :value 個字元。',
        'array'   => ':attribute 必須少於或等於 :value 個元素。',
    ],
    'max' => [
        'numeric' => ':attribute 不能大於 :max。',
        'file'    => ':attribute 不能大於 :max KB。',
        'string'  => ':attribute 不能多於 :max 個字元。',
        'array'   => ':attribute 最多有 :max 個元素。',
    ],
    'mimes'     => ':attribute 必須為 :values 的檔案。',
    'mimetypes' => ':attribute 必須為 :values 的檔案。',
    'min'       => [
        'numeric' => ':attribute 不能小於 :min。',
        'file'    => ':attribute 不能小於 :min KB。',
        'string'  => ':attribute 不能小於 :min 個字元。',
        'array'   => ':attribute 至少有 :min 個元素。',
    ],
    'not_in'               => '所選擇的 :attribute 選項無效。',
    'not_regex'            => ':attribute 的格式錯誤。',
    'numeric'              => ':attribute 必須為一個數字。',
    'account'             => '帳號錯誤',
    'password'             => '密碼錯誤',
    'present'              => ':attribute 必須存在。',
    'regex'                => ':attribute 的格式錯誤。',
    'required'             => ':attribute 不能留空。',
    'required_if'          => '當 :other 是 :value 時 :attribute 不能留空。',
    'required_unless'      => '當 :other 不是 :values 時 :attribute 不能留空。',
    'required_with'        => '當 :values 出現時 :attribute 不能留空。',
    'required_with_all'    => '當 :values 出現時 :attribute 不能為空。',
    'required_without'     => '當 :values 留空時 :attribute field 不能留空。',
    'required_without_all' => '當 :values 都不出現時 :attribute 不能留空。',
    'same'                 => ':attribute 與 :other 必須相同。',
    'size'                 => [
        'numeric' => ':attribute 的大小必須是 :size。',
        'file'    => ':attribute 的大小必須是 :size KB。',
        'string'  => ':attribute 必須是 :size 個字元。',
        'array'   => ':attribute 必須是 :size 個元素。',
    ],
    'starts_with' => ':attribute 開頭必須包含下列之一：:values',
    'string'      => ':attribute 必須是一個字串。',
    'timezone'    => ':attribute 必須是一個正確的時區值。',
    'unique'      => ':attribute 已經存在。',
    'uploaded'    => ':attribute 上傳失敗。',
    'url'         => ':attribute 的格式錯誤。',
    'uuid'        => ':attribute 必須是有效的 UUID。',
    'captcha'     => ':attribute 不正確',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        'phone_code' => [
            'required' => '手機認證碼 未填寫',
            'digits' => '手機認證碼 必須為 :digits 個數字',
        ],
        'goods_name' => [
            'required' => '輸入 道具名稱 不能為空',
            'string' => '道具名稱 有 不合法字元',
            'min' => ' 輸入 道具名稱 不能為空',
            'max' => '輸入 道具名稱 文字過長',
        ],
        'platform_type' => [
            'required' => '平台類型錯誤',
            'numeric' => '平台類型錯誤',
            'min' => ' 平台類型錯誤',
            'max' => '平台類型錯誤',
        ],
        'alliance_type' => [
            'required' => '聯盟類型錯誤',
            'numeric' => '聯盟類型錯誤',
            'min' => ' 聯盟類型錯誤',
            'max' => '聯盟類型錯誤',
        ],
        'goods_type' => [
            'required' => '道具類型錯誤',
            'numeric' => '道具類型錯誤',
            'min' => ' 道具類型錯誤',
            'max' => '道具類型錯誤',
        ],
        'amulet_type' => [
            'required_if' => '護身符類型錯誤',
            'numeric' => '護身符類型錯誤',
            'min' => '護身符類型錯誤',
            'max' => '護身符類型錯誤',
        ],
        'equipment_type' => [
            'required_if' => '裝備類型錯誤',
            'numeric' => '裝備類型錯誤',
            'min' => '裝備類型錯誤',
            'max' => '裝備類型錯誤',
        ],
        'gem_type' => [
            'required_if' => '寶石類型錯誤',
            'numeric' => '寶石類型錯誤',
            'min' => ' 寶石類型錯誤',
            'max' => '寶石類型錯誤',
        ],
        'rune_type' => [
            'required_if' => '符石類型錯誤',
            'string' => '符石類型錯誤',
            'min' => ' 符石類型錯誤',
            'max' => '符石類型錯誤',
        ],
        'goods_item.*' => [
            'string' => '道具屬性 有 不合法字元',
            'min' => ' 道具屬性 不得低於 :min 個字元',
            'max' => '道具屬性 不得大於 :max 個字元',
        ],
        'goods_item_min.*' => [
            'numeric' => '道具屬性數值錯誤',
            'min' => '道具屬性數值錯誤',
            'max' => '道具屬性數值錯誤',
        ],
        'goods_item_max.*' => [
            'numeric' => '道具屬性數值錯誤',
            'min' => '道具屬性數值錯誤',
            'max' => '道具屬性數值錯誤',
        ],
        'goods_item_value.*' => [
            'numeric' => '道具屬性數值錯誤',
            'min' => '道具屬性數值錯誤',
            'max' => '道具屬性數值錯誤',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'address'               => '地址',
        'age'                   => '年齡',
        'available'             => '可用的',
        'city'                  => '城市',
        'content'               => '內容',
        'country'               => '國家',
        'date'                  => '日期',
        'day'                   => '天',
        'description'           => '描述',
        'email'                 => 'E-mail',
        'excerpt'               => '摘要',
        'first_name'            => '名',
        'gender'                => '性別',
        'hour'                  => '時',
        'last_name'             => '姓',
        'minute'                => '分',
        'mobile'                => '手機',
        'month'                 => '月',
        'name'                  => '名稱',
        'account'                => '帳號',
        'password'              => '密碼',
        'password_confirmation' => '確認密碼',
        'phone'                 => '手機',
        'second'                => '秒',
        'sex'                   => '性別',
        'size'                  => '大小',
        'time'                  => '時間',
        'title'                 => '標題',
        'username'              => '會員名稱',
        'year'                  => '年',
        'captcha'               => '驗證碼',
    ],
];
