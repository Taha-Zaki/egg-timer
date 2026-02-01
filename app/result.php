<!doctype html>
<html lang="fa">
<head>
  <meta charset="utf-8">
  <title>نتیجه</title>
  <style>
    body{font-family:tahoma; direction:rtl; padding:20px}
    .box{max-width:680px; border:1px solid #ddd; padding:16px; border-radius:10px}
  </style>
</head>
<body>

<?php
  $type = isset($_GET["type"]) ? $_GET["type"] : "نامشخص";
  $time = isset($_GET["time"]) ? (int)$_GET["time"] : 0;

  $minutes = (int)($time / 60);

  $desc = array(
    "عسلی" => "زرده روان، سفیده بسته",
    "معمولی" => "زرده نیمه‌بسته",
    "سفت" => "زرده کامل بسته",
  );

  $explain = isset($desc[$type]) ? $desc[$type] : "توضیح موجود نیست";
?>

<div class="box">
  <h2>ثبت شد ✅</h2>
  <p><?php echo "نوع انتخابی: " . $type; ?></p>
  <p><?php echo "زمان استاندارد: " . $minutes . " دقیقه"; ?></p>
  <p><?php echo "توضیح: " . $explain; ?></p>

  <a href="index.php">بازگشت</a>
</div>

</body>
</html>
