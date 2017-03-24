# Azure Thumbnails

[![Latest Stable Version](https://poser.pugx.org/gevman/azure-thumbnails/v/stable?format=flat-square)](https://packagist.org/packages/gevman/azure-thumbnails)
[![Latest Unstable Version](https://poser.pugx.org/gevman/azure-thumbnails/v/unstable?format=flat-square)](https://packagist.org/packages/gevman/azure-thumbnails)
[![License](https://poser.pugx.org/gevman/azure-thumbnails/license?format=flat-square)](https://packagist.org/packages/gevman/azure-thumbnails)

Create image thumbnails with help of Microsoft Artificial Intelligence, and show what needed!

A thumbnail is a small representation of a full-size image. Varied devices such as phones, tablets, and PCs create a need for different user experience (UX) layouts and thumbnail sizes. Using smart cropping, this Computer Vision API feature helps solve the problem.

After uploading an image, a high quality thumbnail gets generated and the Computer Vision API algorithm analyzes the objects within the image, then crops it to fit the requirements of the “region of interest” (ROI). The output gets displayed within a special framework as seen in below illustration. The generated thumbnail can be presented in a different aspect ratio than that of the original image to accommodate a user’s needs.

The thumbnail algorithm works as follows:

- Removes distracting elements from the image and recognizes the main object, the “region of interest” (ROI).
- Crops the image based on identified “region of interest”.
- Changes the aspect ratio to fit the target thumbnail dimensions.


![gevman/azure-thumbnails](http://i.imgur.com/Y2hI8D8.png)

## Installation (using composer)

```bash
composer require gevman/azure-thumbnails
```

### Methods

##### thumbnail(string $image, int $width, int $height)
###### Create thumbnail
- `$image` - full path of image
- `$width` - thumbnail width
- `$height` - thumbnail height

##### saveAs(string $file \[, int $quality = 99\])
###### Save thumbnail to specified path
- `$file` - full path of thumbnail
- `$quality` - thumbnail quality


##### show(\[int $quality = 99\]\[, string $contentType = 'image/jpeg'\])
###### Show thumbnail
- `$quality` - thumbnail quality
- `$contentType` - Content-Type header


### Example of usage

###### Get your `Computer Vision API key` from [Microsoft Azure](https://portal.azure.com/#create/Microsoft.CognitiveServices/apitype/ComputerVision)

```php
require '../vendor/autoload.php';

$generator = new \Gevman\Thumbnails\Generator('{Computer Vision API key}');

$thumb = $generator->thumbnail('/full/path/to/original.jpg', 1000, 500);

//will save thumbnail to specified path
$thumb->saveAs('/full/path/to/thumbnail.jpg', 100);

//will show thumbnail
$thumb->show();
```
