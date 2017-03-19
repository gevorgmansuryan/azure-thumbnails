<?php

namespace Gevman\Thumbnails;


class Thumbnail
{
	/**
	 * @var resource
	 */
	private $thumbnail;

	/**
	 * Thumbnail constructor.
	 *
	 * @param string $thumbnail
	 */
	public function __construct($thumbnail)
	{
		$this->thumbnail = imagecreatefromstring($thumbnail);
	}

	/**
	 * Save thumbnail to specified path
	 *
	 * @param $file
	 * @param int $quality
	 */
	public function saveAs($file, $quality = 99)
	{
		imagejpeg($this->thumbnail, $file, $quality);
	}

	/**
	 * Show thumbnail
	 *
	 * @param int $quality
	 * @param string $contentType
	 */
	public function show($quality = 99, $contentType = 'image/jpeg')
	{
		if ($contentType) {
			header("Content-Type: {$contentType}");
		}
		imagejpeg($this->thumbnail, null, $quality);
	}

	public function __destruct()
	{
		imagedestroy($this->thumbnail);
	}
}