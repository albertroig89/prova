<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./jquery.datetimepicker.css"/>

    <style type="text/css">

        .custom-date-style {
            background-color: red !important;
        }

        .input{
        }
        .input-wide{
            width: 500px;
        }

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="./jquery.js"></script>
    <script src="node_modules/php-date-formatter/js/php-date-formatter.min.js"></script>
    <script src="node_modules/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="jquery.datetimepicker.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/

        $.datetimepicker.setLocale('en');

        $('#datetimepicker_format').datetimepicker({value:'2015/04/15 05:03', format: $("#datetimepicker_format_value").val()});
        console.log($('#datetimepicker_format').datetimepicker('getValue'));

        $("#datetimepicker_format_change").on("click", function(e){
            $("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
        });
        $("#datetimepicker_format_locale").on("change", function(e){
            $.datetimepicker.setLocale($(e.currentTarget).val());
        });

        $('#datetimepicker').datetimepicker({
            dayOfWeekStart : 1,
            lang:'en',
            disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
            startDate:	'1986/01/05'
        });
        $('#datetimepicker').datetimepicker({value:'2015/04/15 05:03', step:10});

        $('.some_class').datetimepicker();

        $('#default_datetimepicker').datetimepicker({
            formatTime:'H:i',
            formatDate:'d.m.Y',
            //defaultDate:'8.12.1986', // it's my birthday
            defaultDate:'+03.01.1970', // it's my birthday
            defaultTime:'10:00',
            timepickerScrollbar:false
        });

        $('#datetimepicker10').datetimepicker({
            step:5,
            inline:true
        });
        $('#datetimepicker_mask').datetimepicker({
            mask:'9999/19/39 29:59'
        });

        $('#datetimepicker1').datetimepicker({
            datepicker:false,
            format:'H:i',
            step:5
        });
        $('#datetimepicker2').datetimepicker({
            yearOffset:222,
            lang:'ch',
            timepicker:false,
            format:'d/m/Y',
            formatDate:'Y/m/d',
            minDate:'-1970/01/02', // yesterday is minimum date
            maxDate:'+1970/01/02' // and tommorow is maximum date calendar
        });
        $('#datetimepicker3').datetimepicker({
            inline:true
        });
        $('#datetimepicker4').datetimepicker();
        $('#open').click(function(){
            $('#datetimepicker4').datetimepicker('show');
        });
        $('#close').click(function(){
            $('#datetimepicker4').datetimepicker('hide');
        });
        $('#reset').click(function(){
            $('#datetimepicker4').datetimepicker('reset');
        });
        $('#datetimepicker5').datetimepicker({
            datepicker:false,
            allowTimes:['12:00','13:00','15:00','17:00','17:05','17:20','19:00','20:00'],
            step:5
        });
        $('#datetimepicker6').datetimepicker();
        $('#destroy').click(function(){
            if( $('#datetimepicker6').data('xdsoft_datetimepicker') ){
                $('#datetimepicker6').datetimepicker('destroy');
                this.value = 'create';
            }else{
                $('#datetimepicker6').datetimepicker();
                this.value = 'destroy';
            }
        });
        var logic = function( currentDateTime ){
            if (currentDateTime && currentDateTime.getDay() == 6){
                this.setOptions({
                    minTime:'11:00'
                });
            }else
                this.setOptions({
                    minTime:'8:00'
                });
        };
        $('#datetimepicker7').datetimepicker({
            onChangeDateTime:logic,
            onShow:logic
        });
        $('#datetimepicker8').datetimepicker({
            onGenerate:function( ct ){
                $(this).find('.xdsoft_date')
                    .toggleClass('xdsoft_disabled');
            },
            minDate:'-1970/01/2',
            maxDate:'+1970/01/2',
            timepicker:false
        });
        $('#datetimepicker9').datetimepicker({
            onGenerate:function( ct ){
                $(this).find('.xdsoft_date.xdsoft_weekend')
                    .addClass('xdsoft_disabled');
            },
            weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','06.01.2014'],
            timepicker:false
        });
        var dateToDisable = new Date();
        dateToDisable.setDate(dateToDisable.getDate() + 2);
        $('#datetimepicker11').datetimepicker({
            beforeShowDay: function(date) {
                if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
                    return [false, ""]
                }

                return [true, ""];
            }
        });
        $('#datetimepicker12').datetimepicker({
            beforeShowDay: function(date) {
                if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
                    return [true, "custom-date-style"];
                }

                return [true, ""];
            }
        });
        $('#datetimepicker_dark').datetimepicker({theme:'dark'})

         </script>
</body>
</html>
