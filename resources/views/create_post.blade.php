<html>
    <head>
        <link rel='stylesheet' href="{{ url('css/create_post.css') }}">
        <script> const base_url = "{{url('/')}}/" </script>
        <script src="{{ url('js/create_post.js') }}" defer></script>
        <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Kalam&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Crea post</title>
    </head>
    
    <body>

        <nav>
            <h1> Crea il tuo post!</h1>
            <!-- <a href="home.php"><img class="home" src="icons/home.png"/></a>
            <a href="create_post.php"><img class="home" src="icons/post.png"/></a>
            <a href="search_people.php"><img class="home" src="icons/cerca.png"/></a>
            <a href="logout.php"><img id="home" src="icons/logout.png"/></a> -->

            <a href="{{ url('home') }}"><img class="home" src="icons/home.png"/></a>
            <a href="{{ url('create_post') }}"><img class="home" src="icons/post.png"/></a>
            <a href="{{ url('search_people') }}"><img class="home" src="icons/cerca.png"/></a>
            <a href="{{ url('logout') }}"><img class="home" src="icons/logout.png"/></a>
        </nav>

        <main>

            <div class="form">
                <form name='form' method='post' id='form'>
                
                    <p> 
                        <label>Ricerca contenuto: <input type='text' name="contenuto"></label>
                    </p>
                    <p>
                        <label>Seleziona servizio: 
                            <select name='servizi'>
                                <option name = 'NASA' value='NASA'>Immagini NASA</option>
                                
                            </select>
                        </label>
                    </p>
                    <p>
                        <label>&nbsp;<input type='submit'></label>
                    </p>
                </form>
            </div>

            <div id='struttura_ricerca'>
                <h1> Come cercare i contenuti:</h1>
                <strong> Immagini NASA:</strong> La scelta di questo servizio permette l'accesso ad uno dei siti Web più popolari della NASA... l' Astronomia Picture of the Day. Inserisci le date nel formato AAAA-MM-GG e condividi immagini spaziali.</br></br>
                
            </div>
        </main>

        <section id="visualizza_risultati">           
        </section>

        <section id="modal_view" class="hidden">
            <div id="form">
                <form name='post' 
                action="http://localhost/example-hw2/public/send_post"
                method='get'>
                
                
                    <h3> Clicca sulla foto per tornare alla scelta del contenuto</h3>
                    <textarea name='descrizione' placeholder="Inserisci qui la descrizione del post..."></textarea>
                    <input type='submit'>
                </form>
            </div>
          
        </section>
    </body>
</html>