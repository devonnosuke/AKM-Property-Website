<?php

/**
 * Helper method to resize image size dimension
 * 
 * Examples:
 *    imgResize('picture01.png', 'assets/img/', 800, 600, true, 65);
 *
 * @param string $imageName
 * @param string $path
 * @param int $width
 * @param int $height
 * @param bool $maintainRatio If true, will get the closest match possible while keeping aspect ratio true.
 * @param int $quality Percent of image quality | It will only be used if the img extension source is jpeg or jpg, otherwise it will be ignored.
 *
 * @return imgResize|bool
 */
function imgResize($imageName, $path, $width, $height, $maintainRatio = false, $quality = 100)
{
    $imgManipulator = \Config\Services::image();

    $imgManipulator->withFile($path . '/' . $imageName)
        ->resize($width, $height, $maintainRatio)
        ->save($path . '/' . $imageName, $quality);

    return $imgManipulator;
}

/**
 * Helper method to convert image to another extension
 * 
 * Examples:
 *    imgConvert('picture01.png', 'picture01', 'assets/img/', 'jpg', 65);
 *
 * @param string $imgNameWithOldExt
 * @param string $imgNameOnly
 * @param string $path
 * @param string $ext
 * @param string $target_extension
 * @param int $quality Percent of image quality | It will only be used if the img extension source is jpeg or jpg, otherwise it will be ignored.
 *
 * @return imgConvert|bool
 */
function imgConvert($imgNameWithOldExt, $imgNameOnly, $path, $target_extension, $quality = 100)
{
    $imgManipulator = \Config\Services::image('gd');

    switch ($target_extension) {
        case 'webp':
            $extension = IMAGETYPE_WEBP;
            break;
        case 'jpg':
            $extension = IMAGETYPE_JPEG;
            break;
        case 'png':
            $extension = IMAGETYPE_PNG;
            break;
        case 'psd':
            $extension = IMAGETYPE_PSD;
            break;
        default:
            $extension = IMAGETYPE_WEBP;
            break;
    }

    $imgManipulator->withFile($path . '/' . $imgNameWithOldExt)
        ->withResource()
        ->convert($extension)
        ->save($path . '/' . $imgNameOnly . '.' . $target_extension, $quality);

    if ($imgManipulator) {
        unlink($path . '/' . $imgNameWithOldExt);
        return $imgManipulator;
    }
    return $imgManipulator;
}

/**
 * Helper method to resize dimension and crop image
 * 
 * Examples:
 *    imgFit('picture01.png', 'assets/img/', 65, 800, 600);
 *
 * @param string $imageName
 * @param string $path
 * @param int $quality Percent of image quality | It will only be used if the img extension source is jpeg or jpg, otherwise it will be ignored.
 * @param int $width
 * @param int $height
 * @return imgFit|bool
 */
function imgFit($imageName, $path, $width = 1000, $height = 500, $quality = 80)
{

    $imgManipulator = \Config\Services::image('gd');

    $imgManipulator->withFile($path . '/' . $imageName)
        ->fit($width, $height, 'center')
        ->save($path . '/' . $imageName, $quality);

    return $imgManipulator;
}

/**
 * Helper method to generate new image name with new extension to be converted
 * 
 * Examples:
 *    imgGenerateName($file->getRandomName(), 'Slider', 'webp');
 *
 * @param string $randomName
 * @param string $forWhat
 * @param int $img_newExt
 * @return imgGenerateName|array
 */
function imgGenerateName($randomName, $forWhat = 'Website', $img_newExt = 'jpg')
{

    // Get name Img without extension
    $img_arr = explode('.', $randomName);

    // Generate New name
    $date = date('_M_d_Y-A-h-i_');
    $img_nameOnly =  $img_arr[0];
    $img_nameOnly = explode('_', $img_nameOnly);
    $img_nameOnly = $forWhat . $date . $img_nameOnly[0];

    $img_oldExt = end($img_arr);

    $img_nameWithOldExt = $img_nameOnly . '.' . $img_oldExt;
    $img_nameWithNewExt = $img_nameOnly . '.' . $img_newExt;

    if (!$img_nameOnly && !$img_nameWithOldExt && !$img_nameWithNewExt) {
        return false;
    }

    return [
        'nameOnly' => $img_nameOnly,
        'oldExtOnly' => $img_oldExt,
        'nameWithOldExt' => $img_nameWithOldExt,
        'nameWithNewExt' => $img_nameWithNewExt,
    ];
}
