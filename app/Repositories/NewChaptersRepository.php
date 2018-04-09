<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 24.03.2018
 * Time: 16:01
 */

namespace App\Repositories;
use Curl\Curl;
use Illuminate\Support\Facades\Cache;

/**
 * Class NewChaptersRepository
 * @package App\Repositories
 */
class NewChaptersRepository
{

	public function getChapters()
	{
		$data = [
			'secretlinkType' => getenv('SECRET_LINK_TYPE'),
			'id' => $id
		];

		$curl = new Curl();
		$data = [
			'secretlinkType' => getenv('SECRET_LINK_TYPE'),
			'id' => $id
		];
		return Cache::store('redis')->remember($url, 1440, function () use ($url) {
			return $this->getDateFromApi($url);
		});

	}
}