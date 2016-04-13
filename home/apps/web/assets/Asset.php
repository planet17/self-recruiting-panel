<?php
namespace apps\web\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * @author Nickolas Lyzhov <7.fast.cookies@gmail.com>
 * @since alpha
 */
class Asset extends AssetBundle
{
    /** @var null public $sourcePath = null; */
    public $basePath = '@path-web';
    public $baseUrl = '@link-web';

    public $css = ['css/site.css'];
    public $cssOptions = ['position' => View::POS_HEAD, 'noscript' => false];

    public $js = [];
    public $jsOptions = ['position' => View::POS_END];

    public $depends = ['apps\web\assets\GoogleAsset', 'yii\web\JqueryAsset'];
}
