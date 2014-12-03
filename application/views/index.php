<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="address=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<!-- iOS 介面調整 -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta charset="ISO-8859-1">

<title>Qbon</title>
<link href="<?php echo $WEB_CSS;?>desktop-main.css" rel="stylesheet" type="text/css" />
<!--<link rel="stylesheet" href="css/pgwslider.min.css">-->

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!--[if lt IE 9]>
    <link href="css/main.css" rel="stylesheet" type="text/css">
<![endif]-->
<script src="<?php echo $WEB_JS;?>flycan.js" type="text/javascript"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50338452-3', 'auto');
  ga('send', 'pageview');

</script>
</head>



<body>

    <!-- 表頭 -->
    <div id="TOP">
        <div id="TOPC">
        <a href="http://www.qbon.com.tw/" target="_blank">
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
                    <li class="DCboxG">
                        <div class="igbox">
                        <img src="<?php echo $WEB_IMG?>icon01.png" width="100%" />
                        </div>
                    </li>
                    <?php 
                    if($DailySchedules){
                        foreach ($DailySchedules as $date => $value) {
                            $title = $pic = $link = '';
                            $show_date = date('n月d日',strtotime($date));
                            if($value){
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
                                $rand_imgno = rand(2,4);
                    ?>
                            <li class="DCboxG">
                                <div class="igbox">
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
                        <img src="<?php echo $WEB_IMG;?>icon02.png" width="100%" />
                        </div>
                    </li>
                    
                    <li class="DCboxG">
                        <div class="igbox">
                        <img src="<?php echo $WEB_IMG;?>icon03.png" width="100%" />
                        </div>
                    </li>
                    
                    <li class="DCboxG">
                        <div class="igbox">
                        <img src="<?php echo $WEB_IMG;?>icon04.png" width="100%" />
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <!-- FB活動 -->
    <div id="EVENT">
        <div id="EVENTC">
            <a class="btn-orange" href="#">立即上傳</a>
        </div>
    </div>
    
    <!-- Qbon介紹 -->
    <div id="STORE">
        <div id="STOREC">
            <div id="sboxbg">
                <ul>
                <li class="google"><a href="#" ></a></li>
                <li class="apple"><a href="#" ></a></li>
                </ul>
            </div>
            
            <div id="sfbbox">
                <p><iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FQbon.inside&amp;width=990&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=800585080003362" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:990px; height:290px;" allowTransparency="true"></iframe></p>
            </div>
        </div>
    </div>
    
    <!-- 表尾 -->
    <div id="FOOTER">
        <div id="FOOTERC">
            <div id="logobox">
                <div class="logo">
                <p class="footypetitl">主辦單位</p>
                <a href="https://www.facebook.com/Qbon.inside"  target="_blank">
                <img src="<?php echo $WEB_IMG?>icon_flogo.png" width="111" height="33" border="0"/>
                </a>
                </div>
                
                <div class="logot">
                <a href="http://www.hiiir.com/" target="_blank">
                <img src="<?php echo $WEB_IMG?>icon_hiiir.png" width="44" height="33" border="0"/> 
                </a>
                </div>
                
                <div class="logo">
                <p class="footypetitl">協辦單位</p>
                <a href="http://www.miramar.com.tw/" target="_blank">
                <img src="<?php echo $WEB_IMG?>icon_miramar.png" width="80" height="42" border="0"/>
                </a>
                </div>
                
                <div class="logo">
                <p class="footypetitl">贊助單位</p>
                <a href="http://www.miramar.com.tw/" target="_blank">
                 <img src="<?php echo $WEB_IMG?>icon_big.png" width="143" height="33" border="0"/>
                 </a>
                </div>
                
                <div class="logott">
                <a href="http://www.fecityonline.com/MegaCity/index.do" target="_blank">
                <img src="<?php echo $WEB_IMG?>icon_black.png" width="58" height="33" border="0"/>
                </a> 
                </div>
            </div>
            <p class="footype">時間軸科技股份有限公司版權所有2014 © Copyright Hiiir Inc. All Rights Reserved.</p>
        </div>
    </div>
<!-- <script src="js/pgwslider.js"></script><script src="js/pgwslider.min.js"></script> -->
</body>
</html>
