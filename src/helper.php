<?php

use Illuminate\Support\Facades\Auth;
use App\Models\ActivityLog;

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
    function storeActivity($type, $action, $description)
    {   
        $userId = null;
        if (Auth::check()) {
            $userId = auth()->user()->id;
        }
        
        //Activity logs
        $activity = new ActivityLog;
        $activity->type = $type; //Payment //Orders //Others
        $activity->user_id = $userId;
        $activity->action = $action; //Edit user, add order, deliverred order, etc
        $activity->description = $description; //message
        $activity->save();
    }
}


    
