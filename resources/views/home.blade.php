<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Favicons -->
  <link href="{{asset('assets/img/logo.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <title>{{env('APP_NAME')}}</title>
    <style>
        body  {
       background-image: url("assets/img/home-bg.jpg");
       background-repeat: repeat-x;
        background-color: #cccccc;
      }

      .wrapper {
  height: 100vh;
  /*This part is important for centering*/
  display: grid;
  place-items: center;
}

.typing-demo {
    color: aliceblue;
  width: 30ch;
  animation: typing 2s steps(22), blink .5s step-end infinite alternate;
  white-space: nowrap;
  overflow: hidden;
  border-right: 3px solid;
  font-family: monospace;
  font-size: 2em;
}

@keyframes typing {
  from {
    width: 0
  }
}
    
@keyframes blink {
  50% {
    border-color: transparent
  }
}
@media only screen and (max-width: 600px) {
  .typing-demo{
    font-size: 1em;
  }
}

     </style>
    
</head>
<body>
    <div class="wrapper">
        <div class="typing-demo">
          Welcome to {{env('APP_NAME')}}
        </div>
    </div>
</body>
</html>