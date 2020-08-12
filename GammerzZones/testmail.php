<?php


$email='deysourav738@yahoo.com';
$subject="Hello World";
$body='A Test Email.';
$name='GmaerzZones';

$headers=array(
	"Authorization: Bearer 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", 
	'Content-Type: application/json'
);
$data=array(
"personalizations"=>array(
		array(
			'to'=>array(
				array(
					'email'=>$email,
					'name'=>$name
				)
			)
		)
	),
		"from"=> array(
			'email'=>'no-reply@gamerzzones.com'
		),
		"subject" =>$subject,
		'content'=>array(
			array(
				'type'=>"text/html",
				"value"=>$body
			)
		)
);

$ch=curl_init();
curl_setopt($ch, CURLOPT_URL,'https://api.sendgrid.com/v3/mail/send');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response=curl_exec($ch);
curl_close($ch);
echo $response;
?>