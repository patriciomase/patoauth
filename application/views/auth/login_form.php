<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo SITE_TITLE?></title>
  
  <?php foreach($styles as $style):?>
  <link href="<?php echo $style?>" rel="stylesheet">
  <?php endforeach?>
  
  <script>
    var site_url = "<?php echo site_url()?>";
  </script>

  </head>

  <body>

    <form class="form-horizontal well login-form col-md-6 col-md-offset-3" role="form">
      <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Username</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="username" placeholder="Enter your username">
        </div>
      </div>
      <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="password" placeholder="Password">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label>
              <input type="checkbox"> Remember me
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Sign in</button>
        </div>
      </div>
    </form>


  <?php foreach($scripts as $script):?>
    <script src="<?php echo $script?>"></script>
  <?php endforeach?>
  </body>
</html>