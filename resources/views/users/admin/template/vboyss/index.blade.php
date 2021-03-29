<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIADI KAFAYAT OLABISI BIRTHDAY</title>
   <link rel="stylesheet" href="{{ asset("themes/$theme->name/css/bootsrap/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("themes/$theme->name/css/fontawesome-free/css/all.min.css") }}">

    <style>
        .container {
            background-image: url('{{ asset("uploads/media/19/hms_00018.png") }}');
            background-size: 100%;
            width: 100%;
            height: 100vh;
            /* width: 100vw; */
            background-repeat: no-repeat;
        }

        .content {
            background-image: linear-gradient(rgb(0, 0, 0, 0.5), rgb(0, 0, 0, 0.5));
            width: 100%;
            position: absolute;
            top: 70%;
            left: 0;
            right: 0;
        }

        ul#example {
    list-style: none;
    padding: 19px 0 0;
    margin: 0;
    display: block;
    text-align: center;
    background-color: #fff;
}

ul#example li { display: inline-block; }

ul#example li span {
    font-size: 50px;
    font-weight: 900;
    color: #00bcd4;
    letter-spacing: 5px;
}
ul#example li span.hap{
    font-size: 3em;
    font-weight: 900;
    color: #00bcda;
    letter-spacing: 3px;
}
ul#example li.seperator {
	font-size: 50px;
    vertical-align: top;
    line-height: 80px;
    color: #000000;
    margin: 0 0.3em;
}

ul#example li p {
    color: #000;
    font-size: 1em;
    line-height: 1em;
}



        @media screen and (max-width: 768px) {
            .content {
                top: 40%;
                left: 0;
                right: 0;
                /* position: relative; */
            }
            .content h5 {
                font-size: 13px;
            }
    ul#example {
    list-style: none;
    padding: 12px 0 0;
    margin: 0;
    display: block;
    text-align: center;
    background-color: white
}

ul#example li { display: inline-block; }

ul#example li span {
    font-size: 40px;
    font-weight: 900;
    color: #00bcd4;
    letter-spacing: 3px;
}
ul#example li span.hap{
    font-size: 2em;
    font-weight: 900;
    color: #00bcda;
    letter-spacing: 3px;
}
ul#example li.seperator {
	font-size: 30px;
    vertical-align: top;
    line-height: 50px;
    color: #000000;
    margin: 0 0.15em;
}

ul#example li p {
    color: #000;
    font-size: 0.6em;
    line-height: 0.6em;
}


        }



    </style>
</head>

<body id="b" onclick="enableAutoplay()" >
    <div class="container mt-4" id="slides">
        <div class="content text-center text-light">
            <h1 class="p-2 font-weight-bold text-center"><span class="bg-primary p-2 text-warning">Happy</span> <span class="bg-warning p-2 text-primary">Birthday</span> <span class="adv bg-primary text-white p-2 m-2"></span> </h1>
            <h2 class="font-weight-bold"><span class="typewrite text-capitalize" data-period="2000" data-type='["my dear","my love","my gist mate","my mentor",  "I wish you many happy return",
                "you will never know sorrow", "i wish you many more", "good health will not be your enemy",
                "wealth will not be your enemy",
                "you will never regret", "many happy return in insha allah"]'></span></h2>
            <h5 class="p-3 font-weight-bold"><span class="text-uppercase bg-warning text-primary p-2">by</span><span class="text-warning bg-primary p-2">Oluokun Kabiru Adesina (Village boy)</span></h4>
        </div>
    </div>

    <!-- <embed src="images/HBD.mp3" loop="true" autostart="true" width="100" height="100"> -->
    <audio controls loop id="hbd" hidden>
            <source src="{{ asset("uploads/media/7/akobi-omo") }}" type="audio/mpeg">
          Your browser does not support the audio element.
          </audio>
    <!-- <button onclick=" " id="b">ok</button> -->
    <a href="#birth" id="mo" data-toggle="modal"> </a>
    <div id="mydisable">
    <div class="modal" id="birth">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Congratulation</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h5>Its Your Birthday</h5>

                        <div class="card">

                            <ul id="example">
                                <li><span class="days">00</span>
                                    <p class="days_text">Days</p>
                                </li>

                                <li class="seperator">:</li>
                                <li><span class="hours">00</span>
                                    <p class="hours_text">Hours</p>
                                </li>
                                <li class="seperator">:</li>
                                <li><span class="minutes">00</span>
                                    <p class="minutes_text">Minutes</p>
                                </li>
                                <li class="seperator">:</li>
                                <li><span class="seconds">00</span>
                                    <p class="seconds_text">Seconds</p>
                                </li>
                            </ul>

                        </div>


                    <h2 class="font-weight-bold">Liadi Kafayat Olabisi</h2>


                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    </div>

</body>

</html>
{{-- <script src="bootsrap/jquery.js"></script>
<script src="bootsrap/popper.js"></script>
<script src="bootsrap/bootstrap.min.js"></script>
<script src="jquery.countdown/jquery.countdown.min.js"></script>
<!-- <script src="bootsrap/jquery.countdown.min.js"></script> --> --}}
<script src="{{ asset("themes/$theme->name/js/bootsrap/jquery.js") }}"></script>
<script src="{{ asset("themes/$theme->name/js/bootsrap/popper.js") }}"></script>
<script src="{{ asset("themes/$theme->name/js/bootsrap/bootstrap.min.js") }}"></script>
<script src="{{ asset("themes/$theme->name/js/jquery.countdown/jquery.countdown.js") }}"></script>
{{-- <script src="{{ asset("themes/$theme->name/js/bootsrap/jquery.countdown.min.js") }}"></script> --}}



<script>

var me = true;
// alert("good morning");


    function enableAutoplay() {
        var x = document.getElementById("hbd");
        // x.autoplay = true;
        x.play();
    }


   $("#example").countdown('2022-02-05 23:59:59').on('update.countdown', function(event){
    var $this = $(this).html(event.strftime(''
    +'<li><span >%-w</span><p>Week%!w:s;</p></li>'
    +'<li class="seperator">:</li>'
    +'<li><span >%-d</span><p >Day%!d:s;</p></li>'
    +'<li class="seperator">:</li>'
    +'<li><span>%-H</span><p >Hour%!H:s;</p></li>'
    +'<li class="seperator">:</li>'
    +'<li><span>%-M</span><p>Minute%!M:s;</p></li>'
    +'<li class="seperator">:</li>'
    +'<li><span>%-S</span><p>Second%!S:s;</p></li>'
    )

    )
    $('.adv').html("in advance");
   }).on('finish.countdown', function(event){
    var $this = $(this).html(event.strftime(''
    +'<li><span class="hap">Congratulation</span></li>'
    ))
   });


    $(document).ready(function() {
        $('#mo').click();

        $('#b').click();


//         $('#birth').modal({
//     backdrop: 'static',
//     keyboard: false
// })
    });

    $(document).ready(setInterval(slider, 2000));

    function slider() {
        var imag = ['images/lk.jpg', 'images/lk1.jpg', 'images/lk2.jpg', 'images/lk3.jpg', 'images/lk4.jpg', 'images/lk5.jpg',
        'images/lk6.jpg', 'images/lk7.jpg', 'images/lk8.jpg', 'images/lk9.jpg', 'images/lk10.jpg', 'images/lk11.jpg', 'images/lk12.jpg', 'images/lk13.jpg'];
        // , 'images/IMG_0328.jpeg', 'images/IMG_0329.jpeg'
        var ok = document.getElementById('slides');
        var image = imag.sort(function(a, b) {
            return 0.5 - Math.random()
        });
        ok.style.backgroundImage = "url('" + image[0] + "')";
        ok.style.backgroundSize = "100%";
        ok.style.backgroundRepeat = "no-repeat";

    }

    // function year() {
    //     var y = document.getElementById('y');
    //     var d = new Date();
    //     y.innerHTML = d.getFullYear();
    // }
    // $(document).ready(year);


    (function($) {


        "use strict";




        var TxtType = function(el, toRotate, period) {
            this.toRotate = toRotate;
            this.el = el;
            this.loopNum = 0;
            this.period = parseInt(period, 10) || 2000;
            this.txt = '';
            this.tick();
            this.isDeleting = false;
        };

        TxtType.prototype.tick = function() {
            var i = this.loopNum % this.toRotate.length;
            var fullTxt = this.toRotate[i];

            if (this.isDeleting) {
                this.txt = fullTxt.substring(0, this.txt.length - 1);
            } else {
                this.txt = fullTxt.substring(0, this.txt.length + 1);
            }

            this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

            var that = this;
            var delta = 200 - Math.random() * 100;

            if (this.isDeleting) {
                delta /= 2;
            }

            if (!this.isDeleting && this.txt === fullTxt) {
                delta = this.period;
                this.isDeleting = true;
            } else if (this.isDeleting && this.txt === '') {
                this.isDeleting = false;
                this.loopNum++;
                delta = 500;
            }

            setTimeout(function() {
                that.tick();
            }, delta);
        };

        window.onload = function() {

            var elements = document.getElementsByClassName('typewrite');
            for (var i = 0; i < elements.length; i++) {
                //  var ok= ["Saab", "Volvo", "BMW"];
                var toRotate = elements[i].getAttribute('data-type');
                var period = elements[i].getAttribute('data-period');
                if (toRotate) {
                    new TxtType(elements[i], JSON.parse(toRotate), period);
                }
            }
            // INJECT CSS
            var css = document.createElement("style");
            css.type = "text/css";
            css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
            document.body.appendChild(css);
        };
    })(jQuery);
    </script>
