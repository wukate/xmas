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

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<link href="<?php echo $WEB_CSS;?>mobile/mobile-main.css" rel="stylesheet" type="text/css" />
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
    <!-- 表頭 -->
    <div id="TOP">
        <div id="TOPC">
        <a href="http://www.qbon.com.tw/" target="_blank">
        <img src="<?php echo $WEB_IMG;?>mobile/indeximage_p.jpg" width="100%" boder="0"/>
        </a>
    </div>
    </div>
    
    <!-- 日曆 -->
    <div id="DAY">
        <?php
        $now_hour = date("H");
        if($TodateSchedules){
            if(($now_hour >= '10')){
                $pic = isset($TodateSchedules['pic'])?'<img src="'.$TodateSchedules['pic'].'" width="100%">':'';
                $title = isset($TodateSchedules['title'])?$TodateSchedules['title']:'';
                $show_date = date('n月d日',strtotime($Todate));    
        ?>
        <div class="DTOPbox">
            <div class="pbox">
            <?php echo $pic;?>
            </div>
            
            <div class="ptype">
            <p class="montype"><?php echo $show_date;?></p>
            <p class="montypecc"><?php echo $title;?></p>
            </div>
        </div>
        <?php 
            }
        }
        ?>
        <div class="container">
            <?php 
            if($MobileDailySchedules){
                foreach ($MobileDailySchedules as $key => $schedule) {
                    switch ($key) {
                        case '0':
                            $title = '12月1日(一)-12月5日(五)';
                            break;
                        case '1':
                            $title = '12月6日(六)-12月10日(三)';
                            break;
                        case '2':
                            $title = '12月11日(四)-12月15日(一)';
                            break;
                        case '3':
                            $title = '12月16日(二)-12月20日(六)';
                            break;
                        case '4':
                            $title = '12月21日(日)-12月25日(四)';
                            break;
                        case '5':
                            $title = '12月26日(五)-12月31日(三)';
                            break;
                    }
            ?>

            <h2 class="acc_trigger">
            <a href="#"><?php echo $title;?></a>
            </h2> 
            <div class="acc_container" style="display: none;"> 
                <?php 
                if($schedule){
                    $today = date("Y-m-d");
                    foreach ($schedule as $schedule_key => $value) { 
                        $title = $pic = $link = '';
                        $show_date = date('n月d日',strtotime($value['date']));
                        $show_schedule='n';


                        if( ($value['date'] < $today) || (  ($value['date'] == $today) && ($now_hour >= '10') ) ){
                            $show_schedule='y';
                        }

                        if($show_schedule == 'y' && $value['title'] && $value['pic'] && $value['link']){
                            $title = isset($value['title'])?$value['title']:'';
                            $pic = isset($value['pic'])?'<img src="'.$value['pic'].'" width="100%" />':'';
                            $link = isset($value['link'])?$value['link']:'';

                            $show_area = '<div class="ptypet"><p class="montypet">' . $show_date . '</p><p class="montypecct">' . $title . '</p></div>';
                        }else{
                            $show_area = '<div class="ALLBlack"><div class="ptypet"><p class="montypetb">' . $show_date . '</p><p class="montypecctb">' . $title . '</p></div></div>';
                        }
                ?>
                    <div class="DTOPboxt">
                        <div class="pboxt">
                        <?php echo $pic;?>
                        </div>
                        <?=$show_area;?>
                    </div>
                <?php 
                    }
                } 
                ?>
            </div>
            <?php 
                }
            }
            ?>             
        </div>   
    </div> 
    
    <!-- FB活動 -->
    <div id="EVENT">
        <div id="EVENTt">
            <div id="Eboxo">
                <a href="www.zeusdesign.com.tw" target="_blank">
                <img src="<?php echo $WEB_IMG;?>mobile/eventbg_p.jpg" width="100%" border="0"/>
                </a>
            </div>
      </div>
    </div>
    
    <!-- Qbon介紹 -->
    <div id="STORE">
        <div id="STOREt">
            <img src="<?php echo $WEB_IMG;?>mobile/stortitle.jpg" width="100%" />
        </div>
    </div>
    
    <div id="STOREE">
        <div id="STOREct">
            <div id="LEFTbox">
                <ul>
                <li class="google"><a href="https://play.google.com/store/apps/details?id=com.hiiir.qbon" target="_blank"></a></li>
                <li class="apple"><a href="https://itunes.apple.com/tw/app/qbon-you-hui-qiang/id737568220?mt=8" target="_blank"></a></li>
                </ul>
          </div>
            
          <div id="RIGHTbox">
            <img src="<?php echo $WEB_IMG;?>mobile/store_p.jpg" width="100%">
            </div>
        </div>
    </div>
    
    <div id="STOREEE">
        <div id="STOREfb">
            <p><iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FQbon.inside&amp;width&amp;height=62&amp;colorscheme=light&amp;show_faces=false&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=800585080003362" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:62px;" allowTransparency="true"></iframe></p>
        </div>
    </div>
    
    <!-- 表尾 -->
    <div id="FOOTER">
        <div id="FOOTERTOP">
            <div id="logobox">
            
                <div id="BIGFBOX">
                <div id="fboxone">
                    <p class="footypetitl">主辦單位</p>
                    <a href="https://www.facebook.com/Qbon.inside"  target="_blank">
                    <img src="<?php echo $WEB_IMG;?>mobile/icon_flogo.png" width="111" height="33" border="0"/>
                    </a>
                </div>
                
                <div id="fboxtwo">
                    <a href="http://www.hiiir.com/" target="_blank">
                    <img src="<?php echo $WEB_IMG;?>mobile/icon_hiiir.png" width="63" height="50" border="0"/> 
                    </a>
                </div>
                
                <div id="fboxthree">
                    <p class="footypetitl">協辦單位</p>
                    <a href="http://www.miramar.com.tw/" target="_blank">
                    <img src="<?php echo $WEB_IMG;?>mobile/icon_miramar.png" width="80" height="42" border="0"/>
                    </a>
                </div>
                </div>
                
                <div id="BIGFBOXT">
                <div id="fboxfor">
                    <p class="footypetitl">贊助單位</p>
                    <a href="https://www.facebook.com/Originstw1?fref=ts" target="_blank">
                    <img src="<?php echo $WEB_IMG;?>mobile/icon_origin.png" width="63" height="50"/>
                    </a> 
                </div>
                
                <div id="fboxfive">
                    <a href="http://www.fecityonline.com/MegaCity/index.do" target="_blank">
                    <img src="<?php echo $WEB_IMG;?>mobile/icon_big.png" width="143" height="33" border="0"/> 
                    </a>
                </div>
                
                <div id="fboxsix">
                    <a href="http://www.perthskey.com.tw/" target="_blank">
                    <img src="<?php echo $WEB_IMG;?>mobile/icon_black.png" width="58" height="33" border="0"/> 
                    </a>
                </div>
                </div>
                
                <div id="BIGFBOXTT">
                <div id="fboxse">
                    <a href="https://www.facebook.com/cottondeer?fref=ts" target="_blank">
                    <img src="<?php echo $WEB_IMG;?>IMG_8030.JPG" width="118" height="30" border="0"/> 
                    </a>
                </div>
                
                <div id="fboxat">
                    <a href="https://www.facebook.com/Appleface.tw?slog=853970&seq=2131573584&rk=0&fbtype=274" target="_blank">
                    <img src="<?php echo $WEB_IMG;?>icon_last.png" width="143" height="33" border="0"/> 
                    </a>
                </div>
                </div>
                
            </div>
        </div>
        
        <div id="FOOTERDO">
        <p class="footype">時間軸科技股份有限公司版權所有<br>2014 © Copyright Hiiir Inc. All Rights Reserved.</p>
        </div>
    </div>
    
<!-- <script src="<?php //echo $WEB_JS;?>mobile/pgwslider.js"></script><script src="js/pgwslider.min.js"></script> -->
<script type="text/javascript" src="<?php echo $WEB_JS;?>mobile/jquery-1.4.2.min.js"></script>
<script type="text/javascript"> 
$(document).ready(function(){
    $(".acc_container:not('.acc_container:first')").hide();
    $('.acc_trigger').click(function(){
    if( $(this).next().is(':hidden') ) {
            $('.acc_trigger').removeClass('active').next().slideUp();
            $(this).toggleClass('active').next().slideDown();
    }else{
            $(this).toggleClass('active');
            $(this).next().slideUp();
        }
    return false;
    });
});
</script> 

</body>
</html>