<?php

namespace App\Http\Controllers;

use App\Exercise;
use Illuminate\Http\Request;
use App\Http\Resources\ExerciseResource;
use Image;
use File;

class ExerciseController extends Controller
{

    private $imagesPath = '/uploads/exercises/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
     */
    public function index()
    {
      // return ExerciseResource::collection(Exercise::all());
      return ExerciseResource::collection(Exercise::with('bodyAreas')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'name'         => 'required|max:150|string',
          'base64_image' => 'required|string',
          // 'body_area'    =
        ]);


        //Get the image from base64 string.
        $img = Image::make($request->base64_image);

        $imageName = time() . $this->getImageExtension( $img );
        $this->saveImageFromBase64($img, $imageName);

        $exercise           = new Exercise;
        $exercise->name     = $request->name;
        $exercise->srcImage = $imageName;

        //Saves exercise instance on the database.
        $exercise->save();

        return $this->customResponse('success', $exercise, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exercise  $exercise
     * @return \Illuminate\Http\Response
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
     */
    public function show(Exercise $exercise)
    {
        return new ExerciseResource( Exercise::findOrFail($exercise->id) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exercise  $exercise
     * @return \Illuminate\Http\Response
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
     */
    public function update(Request $request, Exercise $exercise)
    {
      $this->validate($request, [
        'name'         => 'required|max:150|string',
        'base64_image' => 'nullable|string'
      ]);

      $exercise->name     = $request->name;

      if($request->base64_image) {
        //Get the image from base64 string.
        $newImg = Image::make($request->base64_image);

        //Delete current image for file system.
        $imagePathToDelete = public_path($this->imagesPath) . $exercise->srcImage;
        $this->deleteFile( $imagePathToDelete );

        //Create new image on the file system.
        $imageName = time() . $this->getImageExtension( $newImg );
        $this->saveImageFromBase64($newImg, $imageName);

        $exercise->srcImage = $imageName;
      }

      $exercise->update();

      return $this->customResponse('success', $exercise, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exercise  $exercise
     * @return \Illuminate\Http\Response
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
     */
    public function destroy(Exercise $exercise)
    {
        $imageName = $exercise->srcImage;
        $imagePathToDelete = public_path($this->imagesPath) . $imageName;
        
        $this->deleteFile( $imagePathToDelete );
        $exercise->delete();
        
        return $this->customResponse('success', $exercise, 200);
    }

    /**
     * Retrieves and returns extension from a given image.
     *
     * @param  \Image  $image
     * @return \String $extension
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
     */
    public function getImageExtension( $image ) {
      
      $extension = '';
      $mime = $image->mime();
      
      if ($mime == 'image/jpeg')
          $extension = '.jpg';
      elseif ($mime == 'image/png')
          $extension = '.png';
      elseif ($mime == 'image/bmp')
          $extension = '.bmp';

      return $extension;

    }

    /**
     * Saves a given image on the file system.
     *
     * @param  \Image   $image
     * @param  \String  $imageName
     * @return {*}
     * @author Marcos Barrera del Río <elyomarcos@gmail.com>
     */
    public function saveImageFromBase64( $img, $imageName ) {
        
      //Performs a resize to the given image.
      $img->resize(null, 450, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
      });

      //Saves the image on hard disk.
      $img->save( public_path( $this->imagesPath ) . $imageName);

    }

    public function deleteFile( $path ) {
      if(File::exists($path))
        File::delete($path);
    }

}
