<!DOCTYPE html>
<html>

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="/css/materialize.min.css" media="screen,projection" />

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <nav class="blue-grey darken-2">
    <div class="nav-wrapper container">
      <a href="#" class="brand-logo">
          <img src="/imgs/Enrii_Logo.png" height="100%">
        </a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li>Interview Assignment</li>
      </ul>
    </div>
  </nav>
</head>

<body>
  <div class="container">
    @yield('content')
  </div>

  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="/js/jquery.min.js"></script>
  <script type="text/javascript" src="/js/materialize.min.js"></script>

  <script>
    $(document).ready(function(){
    $('select').formSelect();
  });
  </script>
</body>

</html>