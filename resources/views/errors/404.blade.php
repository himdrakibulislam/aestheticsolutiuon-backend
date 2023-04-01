<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Not Found</title>
      <!-- Favicons -->
  <link href="{{asset('assets/img/logo.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
</head>
<style>
    .center{
        text-align: center;
        color: #fff
    }
    .status{
        font-size: 80px;
    }
    .notfound {
  --c:  #910030d2; /* the color*/
  color: #fff;
  box-shadow: 0 0 0 .1em inset var(--c); 
  --_g: linear-gradient(var(--c) 0 0) no-repeat;
  background: 
    var(--_g) calc(var(--_p,0%) - 100%) 0%,
    var(--_g) calc(200% - var(--_p,0%)) 0%,
    var(--_g) calc(var(--_p,0%) - 100%) 100%,
    var(--_g) calc(200% - var(--_p,0%)) 100%;
  background-size: 50.5% calc(var(--_p,0%)/2 + .5%);
  outline-offset: .1em;
  transition: background-size .4s, background-position 0s .4s;
}
.notfound:hover {
  --_p: 100%;
  transition: background-position .4s, background-size 0s;
}
.notfound:active {
  box-shadow: 0 0 9e9q inset #0009; 
  background-color: var(--c);
  color: #fff;
}



body {
  height: 100vh;
  margin: 0;
  display: grid;
  place-content: center;
  grid-auto-flow: column;
  gap: 40px;
  background: #010001e2;
}
.notfound {
  font-family: system-ui, sans-serif;
  font-size: 1.5rem;
  cursor: pointer;
  padding: .1em .6em;
  font-weight: bold;  
  border: none;
}
</style>
<body>
    <div class="center">
        <h3 class="status">404</h3>
        <button id="back" class="notfound">Back</button>
        <a href="/" class="notfound" style="text-decoration:none">Home</a>
    </div>
    <script>
        document.getElementById("back").addEventListener("click", function(){
            window.history.back(-1);
        });
    </script>
</body>
</html>