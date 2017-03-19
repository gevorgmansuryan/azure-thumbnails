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
	 */
	public function show($quality = 99)
	{
		header('Content-Type: image/jpeg');
		imagejpeg($this->thumbnail, null, $quality);
	}

	public function __destruct()
	{
		imagedestroy($this->thumbnail);
	}
}