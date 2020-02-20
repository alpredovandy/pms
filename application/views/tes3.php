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
    apiKey: "AIzaSyBVt2Og2sM9jru6PCzP57H12FnDq9P1k58",
    authDomain: "internal-training-86211.firebaseapp.com",
    databaseURL: "https://internal-training-86211.firebaseio.com",
    projectId: "internal-training-86211",
    storageBucket: "internal-training-86211.appspot.com",
    messagingSenderId: "470638195393",
    appId: "1:470638195393:web:2cea23b911ef0cee5cda40",
    measurementId: "G-7HHEJK4TNC"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  var reference =  firebase.database().ref('/sensor_ph_1');
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
  series.addPoint([x, Math.round(snapshot.val() * 100) / 100], true, true);
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
        text: 'Kelembapan tanah'
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
  console.log(snapshot.val());
  
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