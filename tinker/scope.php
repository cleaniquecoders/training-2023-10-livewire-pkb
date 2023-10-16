<?php

use App\Models\User;

$active_users = User::where('is_active', true)->count();

echo "total active users without scope: $active_users" . PHP_EOL;

$inactive_users = User::where('is_active', false)->count();

echo "total inactive users without scope: $inactive_users" . PHP_EOL;

echo PHP_EOL;

$active_users = User::active()->count();

echo "total active users with local scope: $active_users" . PHP_EOL;

$inactive_users = User::inActive()->count();

echo "total inactive users without local scope: $inactive_users" . PHP_EOL;


$search_results = User::search('Dr.')->count();

echo "total search result : $search_results" . PHP_EOL;
// $users = User::query()->get();

exit;
