<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Qbon優惠牆 Xmas聖誕好康日曆</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="address=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<!-- iOS 介面調整 -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta charset="ISO-8859-1">

<!-- SEO -->
<meta content="12月party月，Qbon優惠牆給你滿滿的優惠，每天早上10點，鎖定Qbon優惠牆聖誕好康日曆，讓你幸福好康無上限！" name="description" />
<meta content="Qbon優惠牆、Qbon、聖誕好康日曆、Hiiir、聖誕節、聖誕、Merry Christmas 、Xmas、聖誕樹、美麗華、優惠 、好康、遠傳、Sales、12月、揪團、團購、折扣、禮物、perth's key、品木宣言、17life、gomaji、foodpanda" name="keywords" />
<meta content="Qbon優惠牆 Xmas聖誕好康日曆" property="og:title">
<meta content="12月party月，Qbon優惠牆給你滿滿的優惠，每天早上10點，鎖定Qbon優惠牆聖誕好康日曆，讓你幸福好康無上限！" property="og:description">
<link rel="canonical" href="<?php echo base_url('welcome');?>">
<meta content="<?php echo base_url('welcome');?>" property="og:url" />
<meta property="og:image" content="<?php echo base_url().'resource/images/indeximage_p.jpg'?>">
<meta property="og:image:type" content="image/jpeg">
<meta property="og:image:width" content="640">
<meta property="og:image:height" content="460">
<link href="<?php echo base_url().'favicon.ico'?>" rel="shortcut icon" type="image/ico" />

<?php
//偵測瀏覽器  
$agent = $_SERVER['HTTP_USER_AGENT'];
if((strpos($agent,"Safari")) || (strpos($agent,"Opera")) || (strpos($agent,"Chrome")))
    echo '<link href="' . $WEB_CSS . 'desktop-main.css" rel="stylesheet" type="text/css" />';
else 
    echo '<link href="' . $WEB_CSS . 'desktop-main-ff.css" rel="stylesheet" type="text/css" />';
?>

<!--<link rel="stylesheet" href="css/pgwslider.min.css">-->

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50338452-3', 'auto');
  ga('send', 'pageview');
  ga('create', 'UA-52741030-2', 'auto', {'name': 'XmasTracker'}); 
  ga('XmasTracker.send', 'pageview');

</script>
</head>

<body>
    <div id="fb-root"></div>
    
    <div id="TOP">
        <div id="TOPC">
        <a href="https://www.facebook.com/Qbon.inside" target="_blank">
        <img src="<?php echo $WEB_IMG?>titleimage.jpg" width="100%" boder="0"/>
        </a>
    </div>
    </div>
    
    <!-- 日曆 -->
    <div id="DAY">
        <div id="DAYC">
            <div id="Dtitle"></div>
            <div id="DayM">
                <ul>
                <li class="AA">SUN</li>
                <li class="BB">MON</li>
                <li class="BB">TUE</li>
                <li class="BB">WED</li>
                <li class="BB">THU</li>
                <li class="BB">FRI</li>
                <li class="AA">SAT</li>
                </ul>
            </div>
            
            <div id="Dbox">
                <ul class="pgwSlider">
               <!-- 12月1日-6日 -->
                    <li class="DCboxG">
                        <div class="igbox">
                        <img src="<?php echo $WEB_IMG?>icon01.png" width="100%" />
                        </div>
                    </li>
                    <?php 
                    if($DailySchedules){
                        $today = date("Y-m-d");
                        $now_hour = date("H");
                        foreach ($DailySchedules as $date => $value) {
                            $title = $pic = $link = '';
                            $show_date = date('n月d日',strtotime($date));
                            $show_schedule = 'n';

                            // if( ($date < $today) || ( ($date == $today) && ($now_hour >= '10') ) ){
                            if( ($date < $today) || ( ($date == $today) ) ){
                                $show_schedule = 'y';
                            }

                            // 今天以前才出現當日排程
                            if($show_schedule == 'y' && $value){
                                $title = isset($value['title'])?$value['title']:'';
                                $pic = isset($value['pic'])?'<img src="'.$value['pic'].'">':'';
                                $link = isset($value['link'])?$value['link']:'';
                    ?>
                                <li>
                                    <a href="<?php echo $link;?>" target="_blank">
                                        <div class="box">
                                        <?php echo $pic;?>
                                        </div>
                                    <span><?php echo $show_date;?></br><?php echo $title;?></span>
                                    </a>
                                </li>
                    <?php 
                            }else{
                                $rand_imgno = rand(5,8);
                    ?>
                                <li class="DCboxG">
                                    <div class="igboxc">
                                    <img src="<?php echo $WEB_IMG;?>icon0<?php echo $rand_imgno;?>.png" width="100%" />
                                    </div>
                                    
                                     <p class="daysss"><?php echo $show_date;?></p>
                                </li>
                    <?php
                            }//判斷是否有schedule end
                        }//for end
                    }
                    ?>
                    <li class="DCboxG">
                        <div class="igbox">
                        <img src="<?php echo $WEB_IMG?>icon02.png" width="100%" />
                        </div>
                    </li>
                    
                    <li class="DCboxG">
                        <div class="igbox">
                        <img src="<?php echo $WEB_IMG?>icon03.png" width="100%" />
                        </div>
                    </li>
                    
                    <li class="DCboxG">
                        <div class="igbox">
                        <img src="<?php echo $WEB_IMG?>icon04.png" width="100%" />
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <!-- FB活動 -->
    <div id="EVENT">
        <div id="EVENTC">
            <a class="btn-orange" href="https://www.facebook.com/events/674664762644246/?ref=22" target="_blank">立即上傳</a>
        </div>
    </div>
    
    <!-- Qbon介紹 -->
    <div id="STORE">
        <div id="STOREC">
            <div id="sboxbg">
                <ul>
                <li class="google"><a href="https://play.google.com/store/apps/details?id=com.hiiir.qbon" target="_blank"></a></li>
                <li class="apple"><a href="https://itunes.apple.com/tw/app/qbon-you-hui-qiang/id737568220?mt=8" target="_blank"></a></li>
                </ul>
            </div>
            
            <div id="sfbbox">
                <p><iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FQbon.inside&amp;width=990&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=800585080003362" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:990px; height:290px;" allowTransparency="true"></iframe></p>
            </div>
        </div>
    </div>
    
    <!-- 表尾 -->
    <div id="FOOTER">
        <div id="FOOTERTOP">
            <div id="logobox">
                <div id="fboxone">
                    <p class="footypetitl">主辦單位</p>
                    <a href="https://www.facebook.com/Qbon.inside"  target="_blank">
                    <img src="<?php echo $WEB_IMG?>icon_flogo.png" width="111" height="33" border="0"/>
                    </a>
                </div>
                
                <div id="fboxtwo">
                    <a href="http://www.hiiir.com/" target="_blank">
                    <img src="<?php echo $WEB_IMG?>icon_hiiir.png" width="63" height="50" border="0"/> 
                    </a>
                </div>
                
                <div id="fboxthree">
                    <p class="footypetitl">協辦單位</p>
                    <a href="http://www.miramar.com.tw/" target="_blank">
                    <img src="<?php echo $WEB_IMG?>icon_miramar.png" width="80" height="42" border="0"/>
                    </a>
                </div>
                
                <div id="fboxfor">
                    <p class="footypetitl">贊助單位</p>
                    <a href="https://www.facebook.com/Originstw1?fref=ts" target="_blank">
                    <img src="<?php echo $WEB_IMG?>icon_origin.png" width="63" height="50"/>
                    </a> 
                </div>
                
                <div id="fboxfive">
                    <a href="http://www.fecityonline.com/MegaCity/index.do" target="_blank">
                    <img src="<?php echo $WEB_IMG?>icon_big.png" width="143" height="33" border="0"/> 
                    </a>
                </div>
                
                <div id="fboxsix">
                    <a href="http://www.perthskey.com.tw/" target="_blank">
                    <img src="<?php echo $WEB_IMG?>icon_black.png" width="58" height="33" border="0"/> 
                    </a>
                </div>
                
                <div id="fboxse">
                    <a href="https://www.facebook.com/cottondeer?fref=ts" target="_blank">
                    <img src="<?php echo $WEB_IMG?>IMG_8030.JPG" width="118" height="30" border="0"/> 
                    </a>
                </div>
                
                <div id="fboxat">
                    <a href="https://www.facebook.com/Appleface.tw?slog=853970&seq=2131573584&rk=0&fbtype=274" target="_blank">
                    <img src="<?php echo $WEB_IMG?>icon_last.png" width="143" height="33" border="0"/> 
                    </a>
                </div>
                
            </div>
        </div>
        
        <div id="FOOTERDO">
        <p class="footype">時間軸科技股份有限公司版權所有2014 © Copyright Hiiir Inc. All Rights Reserved.</p>
        </div>
    </div>
    
<!-- <script src="js/pgwslider.js"></script><script src="js/pgwslider.min.js"></script> -->
</body>
</html>