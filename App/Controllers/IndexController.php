<?php
namespace MRDEVELOPER\Controllers;
/**
 * Class IndexController
 *
 * @package MAAlMOSTAQBAL\MA_Controllers
 */

use MRDEVELOPER\Vendor\Language\Lang;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;

class IndexController extends Controller
{

    public function index()
    {
        $this->Data['Name'] = Lang::lang("HOME_PAGE");

        $this->View();
    }


    public function facebook()
    {
        $fb = new Facebook([
            'app_id' => '467216363640012',
            'app_secret' => '4016c3c6a3061899cba3bdad7b6500cd',
            'default_graph_version' => 'v2.9',
            "persistent_data_handler"=>"session"
        ]);

        $helper = $fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch(FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }


        if (isset($accessToken)) {
            // Logged in!
            $_SESSION['facebook_access_token'] = (string)$accessToken;

            $postURL = "http://al-mostaqbal.com/index/facebook";
            echo '<a href="' . $postURL . '">Post Image on Facebook!</a>';
            $response = $fb->get('/me?locale=en_US&fields=name,email,likes', $_SESSION['facebook_access_token']);
            $userNode = $response->getGraphUser();
            pre($userNode);
        }
    }


    public function fb()
    {
        $fb = new Facebook([
            'app_id' => '467216363640012',
            'app_secret' => '4016c3c6a3061899cba3bdad7b6500cd',
            'default_graph_version' => 'v2.9',

            "persistent_data_handler"=>"session"
        ]);
        $helper = $fb->getRedirectLoginHelper();
        $loginUrl = $helper->getLoginUrl('http://localhost:8888/fb-post/php-graph-sdk/login-callback.php');
        echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
    }


}