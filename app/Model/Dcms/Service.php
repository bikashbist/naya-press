<?php

namespace App\Model\Dcms;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Service extends Model
{
    public function storeData($icon, $color, $rows, $link, $order, $status){
        $service_unique_id = uniqid(Auth::user()->id.'_');
        foreach( $rows as $row) {
            $links[] = [
                'service_unique_id' => $service_unique_id,
                'icon' => $icon,
                'color' => $color,
                'lang_id' => $row['lang_id'],
                'title' => $row['title'],
                'description' => $row['description'],
                'link'  => $link,
                'order' => $order,
                'status' => $status,
            ];
        }
        if(Service::insert($links)) {
            return true;
        }else {
            return false;
        }
    }

    public function updateData($service_unique_id, $icon, $color, $rows, $link, $order, $status) {
        foreach( $rows as $row) {
            if(isset($row['id'])){
                $service = Service::findOrFail($row['id']);
            }else{
                $service = new Service;
                $service->service_unique_id = $service_unique_id;
            }
            $service->icon = $icon;
            $service->color = $color; 
            $service->lang_id = $row['lang_id'];
            $service->title = $row['title'];
            $service->description = $row['description'];
            $service->order = $order;
            $service->link = $link; 
            $service->status = $status;
            $service->save();
        }
        if($service->save()) {
            return true;
        }else {
            return false;
        }
    }
}
