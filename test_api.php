<?php
$ch = curl_init('https://api.github.com/search/repositories?q=world+port+index');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, 'PHP Script');
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response, true);
foreach ($data['items'] ?? [] as $item) {
    echo $item['full_name'] . "\n";
}
