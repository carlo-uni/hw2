<!-- <!DOCTYPE html> -->
<html>
    <head>
        <!-- ho intenzione di togliere questo pezzo di codice  -->
    <script> const base_url = "{{url('/')}}/" </script>
    <script src="{{ url('js/home.js') }}" defer></script>
    <link rel='stylesheet' href="{{ url('css/home.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Kalam&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <nav>
            <div id="foto">
            <img id="img" src="">
            <!--  avatar  da mettere -->
            <!-- < ?php echo imposta_img(); ? > -->
            </div>
            
            <h1>Benvenuto {{ $id }}!</h1>
            
            <!-- < ? php echo $_SESSION["Nome_Utente"]; ?> -->
            <a href="{{ url('home') }}"><img class="home" src="icons/home.png"/></a>
            <a href="{{ url('create_post') }}"><img class="home" src="icons/post.png"/></a>
            <a href="{{ url('search_people') }}"><img class="home" src="icons/cerca.png"/></a>
            <a href="{{ url('logout') }}"><img class="home" src="icons/logout.png"/></a>
        </nav>

        <div id="modal_view" class="hidden">
        </div>

        <section>
        </section>
        <footer>
            <h5>Powered by Carlo Castorina 1000002023</h5> 
        </footer>
    </body>
</html>