<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<style>
    input[type=number]{ -moz-appearance:textfield !important;-webkit-appearance: textfield !important;}  
    input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button {-webkit-appearance: none !important; margin: 0; }  
</style>

  <form enctype="multipart/form-data" method="post" action="">
      <input type="file" name="up" id="">
      <input type="number" name="dd" id="">
      <input type="submit" value="上传">
  </form>
</body>
</html>
<?php
register_shutdown_function("shutdown");
function shutdown()
{
    // This is our shutdown function, in
    // here we can do any last operations
    // before the script is complete.

    echo 'Script executed with success', PHP_EOL;
}



