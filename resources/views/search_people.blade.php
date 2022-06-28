<html>
    <head>
        <link rel='stylesheet' href="{{ url('css/search_peoples.css') }}">
        <script> const base_url = "{{url('/')}}/" </script>

        <script src="{{ url('js/search_people.js') }}" defer></script>
        <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Kalam&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cerca utenti</title>
    </head>
    
    <body>

        <nav>
            <h1> Cerca utenti</h1>
            <!-- <a href="home.php"><img id="home" src="icons/home.png"/></a>
            <a href="create_post.php"><img id="home" src="icons/post.png"/></a>
            <a href="search_people.php"><img id="home" src="icons/cerca.png"/></a>
            <a href="logout.php"><img id="home" src="icons/logout.png"/></a> -->
        
            <a href="{{ url('home') }}"><img class="home" src="icons/home.png"/></a>
            <a href="{{ url('create_post') }}"><img class="home" src="icons/post.png"/></a>
            <a href="{{ url('search_people') }}"><img class="home" src="icons/cerca.png"/></a>
            <a href="{{ url('logout') }}"><img class="home" src="icons/logout.png"/></a>

        </nav>

        <main>

                <form name='form' method='get' id='form_ricerca'>
                    <p> 
                        <label>Cerca utente: <input type='text' name='utente_cercato'></label>
                    </p>
                    <p>
                        <label>&nbsp;<input type='submit' value="cerca"></label>
                    </p>
                </form>
                <h1 class="title">Clicca sul tasto "cerca" per trovare tutti gli utenti registrati, altrimenti specificane uno!</h1>
                
            <section>
                
            </section>
        </main>
    </body>
</html>