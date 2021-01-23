<?php
/**
 * Emma API Connector plugin for Craft CMS 3.x
 *
 * Securely connect a signup form to the Emma API
 *
 * @link      https://madebyraygun.com
 * @copyright Copyright (c) 2018 Raygun Design, LLC
 */

namespace madebyraygun\emmaapiconnector\controllers;
use madebyraygun\emmaapiconnector\EmmaApiConnector as Plugin;

use Craft;
use craft\web\Controller;

/**
 * Default Controller
 *
 * Generally speaking, controllers are the middlemen between the front end of
 * the CP/website and your plugin’s services. They contain action methods which
 * handle individual tasks.
 *
 * A common pattern used throughout Craft involves a controller action gathering
 * post data, saving it on a model, passing the model off to a service, and then
 * responding to the request appropriately depending on the service method’s response.
 *
 * Action methods begin with the prefix “action”, followed by a description of what
 * the method does (for example, actionSaveIngredient()).
 *
 * https://craftcms.com/docs/plugins/controllers
 *
 * @author    Raygun Design, LLC
 * @package   EmmaApiConnector
 * @since     1
 */
class DefaultController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['subscribe'];

    // Public Methods
    // =========================================================================

    /**
     * Handle a request going to our plugin's actionDoSomething URL,
     * e.g.: actions/emma-api-connector/default/subscribe
     *
     * @return mixed
     */
    public function actionSubscribe()
    {
        $this->requirePostRequest();
        $request = Craft::$app->getRequest();
        $email = $request->getParam('email');
        $result = Plugin::$plugin->emmaApiConnectorService->subscribe($email);
        return $this->asJson($result);
    }
}
