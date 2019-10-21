<?php 
    session_start();
    require_once __DIR__ . '/php-graph-sdk/src/Facebook/autoload.php';
  
    $fb = new \Facebook\Facebook([
      'app_id' => '525738334843199',
      'app_secret' => '3fbe357bbf61d880b5d4bd19f458a964',
      'default_graph_version' => 'v2.10',
      //'default_access_token' => '{access-token}', // optional
    ]);
    
    
    $helper = $fb->getRedirectLoginHelper();
    
    $permissions = ['email']; // Optional permissions
    $loginUrl = $helper->getLoginUrl('https://lawsyst.com', $permissions);
   
  // header('Location: '.htmlspecialchars($loginUrl)); 
      header('Location: ' . filter_var($loginUrl, FILTER_SANITIZE_URL));
   // echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
    echo htmlspecialchars($loginUrl);
