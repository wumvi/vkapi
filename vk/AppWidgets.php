<?php
declare(strict_types=1);

namespace Vk;


use LightweightCurl\Curl;
use LightweightCurl\File;
use LightweightCurl\Request;
use Vk\Parameters\AppWidgets\AppImageUploadServer as AppImageUploadServerParametrs;
use Vk\Result\AppWidgets\AppImageUploadServer as AppImageUploadServerResult;
use Vk\Result\AppWidgets\Upload;

class AppWidgets extends Exec
{
    public function getAppImageUploadServer(AppImageUploadServerParametrs $info): AppImageUploadServerResult
    {
        $arguments = [
            'image_type' => $info->getImageType(),
        ];

        $json = $this->request('appWidgets.getAppImageUploadServer', $arguments);

        return new AppImageUploadServerResult($json);
    }

    public function uploadFile(string $url, string $file, string $contentType): Upload
    {
        $curl = new Curl();
        $request = new Request();
        $request->setUrl($url);
        $request->setMethod(Request::METHOD_POST);
        $request->addFile('image', new File($file, $contentType, 'preview.jpg'));
        $raw = $curl->call($request);
        $json = json_decode($raw->getData());
        if (!$json) {
            throw new \Exception('Error get upload data');
        }

        return new Upload($json);
    }

    public function saveAppImage(string $hash, string $image)
    {
        $arguments = [
            'hash' => $hash,
            'image' => $image,
        ];

        $json = $this->request('appWidgets.saveAppImage', $arguments);
        var_dump($json);

        // return new AppImageUploadServerResult($json);
    }
}
