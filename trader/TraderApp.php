<?php require 'lib/oauth/oauth.php'; require 'lib/config.php';
  
    class TraderApp {
    public $oauth;
    public $consumer_key;
    public $consumer_secret;
    public $access_token;
    public $access_secret;
    public $config;
    public $userData;
    /**
     * Authentication state 
     * 
     * Values: 
     *  - 0: not authed 
     *  - 1: Request token obtained 
     *  - 2: Access token obtained (authed) 
     * 
     * @var int The current state of authentication  
     */
    protected $state;

    public function __construct($config){
      $this->config = $config;

      //start a session if one does not exist
      if(!session_id()) {
          session_start();
      }
      
      // determine the authentication status
      // default to 0
      $this->state = 0;
      // 2 (authenticated) if the cookies are set
      if(isset($_COOKIE['access_token'], $_COOKIE['access_token_secret'])) {
          $this->state = 2;
      }
      // otherwise use value stored in session
      elseif(isset($_SESSION['authstate'])) {
          $this->state = (int)$_SESSION['authstate'];
      }
      
      // if we are in the process of authentication we continue
      if($this->state == 1) {
          $this->auth();
      }
      // verify authentication, clearing cookies if it fails
      elseif($this->state == 2 && !$this->auth()) {
          $this->endSession();
      }
      $this->init();
    }

    public function init(){
      echo "init firing";
      try {
        // Setup an OAuth consumer
        $this->oauth = new tmhOAuth($this->config->secret);

        $this->getRequestToken();
        // Manually update the access token/secret.  Typically this would be done through an OAuth callback when 
        // authenticating other users.
        //$oauth->setToken($access_token,$access_secret);

        // Make a request to the API endpoint
        //$oauth->fetch("https://api.tradeking.com/v1/member/profile.json");

        // Handle the response
        //$response_info = $oauth->getLastResponseInfo();
        // header("Content-Type: {$response_info["content_type"]}");
        //echo $oauth->getLastResponse();

      } catch(OAuthException $E) {
        // Display any errors
        echo "Exception caught!\n";
        echo "Response: ". $E->lastResponse . "\n";
      }
    }

    /** 
 * Obtain a request token from Twitter 
 * 
 * @return bool False if request failed 
 */  
private function getRequestToken() {  
    // send request for a request token  
    $this->oauth->request("POST", $this->oauth->url("oauth/request_token", ""), 
      array(
        'oauth_callback' => $this->oauth->php_self()
      )
    );
    echo "response is: ".$this->oauth->response["code"].'<br>';
    if($this->oauth->response["code"] == 200) {  
        // get and store the request token  
        $response = $this->oauthuth->extract_params($this->oauth->response["response"]);  
        $_SESSION["authtoken"] = $response["oauth_token"];  
        $_SESSION["authsecret"] = $response["oauth_token_secret"];  
        // state is now 1  
        $_SESSION["authstate"] = 1;  
        // redirect the user to Twitter to authorize  
        $url = $this->oauth->url("oauth/authorize", "") . '?oauth_token=' . $response["oauth_token"];  
        header("Location: " . $url);  
        exit;  
    }  
    return false;  
  }
} 

$trader = new TraderApp($config);
?>