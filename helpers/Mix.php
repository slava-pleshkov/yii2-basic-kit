<?php

namespace yii\helpers;

class Mix extends BaseArrayHelper
{
	/**
	 * Determine if a given string starts with a given substring.
	 *
	 * @param  string $haystack
	 * @param  string|array $needles
	 * @return bool
	 */
	public static function starts_with($haystack, $needles)
	{
		foreach ((array)$needles as $needle) {
			if ($needle != '' && substr($haystack, 0, strlen($needle)) === (string)$needle) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Get the path to a versioned Mix file.
	 *
	 * @param  string $path
	 * @param  string $manifestDirectory
	 *
	 * @return string
	 * @throws \Exception
	 */
	public static function mix($path, $manifestDirectory = '')
	{
		static $manifest;

		if (!self::starts_with($path, '/')) {
			$path = "/{$path}";
		}

		if ($manifestDirectory && !self::starts_with($manifestDirectory, '/')) {
			$manifestDirectory = "/{$manifestDirectory}";
		}

		if (file_exists(self::public_path($manifestDirectory . '/hot'))) {
			return "//localhost:8080{$path}";
		}

		if (!$manifest) {
			if (!file_exists($manifestPath = self::public_path($manifestDirectory . '/mix-manifest.json'))) {
				throw new \Exception('The Mix manifest does not exist.');
			}

			$manifest = json_decode(file_get_contents($manifestPath), true);
		}

		if (!array_key_exists($path, $manifest)) {
			throw new \Exception(
				"Unable to locate Mix file: {$path}. Please check your " .
				'webpack.mix.js output paths and try again.'
			);
		}

		return $manifestDirectory . $manifest[$path];
	}

	private static function public_path($string)
	{
		return Yii::getAlias('@webroot') . $string;
	}
}