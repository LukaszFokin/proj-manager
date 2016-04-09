<?php

use App\Models\User;

function getNotifications()
{
    $notifications = [];

    // Check if user has an photo
    if(!Auth::user()->image)
    {
        $notifications[] = [
            'url' => route('users.edit', [Auth::user()->id]),
            'icon' => 'fa-warning text-yellow',
            'message' => 'You don\'t have any photo yet. Please, take one :)'
        ];
    }

    // Check if exists new users registered
    if($totalNewUsers = User::where('status', '=', NEW_USER)->count())
    {
        $notifications[] = [
            'url' => route('users.index', ['status'=> NEW_USER]),
            'icon' => 'fa-users text-aqua',
            'message' => $totalNewUsers . ' new member(s) joined'
        ];
    }

    return $notifications;
}