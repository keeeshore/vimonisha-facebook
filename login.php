<?php

$fb = new Facebook\Facebook([
  'app_id' => '486715638158930',
  'app_secret' => '58073156dd651366a01be11e5bfdcf61',
  'default_graph_version' => 'v2.4',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';

?>