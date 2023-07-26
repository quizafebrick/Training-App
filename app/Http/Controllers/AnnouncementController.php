<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncementRequest;
use App\Http\Requests\UpdateAnnouncementRequest;
use App\Models\Announcement;
use App\Models\Image;
use App\Models\User;

class AnnouncementController extends Controller
{
    public function index(User $user, Announcement $announcement)
    {
        // * ASSUMING 'USEREMAIL' IS THE COLUMN NAME THAT STORES THE USER_ID IN THE USER MODEL * //
        $userId = session('userEmail');
        $userEmail = ['userEmail' => $user->where('id', $userId)->first()];

        // * ASSUMING 'USER_ID' IS THE COLUMN NAME THAT RELATES TO THE USER IN THE ANNOUNCEMENT MODEL * //
        $announcements = $announcement->where('user_id', $userId)->orderBy('id', 'ASC')->get();

        return view('user.announcement', $userEmail, compact('announcements'));
    }

    public function create(User $user)
    {
        $userEmail = ['userEmail' => $user->where('id', session('userEmail'))->first()];

        return view('components.add-announcement', $userEmail);
    }

    public function store(AnnouncementRequest $request, Announcement $announcement, Image $image)
    {
        $requests = $request->validated();

        $save_announcement = $announcement->create($requests);

        if ($request->has('images')) {
            foreach ($request->file('images') as $images) {
                $imageName = $requests['title'] . '-image-' . time() . rand(1, 1000) . '.' . $images->extension();

                $images->move(public_path('images'), $imageName);

                $image->create([
                    'announcement_id' => $save_announcement->id,
                    'image' => $imageName,
                ]);
            }
        }

        return to_route('announcement-list')->with("success", "Announcement Created!");
    }

    public function show(Announcement $announcement)
    {
        //
    }

    public function edit(Announcement $announcement, User $user, $id)
    {
        $userEmail = ['userEmail' => $user->where('id', session('userEmail'))->first()];
        $announcementDetails = $announcement->findOrFail($id);
        $images = $announcementDetails->images;

        return view('components.edit-announcement', $userEmail, compact('announcementDetails', 'images'));
    }

    public function update(UpdateAnnouncementRequest $request, Announcement $announcement, Image $image, $id)
    {
        // * FIND THE ANNOUNCEMENT BY ITS ID * //
        $update_announcement = $announcement->findOrFail($id);

        // * HANDLE IMAGE FILE RENAMING IF THE TITLE IS UPDATED * //
        if ($request->has('title') && $request->title !== $update_announcement->title) {
            $newTitle = $request->title;
            $imagesToUpdate = [];

            // * GENERATE THE NEW IMAGE NAMES BASED ON THE UPDATED TITLE * //
            foreach ($update_announcement->images as $existingImage) {
                $existingImagePath = public_path('images/' . $existingImage->image);
                if (file_exists($existingImagePath)) {
                    $imageExtension = pathinfo($existingImagePath, PATHINFO_EXTENSION);
                    $newImageName = $newTitle . '-image-' . time() . rand(1, 1000) . '.' . $imageExtension;

                    // ! RENAME THE IMAGE FILE ! //
                    rename($existingImagePath, public_path('images/' . $newImageName));

                    // * PREPARE THE IMAGE DATA TO UPDATE THE IMAGE RECORD * //
                    $imagesToUpdate[] = [
                        'id' => $existingImage->id,
                        'image' => $newImageName,
                    ];
                }
            }

            // * UPDATE THE IMAGE RECORDS WITH THE NEW FILE NAMES * //
            foreach ($imagesToUpdate as $imageData) {
                $image->where('id', $imageData['id'])->update([
                    'image' => $imageData['image'],
                ]);
            }
        }

        // * UPDATE THE ANNOUNCEMENT (INCLUDING ITS NON-IMAGE FIELDS) * //
        $update_announcement->update($request->validated());

        // * HANDLE IMAGE UPDATES AS BEFORE (ADD, DELETE, OR RETAIN IMAGES) * //
        if ($request->hasFile('images')) {
            // ! DELETE EXISTING IMAGES ASSOCIATED WITH THE ANNOUNCEMENT FROM THE PUBLIC FOLDER ! //
            foreach ($update_announcement->images as $existingImage) {
                if (file_exists(public_path('images/' . $existingImage->image))) {
                    unlink(public_path('images/' . $existingImage->image));
                }
            }

            // ! DELETE EXISTING IMAGES ASSOCIATED WITH THE ANNOUNCEMENT FROM THE DATABASE ! //
            $update_announcement->images()->delete();

            foreach ($request->file('images') as $imageFile) {
                $imageName = $update_announcement->title . '-image-' . time() . rand(1, 1000) . '.' . $imageFile->extension();
                $imageFile->move(public_path('images'), $imageName);

                // * CREATE A NEW IMAGE RECORD ASSOCIATED WITH THE ANNOUNCEMENT * //
                $image->create([
                    'announcement_id' => $update_announcement->id,
                    'image' => $imageName,
                ]);
            }
        }
        return redirect()->route('announcement-list')->with("success", "Announcement Updated!");
    }

    public function destroy(Announcement $announcement, $id)
    {
        $delete_announcement = $announcement->findOrFail($id);

        // ! DELETE THE ASSOCIATED IMAGES FROM THE PUBLIC FOLDER ! //
        foreach ($delete_announcement->images as $images) {
            if (file_exists(public_path('images/' . $images->image))) {
                unlink(public_path('images/' . $images->image));
            }

            // ! DELETE THE ASSOCIATED IMAGES FROM ANNOUNCEMENT TABLE TO IMAGE TABLE ! //
            $images->delete();
        }

        $delete_announcement->delete();

        return to_route('announcement-list')->with("success", "Delete Successful!");
    }
}
