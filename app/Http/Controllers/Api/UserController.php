<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MediaResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    public function media(User $user): AnonymousResourceCollection
    {
        return MediaResource::collection($user->media()->with('users')->paginate(15));
    }
}
