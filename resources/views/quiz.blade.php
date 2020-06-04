<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Quiz</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .custom-option{
                width: 180px;
                background-color: #f3d648;
                border-radius: 5px;
                font-size: 20px;
            }
            .wrong{
                display: none;
                background-color: #bf8d8d;
                color: white;
                font-size: 25px;
                font-weight: bold;
                border-radius: 5px;
                padding: 5px;
            }
            .correct{
                display: none;
                background-color: #57c77f;
                color: white;
                font-size: 25px;
                font-weight: bold;
                border-radius: 5px;
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    Quiz
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    {{$question}}
                </div>

                <div class="m-b-md">
                    @foreach($options as $key => $option)
                        <button class="custom-option" 
                                onclick="checkAnswer('{{$correctAnswerIndex}}','{{$key}}')"
                        >
                            {{ucfirst($option)}} img
                        </button> 
                        <br><br>
                    @endforeach
                </div>
                <div id="correct" class="correct">
                    <span>Correct Answer</span>
                </div>
                <div id="wrong" class="wrong">
                    <span>Wrong Answer</span>
                </div>
            </div>
        </div>


    </body>
    <script type="text/javascript">
        function checkAnswer(answerIndex,selectedIndex) {
            if(answerIndex==selectedIndex)
            {
                document.getElementById("correct").style.display = "block";
                document.getElementById("wrong").style.display = "none"; 

            }
            else
            {
                document.getElementById("correct").style.display = "none";
                document.getElementById("wrong").style.display = "block"; 
            }
        }
    </script>
</html>
