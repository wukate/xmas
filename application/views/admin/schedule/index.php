
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Qbon Xmas - 日曆列表</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $WEB_CSS;?>/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
    function del_schedule(id){
      if(confirm('確定刪除嗎?')){
        window.location.href="<?php echo  base_url('admin/schedule/del/" + id + "');?>";
      }
    }
    </script>
  </head>

  <body>
    <?php echo  file_get_contents(base_url('admin/base/topbar'))?>
    <div class="container-fluid">
      <div class="row">
        <?php echo  file_get_contents(base_url('admin/base/sidebar'))?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">日曆列表</h1>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>刪除</th>
                  <th>日期</th>
                  <th>標題</th>
                  <th>圖片</th>
                  <th>連結</th>
                  <th>編輯</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if($schedules){
                  foreach ($schedules as $key => $value) {
                ?>
                <tr>
                  <td><span onclick="del_schedule(<?php echo $value->id;?>)" style="cursor:pointer;">刪除</span></td>
                  <td><?php echo $value->s_date;?></td>
                  <td><?php echo $value->title;?></td>
                  <td><?php if(!empty($value->pic)){?><img src="/Xmas/uploads/<?php echo $value->pic;?>"><?php }?></td>
                  <td><a href="<?php echo $value->link;?>" target="_blank"><?php echo $value->link;?></a></td>
                  <td><a href="<?php echo base_url('admin/schedule/edit/'.$value->id);?>">編輯</a></td>
                </tr>
                <?php
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?php echo $WEB_CSS;?>/dist/css/bootstrap.min.js"></script>
    <!-- <script src="http://getbootstrap.com/assets/js/docs.min.js"></script> -->
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    -->
  </body>
</html>
