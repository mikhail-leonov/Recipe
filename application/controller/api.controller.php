<?php
/**
 * Include section
 */
require_once(CONTROLLER . 'abstract.controller.php');
require_once(FACTORY . 'model.factory.php ');

/**
 * Class Api Controller
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class ApiController extends AbstractController
{
    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Implementation AbstractController setControllerName function - Whenever a controller is created, we set it's name
     *
     * @return void
     */
    public function setControllerName()
    {
        $this->name = "api";
    }

    /**
     * PAGE: api/index
     * This method handles what happens when you move to http://yourproject/api/index
     */
    public function index($params)
    {
        header('Location: /');
    }

    /**
     * PAGE: api/select_tag
     * This method handles what happens when you move to http://yourproject/api/select_tag
     *
     * @var array $params parameters
     *
     * @return void
     */
    public function select_tag($params)
    {
        $apiModel = ModelFactory::build("api");
        $apiModel->select_tag();
        header('Location: /');
    }

    /**
     * PAGE: api/unselect_tag
     * This method handles what happens when you move to http://yourproject/api/unselect_tag
     *
     * @var array $params parameters
     *
     * @return void
     */
    public function unselect_tag($params)
    {
        $apiModel = ModelFactory::build("api");
        $apiModel->unselect_tag();
        header('Location: /');
    }

    /**
     * PAGE: api/add_tag
     * This method handles what happens when you move to http://yourproject/api/add_tag
     *
     * @var array $params parameters
     *
     * @return void
     */
    public function add_tag($params)
    {
        $apiModel = ModelFactory::build("api");
        $apiModel->add_tag($_GET);
        $href = Util::GetAttribute($_GET, 'href', '/');
        header("Location: {$href}");
    }

    /**
     * PAGE: api/del_tag
     * This method handles what happens when you move to http://yourproject/api/del_tag
     *
     * @var array $params parameters
     *
     * @return void
     */
    public function del_tag($params)
    {
        $apiModel = ModelFactory::build("api");
        $apiModel->del_tag($_GET);
        $href = Util::GetAttribute($_GET, 'href', '/');
        header("Location: {$href}");
    }

    /**
     * PAGE: api/new_tag
     * This method handles what happens when you move to http://yourproject/api/new_tag
     *
     * @var array $params parameters
     *
     * @return int 0|1
     */
    public function new_tag($params)
    {
        $apiModel = ModelFactory::build("api");
        print($apiModel->new_tag($_POST));
    }
}
