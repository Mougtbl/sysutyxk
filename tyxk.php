<?php
if($_POST['username2']==""){
echo "请输入用户名";
}else{
//JSS
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://uems.sysu.edu.cn/jwxt/");
// 获取头部信息
curl_setopt($ch, CURLOPT_HEADER, 1);
// 返回原生的（Raw）输出
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 关闭CURL
// 执行并获取返回结果
$content = curl_exec($ch);
curl_close($ch);
// 解析HTTP数据流
preg_match_all('/^Set-Cookie: (.*?);/m', $content, $matches);
// 后面用CURL提交的时候可以直接使用
// curl_setopt($ch, CURLOPT_COOKIE, $cookie);
$i=0;
foreach($matches[1] as $m){
    $i=$i+1;
    if($i==1){
        $cookie=$m;
    }else{
        $cookie=$cookie.";".$m;
    }
}
  //用户登录
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://uems.sysu.edu.cn/jwxt/j_unieap_security_check.do");
// 获取头部信息
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_COOKIE, $cookie);
// 返回原生的（Raw）输出
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$post_data = "j_username=".$_POST['username2']."&j_password=".$_POST['password2']."&j_challenge=".$_POST['geetest_challenge']."&j_validate=".$_POST['geetest_validate']."&j_seccode=".$_POST['geetest_seccode']."&geetest_challenge=".$_POST['geetest_challenge']."&geetest_validate=".$_POST['geetest_validate']."&geetest_seccode=".$_POST['geetest_seccode']."&rno=0.28079788622829716";
curl_setopt($ch, CURLOPT_POST, 1);
// post的变量
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

curl_setopt($ch, CURLOPT_REFERER, "http://uems.sysu.edu.cn/jwxt/");
// 关闭CURL
// 执行并获取返回结果
$content = curl_exec($ch);
curl_close($ch);
// 解析HTTP数据流
echo $content;
// 后面用CURL提交的时候可以直接使用
// curl_setopt($ch, CURLOPT_COOKIE, $cookie);
/*
$finish=true;
  //完成任务1
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://zhongshan.safetree.com.cn/Education/winter2016.asmx/FinishWatchVideo");
//  curl_setopt($ch, CURLOPT_COOKIESESSION, false);
  curl_setopt($ch, CURLOPT_COOKIE, $cookie);
//  curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);
  curl_setopt($ch, CURLOPT_POST, False);
  $r=curl_exec($ch);
  curl_close($ch);
if(!stripos((string)$r,"True")){ 
    $finish=false;
} 
*/

}
?>