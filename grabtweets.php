<?

//We use already made Twitter OAuth library
//https://github.com/mynetx/codebird-php
require_once ('https://lovenlaughs.github.io/api_mashup/codebird.php');

//Twitter OAuth Settings, enter your settings here:
$CONSUMER_KEY = 'hIqlMSXFpAqAqrx48TFYIOH8N';
$CONSUMER_SECRET = 'TQcsqnK3geRdGPCGHfxbw3cjvgZ3y34eS5Nvh3kngYymYi9oeA';
$ACCESS_TOKEN = '373683936-u4fSdqeJaMbPeqYHLBZkCcenwJK0B6Bw4QsWKsfX';
$ACCESS_TOKEN_SECRET = 'RcAQrbKQEO3picKz00e6qkZ8aCSCXjcFsJHeDxyplmAjS';

//Get authenticated
Codebird::setConsumerKey($CONSUMER_KEY, $CONSUMER_SECRET);
$cb = Codebird::getInstance();
$cb->setToken($ACCESS_TOKEN, $ACCESS_TOKEN_SECRET);


//retrieve posts
$q = $_POST['q'];
$count = $_POST['count'];
$api = $_POST['api'];

//https://dev.twitter.com/docs/api/1.1/get/statuses/user_timeline
//https://dev.twitter.com/docs/api/1.1/get/search/tweets
$params = array(
	'screen_name' => $q,
	'q' => $q,
	'count' => $count
);

//Make the REST call
$data = (array) $cb->$api($params);

//Output result in JSON, getting it ready for jQuery to process
echo json_encode($data);

?>
