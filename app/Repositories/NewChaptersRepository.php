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
			'type' => 'all'
		];
        $uri = http_build_query($data);
        $url = getenv('API_MANGA_NEW_CHAPTERS').$uri;

		return Cache::store('redis')->remember($url, 2, function () use ($url) {
            $curl = new Curl();
            $curl->get($url);
            if (!$curl->error) {
                return json_decode($curl->rawResponse,1)['newch_list'];
            } else {
                throw new \Exception('Error API');
            }

		});

	}
}