<?php
/**
 * Include section
 */
require_once(CONTROLLER . 'abstract.controller.php');
require_once(FACTORY . 'model.factory.php');
require_once(FACTORY . 'view.factory.php');

/**
 * Class Home Controller
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class HomeController extends AbstractController
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
        $this->name = "home";
    }

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/ (which is the default page btw)
     *
     * @var array $params parameters
     *
     * @return string
     */
    public function index($params)
    {
        $pageView     = ViewFactory::build("page.page");

        $tagModel   = ModelFactory::build("tag");
            $groups     = $tagModel->getGroups();
	    $tags       = $tagModel->getTags();
  	    $selected   = $tagModel->getSelectedTags();

      	$recipeModel = ModelFactory::build("recipe");
	    $entries = $recipeModel->GetRecipies();

        $leftmenuView = ViewFactory::build("left_menu.part");
            $leftmenuView->assign("selected", $selected);
            $leftmenuView->assign("tags", $tags);
            $leftmenuView->assign("groups", $groups);
        $left_menu = $leftmenuView->fetch();
            
       	$recipiesView   = ViewFactory::build("recipies.part");
       	    $recipiesView->assign("entries", $entries);
	    $content = $recipiesView->fetch();

        $pageView->assign("left_menu", $left_menu);
        $pageView->assign("content", $content);

        $pageView->display();
    }

    /**
     * PAGE: search
     * This method handles what happens when you move to http://yourproject/search
     *
     * @var array $params parameters
     *
     * @return string
     */
    public function search($params)
    {
        $pageView     = ViewFactory::build("page.page");

        $tagModel   = ModelFactory::build("tag");
            $groups     = $tagModel->getGroups();
	    $tags       = $tagModel->getTags();
  	    $selected   = $tagModel->getSelectedTags();

      	$recipeModel = ModelFactory::build("recipe");
	    $entries = $recipeModel->SearchRecipies($_GET);

        $leftmenuView = ViewFactory::build("left_menu.part");
            $leftmenuView->assign("selected", $selected);
            $leftmenuView->assign("tags", $tags);
            $leftmenuView->assign("groups", $groups);
        $left_menu = $leftmenuView->fetch();

        $recipiesView   = ViewFactory::build("recipies.part");
            $recipiesView->assign("entries", $entries);
	    $content = $recipiesView->fetch();
    
        $pageView->assign("left_menu", $left_menu);
        $pageView->assign("content", $content);

        $pageView->display();
    }
}
