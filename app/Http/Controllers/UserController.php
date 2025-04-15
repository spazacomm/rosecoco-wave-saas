<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Handle avatar upload
        if ($request->has('avatar_url')) {
            $imageUrl = $request->input('avatar_url');
            $imageContents = file_get_contents($imageUrl);
        
            // Get image extension from URL or default to jpg
            $extension = pathinfo(parse_url($imageUrl, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'jpg';
        
            // Create a unique filename
            $filename = 'avatars/' . Str::random(40) . '.' . $extension;
        
            // Store the image in the public disk
            Storage::disk('public')->put($filename, $imageContents);
        
            // Save the path
            $validatedData['avatar'] = $filename;
        }

        // Create the user
        $user = User::create($validatedData);

        // Handle relationships
        if ($request->has('services')) {
            $user->services()->attach($request->input('services'));
        }

        if ($request->has('categories')) {
            $user->categories()->attach($request->input('categories'));
        }

        if ($request->has('towns')) {
            $user->towns()->attach($request->input('towns'));
        }

        if ($request->has('city_id')) {
            $user->city_id = $request->input('city_id');
            $user->save();
        }

        if ($request->has('country_id')) {
            $user->country_id = $request->input('country_id');
            $user->save();
        }

        if ($request->has('gallery')) {
            foreach ($request->input('gallery') as $galleryItem) {
                $user->gallery()->create($galleryItem);
            }
        }

        if ($request->has('bookings')) {
            foreach ($request->input('bookings') as $bookingItem) {
                $user->bookings()->create($bookingItem);
            }
        }

        if ($request->has('reviews')) {
            foreach ($request->input('reviews') as $reviewItem) {
                $user->reviews()->create($reviewItem);
            }
        }

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ], 201);
    }
}
