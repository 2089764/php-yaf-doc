<?php

define('YAF_VERSION', '2.2.9', true);
define('YAF_ENVIRON', 'product', true);
define('YAF_ERR_STARTUP_FAILED', 512, true);
define('YAF_ERR_ROUTE_FAILED', 513, true);
define('YAF_ERR_DISPATCH_FAILED', 514, true);
define('YAF_ERR_NOTFOUND_MODULE', 515, true);
define('YAF_ERR_NOTFOUND_CONTROLLER', 516, true);
define('YAF_ERR_NOTFOUND_ACTION', 517, true);
define('YAF_ERR_NOTFOUND_VIEW', 518, true);
define('YAF_ERR_CALL_FAILED', 519, true);
define('YAF_ERR_AUTOLOAD_FAILED', 520, true);
define('YAF_ERR_TYPE_ERROR', 521, true);

/**
 * Yaf_Application provides a bootstrapping facility for applications which provides reusable resources, common- and module-based bootstrap classes and dependency checking.
 *
 * <br/>
 * <b>Note:</b>
 * <p>
 * Yaf_Application implements the singleton pattern, and Yaf_Application can not be serialized or un-serialized which will cause problem when you try to use PHPUnit to write some test case for Yaf.<br/>
 * You may use &#64;backupGlobals annotation of PHPUnit to control the backup and restore operations for global variables. thus can solve this problem.
 * </p>
 * @link http://www.php.net/manual/en/class.yaf-application.php
 */
final class Yaf_Application {

	/**
	 * @var Yaf_Application
	 */
	protected static $_app;
	/**
	 * @var Yaf_Config_Abstract
	 */
	protected $config;
	/**
	 * @var Yaf_Dispatcher
	 */
	protected $dispatcher;
	/**
	 * @var array
	 */
	protected $_modules;
	/**
	 * @var string
	 */
	protected $_running = "";
	/**
	 * @var string
	 */
	protected $_environ = YAF_ENVIRON;
	/**
	 * @since 2.1.2
	 * @var string
	 */
	protected $_err_no = 0;
	/**
	 * @since 2.1.2
	 * @var string
	 */
	protected $_err_msg = "";

	/**
	 * @link http://www.php.net/manual/en/yaf-application.construct.php
	 *
	 * @param string|array $config - A ini config file path, or a config array
	 * <p>
	 * If is a ini config file, there should be a section named as the one defined by yaf.environ, which is "product" by default.
	 * </p>
	 * <br/>
	 * <b>Note:</b>
	 * <p>If you use a ini configuration file as your application's config container. you would open the yaf.cache_config to improve performance.</p>
	 * <p>And the config entry(and there default value) list blow:</p>
	 *
	 * <p>
	 *    <b>Example #1 A ini config file example</b><br/>
	 *    [product]<br/>
	 *    ;this one should alway be defined, and have no default value<br/>
	 *    application.directory=APPLICATION_PATH<br/><br/>
	 * </p>
	 * <p>
	 *    ;following configs have default value, you may no need to define them
	 * <br/>
	 *    application.library = APPLICATION_PATH . "/library" <br/>
	 *    application.dispatcher.throwException=1 <br/>
	 *    application.dispatcher.catchException=1 <br/><br/>
	 * </p>
	 * <p>application.baseUri=""<br/><br/></p>
	 * <p>
	 *    ;the php script ext name<br/>
	 *    ap.ext=php<br/><br/>
	 * </p>
	 * <p>
	 *    ;the view template ext name<br/>
	 *    ap.view.ext=phtml<br/><br/>
	 * </p>
	 * <p>
	 *    ap.dispatcher.defaultModuel=Index<br/>
	 *    ap.dispatcher.defaultController=Index<br/>
	 *    ap.dispatcher.defaultAction=index<br/><br/>
	 * </p>
	 * <p>
	 *    ;defined modules<br/>
	 *    ap.modules=Index
	 * </p>
	 * @param string $envrion - Which section will be loaded as the final config
	 */
	public function __construct($config, $envrion = NULL){}

	/**
	 * Run a Yaf_Application, let the Yaf_Application accept a request, and route the request, dispatch to controller/action, and render response.
	 * return response to client finally.
	 *
	 * @link http://www.php.net/manual/en/yaf-application.run.php
	 */
	public function run(){}

	/**
	 * This method is typically used to run Yaf_Application in a crontab work.
	 * Make the crontab work can also use the autoloader and Bootstrap mechanism.
	 *
	 * @link http://www.php.net/manual/en/yaf-application.execute.php
	 *
	 * @param callable $entry - a valid callback
	 * @param string $_ - parameters will pass to the callback
	 */
	public function execute(callable $entry, $_ = "..."){}

	/**
	 * Retrieve the Yaf_Application instance, alternatively, we also could use Yaf_Dispatcher::getApplication().
	 *
	 * @link http://www.php.net/manual/en/yaf-application.app.php
	 *
	 * @return Yaf_Application|NULL - an Yaf_Application instance, if no Yaf_Application initialized before, NULL will be returned.
	 */
	public static function app(){}

	/**
	 * Retrieve environ which was defined in yaf.environ which has a default value "product".
	 *
	 * @link http://www.php.net/manual/en/yaf-application.environ.php
	 *
	 * @return string
	 */
	public function environ(){}

	/**
	 * Run a Bootstrap, all the methods defined in the Bootstrap and named with prefix "_init" will be called according to their declaration order, if the parameter bootstrap is not supplied, Yaf will look for a Bootstrap under application.directory.
	 *
	 * @link http://www.php.net/manual/en/yaf-application.bootstrap.php
	 *
	 * @param Yaf_Bootstrap_Abstract $bootstrap - A Yaf_Bootstrap_Abstract instance
	 * @return Yaf_Application
	 */
	public function bootstrap(Yaf_Bootstrap_Abstract $bootstrap = NULL){}

	/**
	 * @link http://www.php.net/manual/en/yaf-application.getconfig.php
	 *
	 * @return Yaf_Config_Abstract
	 */
	public function getConfig(){}

	/**
	 * Get the modules list defined in config, if no one defined, there will always be a module named "Index".
	 *
	 * @link http://www.php.net/manual/en/yaf-application.getmodules.php
	 *
	 * @return array
	 */
	public function getModules(){}

	/**
	 * @link http://www.php.net/manual/en/yaf-application.getdispatcher.php
	 *
	 * @return Yaf_Dispatcher
	 */
	public function getDispatcher(){}

	/**
	 * Change the application directory
	 *
	 * @since 2.1.4
	 * @link http://www.php.net/manual/en/yaf-application.setappdirectory.php
	 *
	 * @param string $directory
	 * @return Yaf_Application
	 */
	public function setAppDirectory($directory){}

	/**
	 *
	 * @since 2.1.4
	 * @link http://www.php.net/manual/en/yaf-application.getappdirectory.php
	 *
	 * @return string
	 */
	public function getAppDirectory(){}

	/**
	 *
	 * @since 2.1.2
	 * @link http://www.php.net/manual/en/yaf-application.getlasterrorno.php
	 *
	 * @return int
	 */
	public function getLastErrorNo(){}

	/**
	 *
	 * @since 2.1.2
	 * @link http://www.php.net/manual/en/yaf-application.getlasterrormsg.php
	 *
	 * @return string
	 */
	public function getLastErrorMsg(){}

	/**
	 *
	 * @since 2.1.2
	 * @link http://www.php.net/manual/en/yaf-application.clearlasterror.php
	 */
	public function clearLastError(){}

	/**
	 *
	 * @link http://www.php.net/manual/en/yaf-application.destruct.php
	 */
	public function __destruct(){}

	/**
	 *
	 * @link http://www.php.net/manual/en/yaf-application.clone.php
	 */
	private function __clone(){}

	/**
	 *
	 * @link http://www.php.net/manual/en/yaf-application.sleep.php
	 */
	private function __sleep(){}

	/**
	 *
	 * @link http://www.php.net/manual/en/yaf-application.wakeup.php
	 */
	private function __wakeup(){}
}

/**
 * <p>Bootstrap is a mechanism used to do some initial config before a Application run.<br/><br/></p>
 * <p>User may define their own Bootstrap class by inheriting <b>Yaf_Bootstrap_Abstract</b><br/><br/></p>
 * <p>Any method declared in Bootstrap class with leading "_init", will be called by Yaf_Application::bootstrap() one by one according to their defined order<br/><br/></p>
 *
 * @link http://www.php.net/manual/en/class.yaf-bootstrap-abstract.php
 */
abstract class Yaf_Bootstrap_Abstract {}

/**
 * <p><b>Yaf_Dispatcher</b> purpose is to initialize the request environment, route the incoming request, and then dispatch any discovered actions; it aggregates any responses and returns them when the process is complete.</p><br/>
 * <p><b>Yaf_Dispatcher</b> also implements the Singleton pattern, meaning only a single instance of it may be available at any given time. This allows it to also act as a registry on which the other objects in the dispatch process may draw.</p>
 *
 * @link http://www.php.net/manual/en/class.yaf-dispatcher.php
 */
final class Yaf_Dispatcher {

	/**
	 * @var Yaf_Dispatcher
	 */
	protected static $_instance;
	/**
	 * @var Yaf_Router
	 */
	protected $_router;
	/**
	 * @var Yaf_View_Interface
	 */
	protected $_view;
	/**
	 * @var Yaf_Request_Abstract
	 */
	protected $_request;
	/**
	 * @var Yaf_Plugin_Abstract
	 */
	protected $_plugins;
	/**
	 * @var bool
	 */
	protected $_auto_render = true;
	/**
	 * @var string
	 */
	protected $_return_response = "";
	/**
	 * @var string
	 */
	protected $_instantly_flush = "";
	/**
	 * @var string
	 */
	protected $_default_module;
	/**
	 * @var string
	 */
	protected $_default_controller;
	/**
	 * @var string
	 */
	protected $_default_action;

	/**
	 * @link http://www.php.net/manual/en/yaf-dispatcher.construct.php
	 */
	private function __construct(){}

	/**
	 * @link http://www.php.net/manual/en/yaf-dispatcher.clone.php
	 */
	private function __clone(){}

	/**
	 * @link http://www.php.net/manual/en/yaf-dispatcher.sleep.php
	 */
	private function __sleep(){}

	/**
	 * @link http://www.php.net/manual/en/yaf-dispatcher.wakeup.php
	 */
	private function __wakeup(){}

	/**
	 * enable view rendering
	 *
	 * @link http://www.php.net/manual/en/yaf-dispatcher.enableview.php
	 *
	 * @return Yaf_Dispatcher
	 */
	public function enableView(){}

	/**
	 * <p>disable view engine, used in some app that user will output by himself</p><br/>
	 * <b>Note:</b>
	 * <p>you can simply return FALSE in a action to prevent the auto-rendering of that action</p>
	 *
	 * @link http://www.php.net/manual/en/yaf-dispatcher.disableview.php
	 *
	 * @return bool
	 */
	public function disableView(){}

	/**
	 * Initialize view and return it
	 *
	 * @link http://www.php.net/manual/en/yaf-dispatcher.initview.php
	 *
	 * @param string $templates_dir
	 * @param array $options
	 * @return Yaf_View_Interface
	 */
	public function initView($templates_dir, array $options = array()){}

	/**
	 * This method provides a solution for that if you want use a custom view engine instead of Yaf_View_Simple
	 *
	 * @link http://www.php.net/manual/en/yaf-dispatcher.setview.php
	 *
	 * @param Yaf_View_Interface $view - A Yaf_View_Interface instance
	 * @return Yaf_Dispatcher
	 */
	public function setView(Yaf_View_Interface $view){}

	/**
	 *
	 * @link http://www.php.net/manual/en/yaf-dispatcher.setrequest.php
	 *
	 * @param Yaf_Request_Abstract $request
	 * @return Yaf_Dispatcher
	 */
	public function setRequest(Yaf_Request_Abstract $request){}

	/**
	 * Retrieve the Yaf_Application instance. same as Yaf_Application::app().
	 *
	 * @link http://www.php.net/manual/en/yaf-dispatcher.getapplication.php
	 * @return Yaf_Application
	 */
	public function getApplication(){}

	/**
	 * @link http://www.php.net/manual/en/yaf-dispatcher.getrouter.php
	 *
	 * @return Yaf_Router
	 */
	public function getRouter(){}

	/**
	 * @link http://www.php.net/manual/en/yaf-dispatcher.getrequest.php
	 *
	 * @return Yaf_Request_Abstract
	 */
	public function getRequest(){}

	/**
	 * <p>Set error handler for Yaf. when application.dispatcher.throwException is off, Yaf will trigger catch-able error while unexpected errors occurred.</p><br/>
	 * <p>Thus, this error handler will be called while the error raise.</p>
	 *
	 * @link http://www.php.net/manual/en/yaf-dispatcher.seterrorhandler.php
	 *
	 * @param callable $callback - a callable callback
	 * @param int $error_types - YAF_ERR_* constants mask
	 *
	 * @return Yaf_Dispatcher
	 */
	public function setErrorHandler(callable $callback, $error_types){}

	/**
	 * Change default module name
	 *
	 * @link http://www.php.net/manual/en/yaf-dispatcher.setdefaultmodule.php
	 *
	 * @param string $module
	 * @return Yaf_Dispatcher
	 */
	public function setDefaultModule($module){}

	/**
	 * Change default controller name
	 *
	 * @link http://www.php.net/manual/en/yaf-dispatcher.setdefaultcontroller.php
	 *
	 * @param string $controller
	 * @return Yaf_Dispatcher
	 */
	public function setDefaultController($controller){}

	/**
	 * Change default action name
	 *
	 * @link http://www.php.net/manual/en/yaf-dispatcher.setdefaultaction.php
	 *
	 * @param string $action
	 * @return Yaf_Dispatcher
	 */
	public function setDefaultAction($action){}

	/**
	 * @link http://www.php.net/manual/en/yaf-dispatcher.returnresponse.php
	 *
	 * @param bool $flag
	 * @return Yaf_Dispatcher
	 */
	public function returnResponse($flag){}

	/**
	 * <p>Yaf_Dispatcher will render automatically after dispatches an incoming request, you can prevent the rendering by calling this method with $flag TRUE</p><br/>
	 * <b>Note:</b>
	 * <p>you can simply return FALSE in a action to prevent the auto-rendering of that action</p>
	 *
	 * @link http://www.php.net/manual/en/yaf-dispatcher.autorender.php
	 *
	 * @param bool $flag - since 2.2.0, if this parameter is not given, then the current state will be set
	 * @return Yaf_Dispatcher
	 */
	public function autoRender($flag = null){}

	/**
	 * Switch on/off the instant flushing
	 *
	 * @link http://www.php.net/manual/en/yaf-dispatcher.flushinstantly.php
	 *
	 * @param bool $flag - since 2.2.0, if this parameter is not given, then the current state will be set
	 * @return Yaf_Dispatcher
	 */
	public function flushInstantly($flag = null){}

	/**
	 * @link http://www.php.net/manual/en/yaf-dispatcher.getinstance.php
	 *
	 * @return Yaf_Dispatcher
	 */
	public static function getInstance(){}

	/**
	 * <p>This method does the heavy work of the Yaf_Dispatcher. It take a request object.</p><br/>
	 * <p>The dispatch process has three distinct events:</p>
	 * <ul>
	 * <li>Routing</li>
	 * <li>Dispatching</li>
	 * <li>Response</li>
	 * </ul>
	 * <p>Routing takes place exactly once, using the values in the request object when dispatch() is called. Dispatching takes place in a loop; a request may either indicate multiple actions to dispatch, or the controller or a plugin may reset the request object to force additional actions to dispatch(see Yaf_Plugin_Abstract. When all is done, the Yaf_Dispatcher returns a response.</p>
	 *
	 * @link http://www.php.net/manual/en/yaf-dispatcher.dispatch.php
	 *
	 * @param Yaf_Request_Abstract $request
	 * @return Yaf_Response_Abstract
	 */
	public function dispatch(Yaf_Request_Abstract $request){}

	/**
	 * <p>Switch on/off exception throwing while unexpected error occurring. When this is on, Yaf will throwing exceptions instead of triggering catchable errors.</p><br/>
	 * <p>You can also use application.dispatcher.throwException to achieve the same purpose.</p>
	 *
	 * @link http://www.php.net/manual/en/yaf-dispatcher.throwexception.php
	 *
	 * @param bool $flag
	 * @return Yaf_Dispatcher
	 */
	public function throwException($flag = null){}

	/**
	 * <p>While the application.dispatcher.throwException is On(you can also calling to <b>Yaf_Dispatcher::throwException(TRUE)</b> to enable it), Yaf will throw Exception whe error occurs instead of trigger error.</p><br/>
	 * <p>then if you enable <b>Yaf_Dispatcher::catchException()</b>(also can enabled by set application.dispatcher.catchException), all uncaught Exceptions will be caught by ErrorController::error if you have defined one.</p>
	 *
	 * @link http://www.php.net/manual/en/yaf-dispatcher.catchexception.php
	 *
	 * @param bool $flag
	 * @return Yaf_Dispatcher
	 */
	public function catchException($flag = null){}

	/**
	 * Register a plugin(see Yaf_Plugin_Abstract). Generally, we register plugins in Bootstrap(see Yaf_Bootstrap_Abstract).
	 *
	 * @link http://www.php.net/manual/en/yaf-dispatcher.registerplugin.php
	 *
	 * @param Yaf_Plugin_Abstract $plugin
	 * @return Yaf_Dispatcher
	 */
	public function registerPlugin(Yaf_Plugin_Abstract $plugin){}
}

class Yaf_Loader {

	/* constants */

	/* properties */
	protected $_local_ns = NULL;
	protected $_library = NULL;
	protected $_global_library = NULL;
	protected static $_instance = NULL;

	/* methods */
	private function __construct(){}

	private function __clone(){}

	private function __sleep(){}

	private function __wakeup(){}

	public function autoload($class_name){}

	public static function getInstance($local_library_path = NULL, $global_library_path = NULL){}

	public function registerLocalNamespace($name_prefix){}

	public function getLocalNamespace(){}

	public function clearLocalNamespace(){}

	public function isLocalName($class_name){}

	public static function import($file){}

	public function setLibraryPath($library_path, $is_global = NULL){}

	public function getLibraryPath($is_global = NULL){}
}

abstract class Yaf_Request_Abstract {

	/* constants */
	const SCHEME_HTTP = 'http';
	const SCHEME_HTTPS = 'https';

	/* properties */
	public $module = NULL;
	public $controller = NULL;
	public $action = NULL;
	public $method = NULL;
	protected $params = NULL;
	protected $language = NULL;
	protected $_exception = NULL;
	protected $_base_uri = "";
	protected $uri = "";
	protected $dispatched = "";
	protected $routed = "";

	/* methods */
	public function isGet(){}

	public function isPost(){}

	public function isPut(){}

	public function isHead(){}

	public function isOptions(){}

	public function isCli(){}

	/**
	 *
	 * @link http://www.php.net/manual/en/yaf-request-abstract.isxmlhttprequest.php
	 *
	 * @return bool false
	 */
	public function isXmlHttpRequest(){}

	public function getServer($name, $default = NULL){}

	public function getEnv($name, $default = NULL){}

	public function setParam($name, $value = NULL){}

	/**
	 *
	 * @link http://www.php.net/manual/en/yaf-request-abstract.getparam.php
	 *
	 * @param string $name
	 * @param string $default
	 * @return string
	 */
	public function getParam($name, $default = NULL){}

	/**
	 *
	 * @link http://www.php.net/manual/en/yaf-request-abstract.getparams.php
	 *
	 * @return string[]
	 */
	public function getParams(){}

	public function getException(){}

	public function getModuleName(){}

	public function getControllerName(){}

	public function getActionName(){}

	public function setModuleName($module){}

	public function setControllerName($controller){}

	public function setActionName($action){}

	public function getMethod(){}

	public function getLanguage(){}

	public function setBaseUri($uir){}

	public function getBaseUri(){}

	public function getRequestUri(){}

	public function setRequestUri($uir){}

	public function isDispatched(){}

	public function setDispatched(){}

	public function isRouted(){}

	public function setRouted($flag = NULL){}
}

/**
 * @link http://www.php.net/manual/en/class.yaf-request-http.php
 */
class Yaf_Request_Http extends Yaf_Request_Abstract {

	/**
	 * Retrieve $_GET variable
	 *
	 * @link http://www.php.net/manual/en/yaf-request-http.getquery.php
	 *
	 * @param string $name [optional] the variable name, if not provided returns all
	 * @param string $default [optional] if this parameter is provide, this will be returned if the variable can not be found
	 *
	 * @return mixed
	 */
	public function getQuery($name = null , $default = null ){}

	/**
	 * Retrieve $_REQUEST variable
	 *
	 * @link http://www.php.net/manual/en/yaf-request-http.getrequest.php
	 *
	 * @param string $name [optional] the variable name, if not provided returns all
	 * @param string $default [optional] if this parameter is provide, this will be returned if the variable can not be found
	 *
	 * @return mixed
	 */
	public function getRequest($name = null , $default = null ){}

	/**
	 * Retrieve $_POST variable
	 *
	 * @link http://www.php.net/manual/en/yaf-request-http.getpost.php
	 *
	 * @param string $name [optional] the variable name, if not provided returns all
	 * @param string $default [optional] if this parameter is provide, this will be returned if the variable can not be found
	 *
	 * @return mixed
	 */
	public function getPost($name = null , $default = null ){}

	/**
	 * Retrieve $_Cookie variable
	 *
	 * @link http://www.php.net/manual/en/yaf-request-http.getcookie.php
	 *
	 * @param string $name [optional] the variable name, if not provided returns all
	 * @param string $default [optional] if this parameter is provide, this will be returned if the variable can not be found
	 *
	 * @return mixed
	 */
	public function getCookie($name = null , $default = null ){}

	/**
	 * @param mixed $name
	 * @param null $default
	 *
	 * @return array
	 */
	public function getFiles($name = null , $default = null){}

	/**
	 * Retrieve variable from client, this method will search the name in $_REQUEST params, if the name is not found, then will search in $_POST, $_GET, $_COOKIE, $_SERVER
	 *
	 * @link http://www.php.net/manual/en/yaf-request-http.get.php
	 *
	 * @param string $name the variable name
	 * @param string $default [optional] if this parameter is provide, this will be returned if the variable can not be found
	 *
	 * @return mixed
	 */
	public function get($name , $default = null){}

	/**
	 * Check the request whether it is a Ajax Request
	 *
	 * <br/>
	 * <b>Note:</b>
	 * <p>
	 * This method depends on the request header: HTTP_X_REQUESTED_WITH, some Javascript library doesn't set this header while doing Ajax request
	 * </p>
	 * @link http://www.php.net/manual/en/yaf-request-http.isxmlhttprequest.php
	 *
	 * @return bool
	 */
	public function isXmlHttpRequest(){}

	/**
	 * @link http://www.php.net/manual/en/yaf-request-http.construct.php
	 * @todo: document
	 */
	public function __construct(){}

	/**
	 * @link http://www.php.net/manual/en/yaf-request-http.clone.php
	 */
	private function __clone(){}
}

/**
 * <b>Yaf_Request_Simple</b> is particularly used for test purpose. ie. simulate a spacial request under CLI mode.
 * @link http://www.php.net/manual/en/class.yaf-request-simple.php
 */
class Yaf_Request_Simple extends Yaf_Request_Abstract {

	/**
	 * Retrieve $_GET variable
	 *
	 * @link http://www.php.net/manual/en/yaf-request-simple.getquery.php
	 *
	 * @param string $name [optional] the variable name, if not provided returns all
	 * @param string $default [optional] if this parameter is provide, this will be returned if the variable can not be found
	 *
	 * @return mixed
	 */
	public function getQuery($name = null , $default = null ){}

	/**
	 * Retrieve $_REQUEST variable
	 *
	 * @link http://www.php.net/manual/en/yaf-request-simple.getrequest.php
	 *
	 * @param string $name [optional] the variable name, if not provided returns all
	 * @param string $default [optional] if this parameter is provide, this will be returned if the variable can not be found
	 *
	 * @return mixed
	 */
	public function getRequest($name = null , $default = null ){}

	/**
	 * Retrieve $_POST variable
	 *
	 * @link http://www.php.net/manual/en/yaf-request-simple.getpost.php
	 *
	 * @param string $name [optional] the variable name, if not provided returns all
	 * @param string $default [optional] if this parameter is provide, this will be returned if the variable can not be found
	 *
	 * @return mixed
	 */
	public function getPost($name = null , $default = null ){}

	/**
	 * Retrieve $_Cookie variable
	 *
	 * @link http://www.php.net/manual/en/yaf-request-simple.getcookie.php
	 *
	 * @param string $name [optional] the variable name, if not provided returns all
	 * @param string $default [optional] if this parameter is provide, this will be returned if the variable can not be found
	 *
	 * @return mixed
	 */
	public function getCookie($name = null , $default = null ){}

	/**
	 * @param mixed $name
	 * @param null $default
	 *
	 * @return array
	 */
	public function getFiles($name = null , $default = null){}

	/**
	 * Retrieve variable from client, this method will search the name in $_REQUEST params, if the name is not found, then will search in $_POST, $_GET, $_COOKIE, $_SERVER
	 *
	 * @link http://www.php.net/manual/en/yaf-request-simple.get.php
	 *
	 * @param string $name the variable name
	 * @param string $default [optional] if this parameter is provide, this will be returned if the variable can not be found
	 *
	 * @return mixed
	 */
	public function get($name , $default = null){}

	/**
	 * Check the request whether it is a Ajax Request
	 *
	 * <br/>
	 * <b>Note:</b>
	 * <p>
	 * This method depends on the request header: HTTP_X_REQUESTED_WITH, some Javascript library doesn't set this header while doing Ajax request
	 * </p>
	 * @link http://www.php.net/manual/en/yaf-request-simple.isxmlhttprequest.php
	 *
	 * @return bool
	 */
	public function isXmlHttpRequest(){}

	/**
	 * @link http://www.php.net/manual/en/yaf-request-simple.construct.php
	 * @todo: document
	 */
	public function __construct(){}

	/**
	 * @link http://www.php.net/manual/en/yaf-request-simple.clone.php
	 */
	private function __clone(){}
}

abstract class Yaf_Response_Abstract {

	/* constants */

	/* properties */
	protected $_header = NULL;
	protected $_body = NULL;
	protected $_sendheader = "";

	/* methods */
	public function __construct(){}

	public function __destruct(){}

	private function __clone(){}

	private function __toString(){}

	/**
	 * @return bool
	 */
	public function setBody(){}

	public function appendBody(){}

	public function prependBody(){}

	public function clearBody(){}

	public function getBody(){}

	public function setHeader(){}

	protected function setAllHeaders(){}

	public function getHeader(){}

	public function clearHeaders(){}

	public function setRedirect(){}

	public function response(){}
}

class Yaf_Response_Http extends Yaf_Response_Abstract {

	/* constants */

	/* properties */
	protected $_header = NULL;
	protected $_body = NULL;
	protected $_sendheader = "1";
	protected $_response_code = "200";

	/* methods */
	public function __construct(){}

	public function __destruct(){}

	private function __clone(){}

	private function __toString()
	{
		return '';
	}

	/**
	 * @return bool
	 */
	public function setBody(){}

	public function appendBody(){}

	public function prependBody(){}

	public function clearBody(){}

	public function getBody(){}

	public function setHeader(){}

	protected function setAllHeaders(){}

	public function getHeader(){}

	public function clearHeaders(){}

	public function setRedirect(){}

	public function response(){}
}

class Yaf_Response_Cli extends Yaf_Response_Abstract {

	/* constants */

	/* properties */
	protected $_header = NULL;
	protected $_body = NULL;
	protected $_sendheader = "";

	/* methods */
	public function __construct(){}

	public function __destruct(){}

	private function __clone(){}

	private function __toString()
	{
		return '';
	}

	public function setBody(){}

	public function appendBody(){}

	public function prependBody(){}

	public function clearBody(){}

	public function getBody(){}

	public function setHeader(){}

	protected function setAllHeaders(){}

	public function getHeader(){}

	public function clearHeaders(){}

	public function setRedirect(){}

	public function response(){}
}

abstract class Yaf_Controller_Abstract {

	/* constants */

	/* properties */
	public $actions = NULL;
	protected $_module = NULL;
	protected $_name = NULL;
	protected $_request = NULL;
	protected $_response = NULL;
	protected $_invoke_args = NULL;
	protected $_view = NULL;

	/* methods */
	protected function render($tpl, array $parameters = NULL){}

	protected function display($tpl, array $parameters = NULL){}

	/**
	 * @return Yaf_Request_Abstract
	 */
	public function getRequest(){}
	/**
	 * @return Yaf_Response_Abstract
	 */
	public function getResponse(){}

	public function getModuleName(){}

	public function getView(){}

	public function initView(array $options = NULL){}

	public function setViewpath($view_directory){}

	public function getViewpath(){}

	public function forward($module, $controller = NULL, $action = NULL, array $paramters = NULL){}

	public function redirect($url){}

	public function getInvokeArgs(){}

	public function getInvokeArg($name){}

	final public function __construct(){}

	final private function __clone(){}
}

abstract class Yaf_Action_Abstract extends Yaf_Controller_Abstract {

	/* constants */

	/* properties */
	public $actions = NULL;
	protected $_module = NULL;
	protected $_name = NULL;
	protected $_request = NULL;
	protected $_response = NULL;
	protected $_invoke_args = NULL;
	protected $_view = NULL;
	protected $_controller = NULL;

	/* methods */
	abstract public function execute();

	public function getController(){}

}

/**
 * @link http://www.php.net/manual/en/class.yaf-config-abstract.php
 */
abstract class Yaf_Config_Abstract {

	protected $_config = NULL;
	/**
	 * @var bool
	 */
	protected $_readonly = true;

	/**
	 * @link http://www.php.net/manual/en/yaf-config-abstract.get.php
	 *
	 * @param string $name
	 * @return mixed
	 */
	abstract public function get($name = null);

	/**
	 * @link http://www.php.net/manual/en/yaf-config-abstract.set.php
	 *
	 * @param string $name
	 * @param mixed $value
	 * @return Yaf_Config_Abstract
	 */
	abstract public function set($name, $value);

	/**
	 * @link http://www.php.net/manual/en/yaf-config-abstract.readonly.php
	 *
	 * @return bool
	 */
	abstract public function readonly();

	/**
	 * @link http://www.php.net/manual/en/yaf-config-abstract.toarray.php
	 *
	 * @return array
	 */
	abstract public function toArray();
}

/**
 * <p>Yaf_Config_Ini enables developers to store configuration data in a familiar INI format and read them in the application by using nested object property syntax. The INI format is specialized to provide both the ability to have a hierarchy of configuration data keys and inheritance between configuration data sections. Configuration data hierarchies are supported by separating the keys with the dot or period character ("."). A section may extend or inherit from another section by following the section name with a colon character (":") and the name of the section from which data are to be inherited.</p><br/>
 * <b>Note:</b>
 * <p>Yaf_Config_Ini utilizes the » parse_ini_file() PHP function. Please review this documentation to be aware of its specific behaviors, which propagate to Yaf_Config_Ini, such as how the special values of "TRUE", "FALSE", "yes", "no", and "NULL" are handled.</p>
 * @link http://www.php.net/manual/en/class.yaf-config-ini.php
 */
class Yaf_Config_Ini extends Yaf_Config_Abstract implements Iterator, Traversable, ArrayAccess, Countable {

	/**
	 * @see Yaf_Config_Abstract::get
	 */
	public function __get($name = NULL){}

	/**
	 * @see Yaf_Config_Abstract::set
	 */
	public function __set($name, $value){}

	/**
	 * @see Yaf_Config_Abstract::get
	 */
	public function get($name = null){}

	/**
	 * @see Yaf_Config_Abstract::set
	 */
	public function set($name, $value){}

	/**
	 * @see Yaf_Config_Abstract::toArray
	 */
	public function toArray(){}

	/**
	 * @see Yaf_Config_Abstract::readonly
	 */
	public function readonly(){}

	/**
	 * @link http://www.php.net/manual/en/yaf-config-ini.construct.php
	 *
	 * @param string $config_file - path to an INI configure file
	 * @param string $section - which section in that INI file you want to be parsed
	 */
	public function __construct($config_file, $section = NULL){}

	/**
	 * @link http://www.php.net/manual/en/yaf-config-ini.isset.php
	 * @param string $name
	 */
	public function __isset($name){}

	/**
	 * @see Countable::count
	 */
	public function count(){}

	/**
	 * @see Iterator::rewind
	 */
	public function rewind(){}
	/**
	 * @see Iterator::current
	 */
	public function current(){}
	/**
	 * @see Iterator::next
	 */
	public function next(){}
	/**
	 * @see Iterator::valid
	 */
	public function valid(){}
	/**
	 * @see Iterator::key
	 */
	public function key(){}
	/**
	 * @see ArrayAccess::offsetUnset
	 */
	public function offsetUnset($name){}
	/**
	 * @see ArrayAccess::offsetGet
	 */
	public function offsetGet($name){}
	/**
	 * @see ArrayAccess::offsetExists
	 */
	public function offsetExists($name){}
	/**
	 * @see ArrayAccess::offsetSet
	 */
	public function offsetSet($name, $value){}
}

/**
 * @link http://www.php.net/manual/en/class.yaf-config-simple.php
 */
class Yaf_Config_Simple extends Yaf_Config_Abstract implements Iterator, Traversable, ArrayAccess, Countable {

	/**
	 * @see Yaf_Config_Abstract::get
	 */
	public function __get($name = NULL){}

	/**
	 * @see Yaf_Config_Abstract::set
	 */
	public function __set($name, $value){}

	/**
	 * @see Yaf_Config_Abstract::get
	 */
	public function get($name = null){}

	/**
	 * @see Yaf_Config_Abstract::set
	 */
	public function set($name, $value){}

	/**
	 * @see Yaf_Config_Abstract::toArray
	 */
	public function toArray(){}

	/**
	 * @see Yaf_Config_Abstract::readonly
	 */
	public function readonly(){}

	/**
	 * @link http://www.php.net/manual/en/yaf-config-simple.construct.php
	 *
	 * @param string $config_file - path to an INI configure file
	 * @param string $section - which section in that INI file you want to be parsed
	 */
	public function __construct($config_file, $section = NULL){}

	/**
	 * @link http://www.php.net/manual/en/yaf-config-simple.isset.php
	 * @param string $name
	 */
	public function __isset($name){}

	/**
	 * @see Countable::count
	 */
	public function count(){}

	/**
	 * @see Iterator::rewind
	 */
	public function rewind(){}
	/**
	 * @see Iterator::current
	 */
	public function current(){}
	/**
	 * @see Iterator::next
	 */
	public function next(){}
	/**
	 * @see Iterator::valid
	 */
	public function valid(){}
	/**
	 * @see Iterator::key
	 */
	public function key(){}
	/**
	 * @see ArrayAccess::offsetUnset
	 */
	public function offsetUnset($name){}
	/**
	 * @see ArrayAccess::offsetGet
	 */
	public function offsetGet($name){}
	/**
	 * @see ArrayAccess::offsetExists
	 */
	public function offsetExists($name){}
	/**
	 * @see ArrayAccess::offsetSet
	 */
	public function offsetSet($name, $value){}
}

/**
 * Yaf provides a ability for developers to use custom view engine instead of build-in engine which is Yaf_View_Simple. There is a example to explain how to do this, please see Yaf_Dispatcher::setView()
 *
 * @link http://www.php.net/manual/en/class.yaf-view-interface.php
 */
interface Yaf_View_Interface {

	/**
	 * Assign values to View engine, then the value can access directly by name in template.
	 *
	 * @link http://www.php.net/manual/en/yaf-view-interface.assign.php
	 *
	 * @param string|array $name
	 * @param mixed $value
	 * @return bool
	 */
	function assign($name, $value);

	/**
	 * Render a template and output the result immediately.
	 *
	 * @link http://www.php.net/manual/en/yaf-view-interface.display.php
	 *
	 * @param string $tpl
	 * @param array $tpl_vars
	 * @return bool
	 */
	function display($tpl, array $tpl_vars = null);

	/**
	 * @link http://www.php.net/manual/en/yaf-view-interface.getscriptpath.php
	 *
	 * @return string
	 */
	function getScriptPath();

	/**
	 * Render a template and return the result.
	 *
	 * @link http://www.php.net/manual/en/yaf-view-interface.render.php
	 *
	 * @param string $tpl
	 * @param array $tpl_vars
	 * @return string
	 */
	function render($tpl, array $tpl_vars = null);

	/**
	 * Set the templates base directory, this is usually called by Yaf_Dispatcher
	 *
	 * @link http://www.php.net/manual/en/yaf-view-interface.setscriptpath.php
	 *
	 * @param string $template_dir - An absolute path to the template directory, by default, Yaf_Dispatcher use application.directory . "/views" as this parameter.
	 */
	function setScriptPath($template_dir);
}

/**
 * <b>Yaf_View_Simple</b> is the built-in template engine in Yaf, it is a simple but fast template engine, and only support PHP script template.
 * @link http://www.php.net/manual/en/class.yaf-view-simple.php
 */
class Yaf_View_Simple implements Yaf_View_Interface {

	/**
	 * @var string
	 */
	protected $_tpl_dir;
	/**
	 * @var array
	 */
	protected $_tpl_vars;
	/**
	 * @var array
	 */
	protected $_options;

	/**
	 * @link http://www.php.net/manual/en/yaf-view-simple.construct.php
	 *
	 * @param string $template_dir - The base directory of the templates, by default, it is APPLICATOIN . "/views" for Yaf.
	 * @param array $options - <p>
	 * Options for the engine, as of Yaf 2.1.13, you can use short tag
	 * "<?=$var?>" in your template(regardless of "short_open_tag"),
	 * so comes a option named "short_tag",  you can switch this off
	 * to prevent use short_tag in template.
	 */
	final public function __construct($template_dir, array $options = NULL){}

	/**
	 * @link http://www.php.net/manual/en/yaf-view-simple.isset.php
	 *
	 * @param string $name
	 */
	public function __isset($name){}

	/**
	 * assign variable to view engine
	 *
	 * @link http://www.php.net/manual/en/yaf-view-simple.assign.php
	 *
	 * @param string|array $name - A string or an array.<br/>if is string, then the next argument $value is required.
	 * @param mixed $value - mixed value
	 * @return bool
	 */
	public function assign($name, $value = NULL){}

	public function render($tpl,array $tpl_vars = NULL){}

	//todo: change to eval
	public function _eval($tpl_str, $vars = NULL){}

	public function display($tpl, array $tpl_vars = NULL){}

	public function assignRef($name, &$value){}

	public function clear($name = NULL){}

	public function setScriptPath($template_dir){}

	public function getScriptPath(){}

	public function __get($name = NULL){}

	public function __set($name, $value = NULL){}
}

/**
 * <b>Yaf_Route_Interface</b> used for developer defined their custom route.
 *
 * @link http://www.php.net/manual/en/class.yaf-route-interface.php
 */
interface Yaf_Route_Interface {

	/**
	 * <p><b>Yaf_Route_Interface::route()</b> is the only method that a custom route should implement.</p><br/>
	 * <p>if this method return TRUE, then the route process will be end. otherwise, Yaf_Router will call next route in the route stack to route request.</p><br/>
	 * <p>This method would set the route result to the parameter request, by calling Yaf_Request_Abstract::setControllerName(), Yaf_Request_Abstract::setActionName() and Yaf_Request_Abstract::setModuleName().</p><br/>
	 * <p>This method should also call Yaf_Request_Abstract::setRouted() to make the request routed at last.</p>
	 *
	 * @link http://www.php.net/manual/en/yaf-route-interface.route.php
	 *
	 * @param Yaf_Request_Abstract $request
	 * @return bool
	 */
	function route(Yaf_Request_Abstract $request);
}

class Yaf_Router {

	/* constants */

	/* properties */
	protected $_routes = NULL;
	protected $_current = NULL;

	/* methods */
	public function __construct(){}

	public function addRoute(){}

	public function addConfig(){}

	public function route(){}

	public function getRoute(){}

	public function getRoutes(){}

	public function getCurrentRoute(){}
}

class Yaf_Route_Static implements Yaf_Route_Interface {

	/* constants */

	/* properties */

	/* methods */
	public function match($uri){}

	public function route(Yaf_Request_Abstract $request){}

	public function __construct(){}

	public function addRoute(){}

	public function addConfig(){}

	public function getRoute(){}

	public function getRoutes(){}

	public function getCurrentRoute(){}
}

final class Yaf_Route_Simple implements Yaf_Route {

	/* constants */

	/* properties */
	protected $controller = NULL;
	protected $module = NULL;
	protected $action = NULL;

	/* methods */
	public function __construct($module_name, $controller_name, $action_name){}

	public function route(Yaf_Request_Abstract $request){}
}

final class Yaf_Route_Supervar implements Yaf_Route_Interface {

	/* constants */

	/* properties */
	protected $_var_name = NULL;

	/* methods */
	public function __construct($supervar_name){}

	public function route(Yaf_Request_Abstract $request){}
}

final class Yaf_Route_Rewrite extends Yaf_Router implements Yaf_Route_Interface {

	/* constants */

	/* properties */
	protected $_route = NULL;
	protected $_default = NULL;
	protected $_verify = NULL;

	/* methods */
	public function __construct($match, array $route, array $verify = NULL){}

	public function route(Yaf_Request_Abstract $request){}
}

final class Yaf_Route_Regex extends Yaf_Router implements Yaf_Route_Interface {

	/* constants */

	/* properties */
	protected $_route = NULL;
	protected $_default = NULL;
	protected $_maps = NULL;
	protected $_verify = NULL;

	/* methods */
	public function __construct($match, array $route, array $map = NULL, array $verify = NULL){}

	public function route(Yaf_Request_Abstract $request){}
}

final class Yaf_Route_Map implements Yaf_Route_Interface {

	/* constants */

	/* properties */
	protected $_ctl_router = "";
	protected $_delimeter = NULL;

	/* methods */
	public function __construct($controller_prefer = NULL, $delimiter = NULL){}

	public function route(Yaf_Request_Abstract $request){}
}

abstract class Yaf_Plugin_Abstract {

	/* constants */

	/* properties */

	/* methods */
	public function routerStartup(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response){}

	public function routerShutdown(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response){}

	public function dispatchLoopStartup(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response){}

	public function dispatchLoopShutdown(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response){}

	public function preDispatch(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response){}

	public function postDispatch(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response){}

	public function preResponse(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response){}
}

final class Yaf_Registry {

	/* constants */

	/* properties */
	protected static $_instance = NULL;
	protected $_entries = NULL;

	/* methods */
	private function __construct(){}

	private function __clone(){}

	public static function get($name){}

	public static function has($name){}

	public static function set($name, $value){}

	public static function del($name){}
}

final class Yaf_Session implements Iterator, Traversable, ArrayAccess, Countable {

	/* constants */

	/* properties */
	protected static  $_instance = NULL;
	protected $_session = NULL;
	protected $_started = "";

	/* methods */
	private function __construct(){}

	private function __clone(){}

	private function __sleep(){}

	private function __wakeup(){}

	public static function getInstance(){}

	public function start(){}

	public function get($name){}

	public function has($name){}

	public function set($name, $value){}

	public function del($name){}

	public function count(){}

	public function rewind(){}

	public function next(){}

	public function current(){}

	public function key(){}

	public function valid(){}

	public function offsetGet($name){}

	public function offsetSet($name, $value){}

	public function offsetExists($name){}

	public function offsetUnset($name){}

	public function __get($name){}

	public function __isset($name){}

	public function __set($name, $value){}

	public function __unset($name){}
}

class Yaf_Exception extends Exception {}
class Yaf_Exception_StartupError extends Yaf_Exception {}
class Yaf_Exception_RouterFailed extends Yaf_Exception {}
class Yaf_Exception_DispatchFailed extends Yaf_Exception {}
class Yaf_Exception_LoadFailed extends Yaf_Exception {}
class Yaf_Exception_LoadFailed_Module extends Yaf_Exception_LoadFailed {}
class Yaf_Exception_LoadFailed_Controller extends Yaf_Exception_LoadFailed {}
class Yaf_Exception_LoadFailed_Action extends Yaf_Exception_LoadFailed {}
class Yaf_Exception_LoadFailed_View extends Yaf_Exception_LoadFailed {}
class Yaf_Exception_TypeError extends Yaf_Exception {}