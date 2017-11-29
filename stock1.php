<?php
//header("Content-type: application/json");
//$quoteUrl='http://dev.markitondemand.com/MODApis/Api/v2/Quote/json?symbol='.$_GET["term"];
if(isset($_GET["q"])){
    $lookupUrl='http://dev.markitondemand.com/MODApis/Api/v2/Lookup/json?input='.$_GET["q"];
$l = file_get_contents($lookupUrl);
echo $l;
}

if(isset($_GET["qq"])){    
$quoteUrl=  'http://dev.markitondemand.com/MODApis/Api/v2/Quote/json?symbol='.$_GET["qq"];  
$l2 = file_get_contents($quoteUrl);
echo $l2;
}

//highchart call
if(isset($_GET["dataObj"])){
    $hchart = 'http://dev.markitondemand.com/MODApis/Api/v2/InteractiveChart/json?parameters='.$_GET["dataObj"];
$l3=file_get_contents($hchart);
echo $l3;
}

//Bing News call
if(isset($_GET["newsFeed"])){
   // $newsUrl='http://api.datamarket.azure.com/Bing/Search/v1/News?Query=%27'.$_GET["newsFeed"].'%27&$format=json';
                    $accountKey = '8kZ5M4z7Rl7FLZ0QICJ4CmizSbWIQGugu0EH0EGVU8s';
            
                   $ServiceRootURL =  "http://api.datamarket.azure.com/Bing/Search/";
                    
                    $WebSearchURL = $ServiceRootURL . 'v1/News?Query=';
                    
                    $context = stream_context_create(array(
                        'http' => array(
                            'request_fulluri' => true,
                            'header'  => "Authorization: Basic " . base64_encode($accountKey . ":" . $accountKey)
                        )
                    ));

                    $request = $WebSearchURL . urlencode( "'" .  $_GET["newsFeed"] . "'") ."&\$format=json";
 
 
                    
                    //echo($request);
                    
                    $l4 = file_get_contents($request, 0, $context);
                

  

    echo $l4;

}
//echo file_get_contents("http://ajax.googleapis.com/ajax/services/search/news?v=1.0&q=AAPL&userip=cs-server.usc.edu");


?>