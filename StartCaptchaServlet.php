<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://uems.sysu.edu.cn/jwxt/StartCaptchaServlet?ts=".$_POST['ts']);
// 获取头部信息
curl_setopt($ch, CURLOPT_HEADER, 0);
// 返回原生的（Raw）输出
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 执行并获取返回结果
$content = curl_exec($ch);
// 关闭CURL
curl_close($ch);
echo $content;
?>