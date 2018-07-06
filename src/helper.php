<?php

use App\Models\ActivityLog;
use App\User;

if (!function_exists('storeActivity')) {
    /**
     * Help resize images regardless of image dimension then save
     *
     * @param file $file
     * @param int $size
     * @param string $filepath
     * @param string $filename
     * @return response
     */
    function storeActivity($data)
    {
        //Activity logs
        $activity = new ActivityLog;
        $activity->type = $data['type']; //Payment //Orders //Others
        $activity->user_id = $data['user_id'];
        $activity->action = $data['action']; //Edit user, add order, deliverred order, etc
        $activity->description = $data['description']; //message
        $activity->save();
    }
}


    
