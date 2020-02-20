<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<script src="https://code.highcharts.com/stock/highstock.js"></script>

<div id="container2" style="height: 400px; min-width: 310px"></div>
<script src="https://www.gstatic.com/firebasejs/5.9.3/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.9.3/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.9.3/firebase-database.js"></script>
<script>
// Create the chart
var firebaseConfig = {
    apiKey: "AIzaSyA4KNv9UEJ22Xs3vls1kb03ZfzpuSGwz8I",
    authDomain: "kmipn2019.firebaseapp.com",
    databaseURL: "https://kmipn2019.firebaseio.com",
    projectId: "kmipn2019",
    storageBucket: "kmipn2019.appspot.com",
    messagingSenderId: "199328118446",
    appId: "1:199328118446:web:da31a926b9f9ca70a51f3f"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  var reference =  firebase.database().ref('/ruang1');
Highcharts.stockChart('container2', {
    chart: {
        events: {
            load: function () {

                // set up the updating of the chart each second
                var series = this.series[0];
                setInterval(function () {
                    var x = (new Date()).getTime(), // current time

                        y = Math.round(Math.random() * 100);
                        reference.once('value').then(function(snapshot) {
  // // console.log(snapshot.val().suhu_ruangan);
  // berat_infusval=snapshot.val().berat_infus;
  series.addPoint([x, Math.round(snapshot.val().suhu_tubuh * 100) / 100], true, true);
            });
                   
                }, 1000);
            }
        }
    },

    time: {
        useUTC: false
    },
    yAxis:{
        tickInterval:0.5
    },
    rangeSelector: {
        buttons: [{
            count: 1,
            type: 'minute',
            text: '1M'
        }, {
            count: 5,
            type: 'minute',
            text: '5M'
        }, {
            type: 'all',
            text: 'All'
        }],
        inputEnabled: false,
        selected: 0
    },

    title: {
        text: 'Suhu Tubuh Pasien'
    },

    exporting: {
        enabled: false
    },

    series: [{
        name: 'Data Suhu',
        data: (function () {
            // generate an array of random data
            var data = [],
                time = (new Date()).getTime(),
                i;
                reference.once('value').then(function(snapshot) {
  // // console.log(snapshot.val().suhu_ruangan);
  // berat_infusval=snapshot.val().berat_infus;
  console.log(snapshot.val().suhu_ruangan);
  
            });
            for (i = -999; i <= 0; i += 1) {
                data.push([
                    time + i * 1000,
                    0
                ]);
            }
            return data;
        }())
    }]
});

</script>
</body>
</html>