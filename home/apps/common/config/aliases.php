<?php
/**
 * User: planet17
 * Date: 26.02.16
 * Time: 0:06
 */
/** Set a GLOBAL alias @root_namespace for apps */
Yii::setAlias('@apps', helpers_pl17_dir_get(__DIR__, 2));
Yii::setAlias('@common-configuration', __DIR__);
Yii::setAlias('@console-dir', helpers_pl17_dir_get(__DIR__, 3, ['yii2']));
Yii::setAlias('@vendor', helpers_pl17_dir_get(__DIR__, 3, ['yii2', 'vendor']));
Yii::setAlias('@path-www', helpers_pl17_dir_get(__DIR__, 4,['www']));
