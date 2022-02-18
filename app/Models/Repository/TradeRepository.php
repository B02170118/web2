<?php

namespace App\Models\Repository;

use App\Models\Entities\Trade\Trade;
use App\Models\Entities\Trade\Trade_item;
use DB;
use Log;

class TradeRepository
{
    /**
     * 取得交易列表資料
     *
     * @param array $search
     * @return array
     */
    public function gettrade_list($search = null)
    {
        $model = Trade::with(['join_tradeitem' => function ($q) {
            $q->select();
        },'join_user' => function ($q) {
            $q->select(['id','username','good','bad']);
        },'join_platform_type' => function ($q) {
            $q->select('id','name');
        },'join_alliance_type' => function ($q) {
            $q->select('id','name');
        },'join_goods_type' => function ($q) {
            $q->select('id','name');
        }
        /*,'join_server_type' => function ($q) {
            $q->select();
        }*/
        ,'join_amulet_type' => function ($q) {
            $q->select('id','name');
        }
        ,'join_equipment_type' => function ($q) {
            $q->select('id','name');
        }
        ,'join_gem_type' => function ($q) {
            $q->select('id','name');
        }
        ,'join_rune_type' => function ($q) {
            $q->select('id','name');
        }
        ]);
        if (!empty($search['goods_name'])) {
            $model->whereRaw('instr(`name`,?)',$search['goods_name']);
        }
        if (!empty($search['goods_item'])) {
            foreach ($search['goods_item'] as $key => $value) {
                $model->whereHas('join_tradeitem', function($q) use($key,$value,$search) {
                    if (!empty($search['goods_item_min'][$key]) && !empty($search['goods_item_max'][$key])) {
                        $q->whereRaw('instr(`name`,?)',$value)->where('value', '>=', $search['goods_item_min'][$key])->where('value', '<=', $search['goods_item_max'][$key]);
                    }elseif (!empty($search['goods_item_min'][$key]) && empty($search['goods_item_max'][$key])) {
                        $q->whereRaw('instr(`name`,?)',$value)->where('value', '>=', $search['goods_item_min'][$key]);
                    }elseif (empty($search['goods_item_min'][$key]) && !empty($search['goods_item_max'][$key])) {
                        $q->whereRaw('instr(`name`,?)',$value)->where('value', '<=', $search['goods_item_max'][$key]);
                    }else {
                        $q->whereRaw('instr(`name`,?)',$value);
                    }
                });
            }
        }
        if (!empty($search['platform_type'])) {
            $platform_type = $search['platform_type'];
            $model->whereHas('join_platform_type', function($q) use($platform_type) {
                $q->where('id', '=', $platform_type);
            });
        }
        if (!empty($search['alliance_type'])) {
            $alliance_type = $search['alliance_type'];
            $model->whereHas('join_alliance_type', function($q) use($alliance_type) {
                $q->where('id', '=', $alliance_type);
            });
        }
        if (!empty($search['goods_type'])) {
            $goods_type = $search['goods_type'];
            $model->whereHas('join_goods_type', function($q) use($goods_type) {
                $q->where('id', '=', $goods_type);
            });
        }
        if (!empty($search['amulet_type'])) {
            $amulet_type = $search['amulet_type'];
            $model->whereHas('join_amulet_type', function($q) use($amulet_type) {
                $q->where('id', '=', $amulet_type);
            });
        }
        if (!empty($search['equipment_type'])) {
            $equipment_type = $search['equipment_type'];
            $model->whereHas('join_equipment_type', function($q) use($equipment_type) {
                $q->where('id', '=', $equipment_type);
            });
        }
        if (!empty($search['gem_type'])) {
            $gem_type = $search['gem_type'];
            $model->whereHas('join_gem_type', function($q) use($gem_type) {
                $q->where('id', '=', $gem_type);
            });
        }
        if (!empty($search['rune_type'])) {
            $rune_type = $search['rune_type'];
            $model->whereHas('join_rune_type', function($q) use($rune_type) {
                $q->where('id', '=', $rune_type);
            });
        }
        return $model->get()->toArray();
    }

    /**
     * 取得指定交易
     *
     * @param integer $id
     * @return array
     */
    public function gettrade($id)
    {
        $model = Trade::with(['join_tradeitem' => function ($q) {
            $q->select();
        },'join_user' => function ($q) {
            $q->select(['id','username']);
        },'join_platform_type' => function ($q) {
            $q->select('id','name');
        },'join_alliance_type' => function ($q) {
            $q->select('id','name');
        },'join_goods_type' => function ($q) {
            $q->select('id','name');
        }
        /*,'join_server_type' => function ($q) {
            $q->select();
        }*/
        ,'join_amulet_type' => function ($q) {
            $q->select('id','name');
        }
        ,'join_equipment_type' => function ($q) {
            $q->select('id','name');
        }
        ,'join_gem_type' => function ($q) {
            $q->select('id','name');
        }
        ,'join_rune_type' => function ($q) {
            $q->select('id','name');
        }
        ])->where('id',$id)->first()->toArray();
        return $model;
    }

    /**
     * 編輯交易
     *
     * @param array $input
     * @return mixed
     */
    public function update_trade($input)
    {
        DB::beginTransaction();

        try {
            //更新交易主表
            $model = Trade::find(['id' => $input['trade_id']]);
            if (!empty($model)) {
                $model->platform_type_id = $input['platform_type']??null;
                $model->alliance_type_id = $input['alliance_type']??null;
                $model->goods_type_id = $input['goods_type']??null;
                $model->amulet_type_id = $input['amulet_type']??null;
                $model->equipment_type_id = $input['equipment_type']??null;
                $model->gem_type_id = $input['gem_type']??null;
                $model->rune_type_id = $input['rune_type']??null;
                $model->name = $input['goods_name']??null;
                $model->image = $input['image']??null;
                $model->buyname = $input['buyname']??null;
                $model->price = $input['price']??null;
                $model->remark = $input['remark']??null;
                $model->save();
            }

            //先刪除原有項目
            Trade_item::where('trade_id',$input['trade_id'])->delete();

            //直接新增項目
            $insert = [];
            foreach ($input['goods_item'] as $key => $value) {
                $insert[$key]['trade'] = $input['trade_id'];
                $insert[$key]['name'] = $value;
                $insert[$key]['value'] = $input['goods_item_value']??null;
            }
            Trade_item::insert($insert);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            return false;
        }
        return true;

    }
}
