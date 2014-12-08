<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Qbon Xmas - 編輯日曆</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $WEB_CSS;?>dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/dashboard/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- <script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <?php echo  file_get_contents(base_url('admin/base/topbar'))?>
    <div class="container-fluid">
      <div class="row">
        <?php echo  file_get_contents(base_url('admin/base/sidebar'))?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">編輯日曆</h1>
          <!-- CONTENT START -->
          <div class="container">
      
            <!-- insert song start -->
            <form class="form-horizontal" action="<?php echo base_url('admin/schedule/edit/'.$schedule_res->id);?>" method="post" enctype="multipart/form-data">
              <div class="control-group">
                <label class="control-label" for="inputName">顯示日期</label>
                <div class="controls">
                  <input type="text" id="s_date" name="s_date" placeholder="Enter date..." value="<?php echo $schedule_res->s_date;?>">格式:2014-01-01
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputName">標題</label>
                <div class="controls">
                  <input type="text" id="title" name="title" placeholder="Enter title..." value="<?php echo $schedule_res->title;?>" maxlength="10">建議字數：中文字 - 10個
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputName">連結</label>
                <div class="controls">
                  <input type="text" id="link" name="link" placeholder="Enter link..." value="<?php echo $schedule_res->link;?>">網址請加上「http://」 or 「https://」
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputFile">File</label>
                <div class="controls">
                  <input type="file" id="file" name="file">建議尺寸：148px * 175px<br>
                  <?php if(!empty($schedule_res->pic)){?><img src="/Xmas/uploads/<?php echo $schedule_res->pic;?>"><?php }?>
                  <input type="hidden" name="old_pic" id="old_pic" value="<?php echo $schedule_res->pic;?>">
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
              </div>
            </form>
            <!-- insert song end -->
            
          </div>
          <!-- CONTENT END -->
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?php echo $WEB_JS;?>bootstrap.min.js"></script>
    <script src="http://getbootstrap.com/assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    -->
  </body>
</html>
