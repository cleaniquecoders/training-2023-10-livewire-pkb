<?php

use App\Models\User;

$users = User::where('is_active', true)->get();

$active_users = User::active()->get();

$inactive_users = User::inActive()->get();
