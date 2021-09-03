<?php
$url = 'http://task.jegotrip.com.cn:8080/app/sign';

$headers = [
    "Host: task.jegotrip.com.cn:8080",
    "Content-Type: application/json;charset=utf-8",
    "Origin: http://task.jegotrip.com.cn:8080",
    "Accept-Encoding: gzip, deflate",
    "Connection: keep-alive",
    "Accept: application/json, text/plain, */*",
    "Referer: http://task.jegotrip.com.cn:8080/task/index.html",
    "Content-Length: 89",
    "Accept-Language: zh-CN,zh-Hans;q=0.9"
    ];

$data = json_encode([
    'userid' => '',
    'taskId' => ''
    ]);
    
    
$curl = curl_init();  //初始化
curl_setopt($curl,CURLOPT_URL,$url);  //设置url
curl_setopt($curl,CURLOPT_HTTPAUTH,CURLAUTH_BASIC);  //设置http验证方法
curl_setopt($curl,CURLOPT_HEADER,0);  //设置头信息
curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl,CURLOPT_USERAGENT, "Mozilla/5.0 (iPhone; CPU iPhone OS 15_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15E148 source/jegotrip");
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);  //设置curl_exec获取的信息的返回方式
curl_setopt($curl,CURLOPT_POST,1);  //设置发送方式为post请求
curl_setopt($curl,CURLOPT_POSTFIELDS,$data);  //设置post的数据

$result = curl_exec($curl);
curl_close($curl);

$myfile = fopen("log.txt", "a");
$txt = date('Y-m-d H:m:s',time())."\n".$result."\n\n";
fwrite($myfile, $txt);
fclose($myfile);

// $result = json_decode($result,true);
echo($result);





