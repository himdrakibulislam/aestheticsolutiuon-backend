<?php
namespace App\Traits;
use App\Notifications\AdminNotification;
use App\Models\Admin;

trait NotifyToAdmin
{
    public function sendNotification($type,$message,$data=[])
    {
        $admins = Admin::all();
        foreach ($admins as $admin) {
            $admin->notify(new AdminNotification($type,$message,$data));
        }
     
    }
}
?>