<?php


$url ="http://api.wolframalpha.com/v2/query?input=pi&appid=UE3UPV-KJXLEWRKLU&format=plaintext&scantimeout=3";
$xml = simplexml_load_file($url);
var_dump($xml);
//$xml = new SimpleXMLElement('http://api.wolframalpha.com/v2/query?input=pi&appid=UE3UPV-KJXLEWRKLU');
//var_dump($xml->pod->subpod->img);
//http://api.wolframalpha.com/v2/query?input=pi&appid=UE3UPV-KJXLEWRKLU

/*include '../wa_wrapper/WolframAlphaEngine.php';
$engine = new WolframAlphaEngine( 'YOUR_APP_KEY_HERE' );

$resp = $engine->getResults('pi');

$pod = $resp->getPods();

$pod = $pod[1];

foreach($pod->getSubpods() as $subpod){
  if($subpod->plaintext){
    $plaintext = $subpod->plaintext;
    break;
  }
}

$result = substr($plaintext, 0,strlen($plaintext)-3);

echo $result;
?>*/
