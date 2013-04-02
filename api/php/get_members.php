<?php
$session = curl_init();
 
//Connection and Params
curl_setopt($session, CURLOPT_URL, 'http://api.micronetonline.com/V1/associations(customerID)/members');
curl_setopt($session, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($session, CURLOPT_HTTPGET, 1);
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json', 'X-ApiKey : apiKey'));
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
 
$response = curl_exec($session);
$json = json_decode($response);
curl_close($session);
?>

<style>
.member-contain {
	display: block;
	border-bottom: 1px dotted #ccc;
	margin-bottom: 10px;
}

.member-logo {
	float: left;
}

.member-name {
	padding: 10px;
}

.clear {
	clear: both;
	float: none;
	height: 0px;
}
</style>

<?php //var_dump($json); ?>

<?php foreach($json as $data): ?>
	<div class="member-contain">
		<div class="member-logo"><img src="<?= $data->LogoUrl; ?>" /></div>
		<div class="member-name"><?= $data->{'Name'}; ?></div>
    	<div class="clear"></div>
    </div>
<?php endforeach; ?>