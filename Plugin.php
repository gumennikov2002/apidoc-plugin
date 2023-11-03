<?php namespace Gumennikov2002\ApiDoc;

use Backend;
use System\Classes\PluginBase;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails(): array
    {
        return [
            'name' => trans('gumennikov2002.apidoc::lang.plugin.name'),
            'description' => trans('gumennikov2002.apidoc::lang.plugin.description'),
            'author' => 'gumennikov2002',
            'icon' => 'icon-circle-o'
        ];
    }

    /**
     * registerNavigation used by the backend.
     */
    public function registerNavigation(): array
    {
        return [
            'apidoc' => [
                'label' => trans('gumennikov2002.apidoc::lang.docs.meta.navigation_label'),
                'url' => Backend::url('gumennikov2002/apidoc/docs'),
                'icon' => 'icon-file-code-o',
                'permissions' => ['gumennikov2002.apidoc.*'],
                'order' => 999
            ]
        ];
    }
}
