<?php namespace Gumennikov2002\ApiDoc\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use SystemException;

/**
 * Docs Backend Controller
 *
 * @link https://docs.octobercms.com/3.x/extend/system/controllers.html
 */
class Docs extends Controller
{
    public $implement = [];

    /**
     * @var array documentation
     */
    public array $docs = [];

    public string $pluginAssetsPath = '/plugins/gumennikov2002/apidoc/assets/';

    /**
     * @var array required permissions
     */
    public $requiredPermissions = ['gumennikov2002.apidoc.docs'];

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('gumennikov2002.ApiDoc', 'apidoc', 'docs');
    }

    /**
     * Index page
     *
     * @return string|false
     * @throws SystemException
     */
    public function index(): string|false
    {
        $this->pageTitle = trans('gumennikov2002.apidoc::lang.docs.meta.page_title');
        $docs = $this->docs;
        $assetsPath = $this->pluginAssetsPath;

        return $this->makeLayout('index', compact('docs', 'assetsPath'));
    }
}
