function clockUpdate() {
      var date = new Date();


      function addZero(x) {
        if (x < 10) {
          return x = '0' + x;
        } else {
          return x;
        }
      }

      function twelveHour(x) {
        if (x > 12) {
          return x = x - 12;
        } else if (x == 0) {
          return x = 12;
        } else {
          return x;
        }
      }

      var h = addZero(twelveHour(date.getHours()));
      var m = addZero(date.getMinutes());
      var s = addZero(date.getSeconds());
      var ampm = h <= 12 ? 'PM' : 'AM';
      h = h % 12;
      $('.digital-clock').text(h + ':' + m + ':' + s + ' ' + ampm)
    }