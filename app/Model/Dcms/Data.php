<?php

namespace App\Model\Dcms;

use App\Model\Dcms\DM_BaseModel;
use Auth;

class Data extends DM_BaseModel
{
    public function storeData($rows, $status, $order, $icon, $data) {
        $data_unique_id = uniqid(Auth::user()->id.'_');
        foreach( $rows as $row) {
            $links[] = [
                'data_unique_id' => $data_unique_id,
                'lang_id' => $row['lang_id'],
                'title' => $row['title'],
                'icon'  => $icon,
                'order' => $order,
                'status' => $status,
                'data' => $data
            ];
        }
        if(Data::insert($links)) {
            return true;
        }else {
            return false;
        }
    }

    public function updateData($data_unique_id, $rows, $status, $order, $icon, $data) {
        foreach( $rows as $row) {
            if(isset($row['id'])){
                $link = Data::findOrFail($row['id']);
            }else{
                $link = new Data;
                $link->data_unique_id = $data_unique_id;
            }
            $link->lang_id = $row['lang_id'];
            $link->title = $row['title'];
            $link->order = $order;
            $link->icon = $icon; 
            $link->data = $data; 
            $link->status = $status;
            $link->save();
        }
        if($link->save()) {
            return true;
        }else {
            return false;
        }
    }
}
