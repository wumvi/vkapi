<?php

use Vk\Parameters\AppWidgets\AppImageUploadServer as AppImageUploadServerParam;
use Vk\AppWidgets;

$token = '123';

$arguments = new AppImageUploadServerParam();
$arguments->setImageType(AppImageUploadServerParam::IMAGE_TYPE_510_128);

$server = new AppWidgets($token);
$info = $server->getAppImageUploadServer($arguments);
if ($info) {
    var_dump($info);
    $upload = $server->uploadFile($info->getUploadUrl(), 'z:\preview.jpg', 'image/jpeg');
    var_dump($upload);
    $image = $server->saveAppImage($upload->getHash(), $upload->getImage());
    var_dump($image);
}