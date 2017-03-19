<?php

namespace Gevman\Thumbnails;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class Generator
{
	/**
	 * @var Client
	 */
	private $httpClient;

	/**
	 * Generator constructor.
	 *
	 * @param $key - Computer Vision API key from Microsoft Azure
	 */
	public function __construct($key)
	{
		$this->httpClient = new Client([
			'base_uri' => 'https://westus.api.cognitive.microsoft.com/vision/v1.0/generateThumbnail',
			'verify' => false,
			'headers' => [
				'Content-Type' => 'application/octet-stream',
				'Ocp-Apim-Subscription-Key' => $key
			]
		]);
	}

	/**
	 * Create thumbnail
	 *
	 * @param $image - $image full path
	 * @param $width - thumbnail width
	 * @param $height - thumbnail height
	 *
	 * @return Thumbnail
	 * @throws Exception
	 */
	public function thumbnail($image, $width, $height)
	{
		$imageInfo = @getimagesize($image);
		if (!$imageInfo) {
			throw new Exception('Not a valid image');
		}
		if (!in_array($imageInfo[2], [IMAGETYPE_JPEG, IMAGETYPE_GIF, IMAGETYPE_PNG, IMAGETYPE_BMP])) {
			throw new Exception('Image file size must be less than 4MB.');
		}
		if (filesize($image) / 1024 >= 4096) {
			throw new Exception('Supported image formats: JPEG, PNG, GIF, BMP. ');
		}
		if ($imageInfo[0] < 50 || $imageInfo[1] < 50) {
			throw new Exception('Image dimensions should be greater than 50 x 50.');
		}
		try {
			$response = $this->httpClient->post('', [
				'body' => fopen($image, 'r'),
				'query' => [
					'width' => $width,
					'height' => $height,
					'smartCropping' => 'true'
				]
			]);
			return new Thumbnail($response->getBody()->getContents());
		} catch (ClientException $e) {
			$response = \GuzzleHttp\json_decode($e->getResponse()->getBody()->getContents(), true);
			throw new Exception($response['message']);
		}
	}
}