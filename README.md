# Azure Thumbnails

Create image thumbnails with help of Microsoft Artificial Intelligence, and show what needed!

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


##### show(\[int $quality = 99\])
###### Show thumbnail
- `$quality` - thumbnail quality


### Example of usage

###### Get your `Computer Vision API key` from [Microsoft Azure](https://portal.azure.com/#create/Microsoft.CognitiveServices/apitype/ComputerVision)

```php
require '../vendor/autoload.php';

$generator = new \Gevman\Thumbnails\Generator('{Computer Vision API key}');

$thumb = $generator->thumbnail('/full/path/to/original.jpg', 1000, 500);

//will save thumbnail to specified path
$thumb->saveAs('/full/path/to/thumbnail.jpg', 100);

//will save show thumbnail
$thumb->show();
```