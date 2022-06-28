<!-- <!DOCTYPE html> -->
<html>
    <head>
        <link rel='stylesheet' href="{{ url('css/login.css') }}">
        <script src="{{ url('js/controllo_login.js') }}" defer></script>
        <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Kalam&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Login TRMN
        </title>
    </head>
    
    <body>
        <h1> Effettua il login ed inizia a condividere contenuti col resto della comunity.</h1>
        <main>
            <div class="form">
            <form name='form_login' method='post'>
                @csrf
                <p>
                    <label>Nome utente: <input type='text'  value='{{ old("Nome_Utente") }}' name='Nome_Utente'></label>
                </p>
                <p>
                    <label>Password: <input type='password' name='Password'></label>
                </p>
                <!-- forse lo tolgo -->
                <p>
                    <label>Ricorda i miei dati: <input type='checkbox' name='ricordami'> </label>
                </p>
                <!--  -->
                <p>
                    <label>&nbsp;<input type='submit' value="login"></label>
                </p>
            </form>
        </div>
        </main>
        <p class="signup"> Non hai ancora un account? </br> <a href="{{ url('signup') }}">Registrati ora!</a></p>
        <footer>
            <h5>Powered by Carlo Castorina 1000002023</h5> 
        </footer>
    </body>
</html>