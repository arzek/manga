<?php
/**
 * Created by PhpStorm.
 * User: artembondarchuk
 * Date: 13.01.18
 * Time: 15:29
 */

namespace App\Repositories;

use App\Entities\Manga;
use Curl\Curl;
use Illuminate\Support\Facades\Cache;

class MangaRepository
{
    /**
     * @param int $id
     * @return mixed
     * @throws \ErrorException
     * @throws \Exception
     */
    public function getById(int $id)
    {
        try {
            $manga = Manga::find($id);
        }catch (\Exception $exception) {
            return $this->getMangaFromApi($id);
        }

        if ($manga) {
            return $manga;
        } else {
            $res = $this->getMangaFromApi($id);
            try {
                $manga = new Manga();
                $manga->prepareData($res);
                $manga->save();
                return $manga;
            } catch (\Exception $exception) {
                return $res;
            }
        }
    }

    /**
     * @param array $data
     * @return mixed
     */
    private function dataFormatting(array $data)
    {
        $res = $data['data'][0];
        $count = count($data['chapter']);
        if ($count) {
            for ($i = 0; $i < $count; $i++) {
                $res['chapters'][$i]['vol'] = $data['chapter'][$i]['vol'];
                $res['chapters'][$i]['ch'] = (int) $data['chapter'][$i]['ch'];
                $res['chapters'][$i]['date'] = $data['chapter'][$i]['date'];

                for ($j = 0; $j < count($data['chapter'][$i]['img_name']); $j++) {
                    $res['chapters'][$i]['items'][] = $data['site_list'][0].'/'
                        .$data['middle_url'][0].'/'
                        .$data['chapter'][$i]['dir'].'/'
                        .$data['chapter'][$i]['img_name'][$j].'.'
                        .$data['chapter'][$i]['img_ext'][$j];

                }
            }

        } else {
            $res['chapters'] = [];
        }

        return $res;
    }

    /**
     * @param int $id
     * @return mixed
     * @throws \ErrorException
     * @throws \Exception
     */
    private function getMangaFromApi(int $id)
    {
        $data = [
            'secretlinkType' => getenv('SECRET_LINK_TYPE'),
            'id' => $id
        ];

        $uri = http_build_query($data);
        $url = getenv('API_MANGA_MANGA').$uri;

        $curl = new Curl();
        $curl->get($url);

        if (!$curl->error) {
            return $this->dataFormatting(json_decode($curl->rawResponse,1));
        } else {
            throw new \Exception('Error API');
        }
    }
}