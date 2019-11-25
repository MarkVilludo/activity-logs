<?php

use Illuminate\Support\Facades\Auth;
use App\Models\ActivityLog;
use Jenssegers\Agent\Agent;

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
    function storeActivity($type, $action, $description)
    {   
        $userId = null;
        if (Auth::check()) {
            $userId = auth()->user()->id;
        }
        $agent = new Agent();
        
        $platform = $agent->platform();
        $device = $agent->device();
        $browser = $agent->browser();
        $header = $agent->setUserAgent();
        
        //Activity logs
        $activity = new ActivityLog;
        $activity->type = $type; //Payment //Orders //Others
        $activity->user_id = $userId;
        $activity->platform = $platform ? $platform : 'Unknown';
        $activity->device = $device;
        $activity->browser = $header;
        $activity->action = $action; //Edit user, add order, deliverred order, etc
        $activity->description = $description; //message
        $activity->ip_address = request()->ip(); //ip_address of a user
        $activity->save();
    }
   
}

// Retrieve all activities
if (!function_exists('getAllActivities')) {
    function getAllActivities () {
        $activities = ActivityLog::with('user')->latest()->get();
        return $activities;
    }
}

// Activities specific to a user
if (!function_exists('getUserActivities')) {
    function getUserActivities ($user_id) {
        $activities = ActivityLog::where('user_id', $user_id)->latest()->get();
        return $activities;
    }
}
    
