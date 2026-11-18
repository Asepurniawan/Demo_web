<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use App\Http\Resources\MediaResource;
use App\Models\Media;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return MediaResource::collection(Media::with('users')->paginate(15));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMediaRequest $request): JsonResponse
    {
        $media = Media::create($request->validated());

        return (new MediaResource($media))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media): MediaResource
    {
        return new MediaResource($media->load('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMediaRequest $request, Media $media): MediaResource
    {
        $media->update($request->validated());

        return new MediaResource($media->load('users'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $media): JsonResponse
    {
        $media->delete();

        return response()->json(['message' => 'Media berhasil dihapus'], 200);
    }

    public function attachUser(Media $media, User $user): MediaResource
    {
        $media->users()->syncWithoutDetaching([$user->id]);

        return new MediaResource($media->load('users'));
    }

    public function detachUser(Media $media, User $user): JsonResponse
    {
        $media->users()->detach($user->id);

        return response()->json(['message' => 'Media berhasil dihapus dari koleksi pengguna'], 200);
    }
}
