<!doctype html>
<html lang="fa">
<head>
  <meta charset="utf-8">
  <title>تایمر نیمرو</title>

  <link rel="stylesheet" href="style.css">

  <script type="text/javascript">
    var eggTimes = {
      "": 0,
      "عسلی": 0.1*60,
      "معمولی": 5*60,
      "سفت": 7*60,
    };

    var timerId = null;
    var remaining = 0;

    function formatTime(sec){
      var m = Math.floor(sec / 60);
      var s = sec % 60;
      if (s < 10) s = "0" + s;
      return m + ":" + s;
    }

    function onSelectChange(){
      var type = document.getElementById("eggType").value;

      if (type === ""){
        stopTimer();
        document.getElementById("showType").innerHTML = "—";
        document.getElementById("showRemain").innerHTML = "—";
        return;
      }

      remaining = eggTimes[type];
      document.getElementById("showType").innerHTML = type;
      document.getElementById("showRemain").innerHTML = formatTime(remaining);

      stopTimer();
    }

    function startTimer(){
      var type = document.getElementById("eggType").value;

      if (type === ""){
        alert("اول نوع نیمرو رو انتخاب کن.");
        return;
      }

      if (remaining <= 0){
        remaining = eggTimes[type];
      }

      if (timerId !== null) return;

      timerId = setInterval(function(){
        remaining--;
        document.getElementById("showRemain").innerHTML = formatTime(remaining);

        if (remaining <= 0){
          stopTimer();

          var ok = confirm("نیمرو " + type + " آماده شد! می‌خوای ثبتش کنیم؟");

          if (ok === true){
            var url = "result.php?type=" + encodeURIComponent(type)
                    + "&time=" + encodeURIComponent(eggTimes[type]);
            location.replace(url);
          } else {
            alert("اوکی! می‌تونی یه نوع دیگه انتخاب کنی.");
          }
        }
      }, 1000);
    }

    function stopTimer(){
      if (timerId !== null){
        clearInterval(timerId);
        timerId = null;
      }
    }

    function resetAll(){
      stopTimer();
      document.getElementById("eggType").value = "";
      remaining = 0;
      document.getElementById("showType").innerHTML = "—";
      document.getElementById("showRemain").innerHTML = "—";
    }

    window.onload = function(){
      resetAll();
    }
  </script>
</head>

<body>
  <div class="box">
    <h2>تایمر پخت نیمرو</h2>

    <label>نوع نیمرو رو انتخاب کن:</label>
    <select id="eggType" onchange="onSelectChange()">
      <option value="">— انتخاب کنید —</option>
      <option value="عسلی">عسلی (3 دقیقه)</option>
      <option value="معمولی">معمولی (5 دقیقه)</option>
      <option value="سفت">سفت (7 دقیقه)</option>
      <option value="املت">املت (10 دقیقه)</option>
    </select>

    <div class="timer">
      نوع انتخاب‌شده: <span id="showType">—</span><br>
      زمان باقی‌مانده: <span id="showRemain">—</span>
    </div>

    <div class="row">
      <button type="button" onclick="startTimer()">شروع تایمر</button>
      <button type="button" onclick="stopTimer()">توقف</button>
    </div>

    <button type="button" onclick="resetAll()">ریست</button>

    <div class="hint">
      انتخاب با event انجام می‌شود، زمان با DOM نمایش داده می‌شود، و در پایان با confirm تصمیم می‌گیریم به صفحه PHP برویم یا نه.
    </div>
  </div>
</body>
</html>
