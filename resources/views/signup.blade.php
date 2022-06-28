<!-- <!DOCTYPE html> -->
<html>
    <head>
        <link rel='stylesheet' href="{{ url('css/signup.css') }}">
        <script src="{{ url('js/controllo_signup.js') }}" defer></script>
        <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Kalam&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TRMN</title>
    </head>
    <body>
        
            
        @if($error == 'existing')                                       
            <p class='errore'>
            L'utente è già registrato
            </p>
        @endif
        <h1>TRMN è quello che fà per te!</h1>
        <p id="subtitle"> TRMN è uno social interamente dedicato a te, ai tuoi contenuti e a quelli degli utenti che segui.</br> Iscriviti compilando il seguente form ed entra a far parte del mondo TRMN! </p>

        <main>
            <div class='form'>
            <form name='form_signup' method='post' enctype="multipart/form-data">
                @csrf
                <p>
                    <label>Nome: <input type='text' name='Nome' value='{{ old("Nome") }}'></label>
                </p>
                <p>
                    <label>Cognome: <input type='text' name='Cognome' value='{{ old("Cognome") }}'></label>
                </p>
                <p>
                    <label>E-mail: <input type='text' name='Email' value='{{ old("Email") }}'></label> 
                </p>
                <p>
                    <label>Nome utente: <input id="Nome_Utente" type='text' name='Nome_Utente' value='{{ old("Nome_Utente") }}'></label>
                </p>
                <p>
                    <label>Password: <input type='password' name='Password' placeholder='Max 16 caratteri' value='{{ old("Password") }}'></label>
                </p>
                <p>
                    <label>Conferma Password: <input type='password' name='Conferma_Password' value='{{ old("Conferma_Password") }}'></label>
                </p>
                <p>
                    <label>Data di nascita: <input type='date' name='Data_Nascita' value='{{ old("Data_Nascita") }}'></label>
                </p>
                <p>
                    Sesso: 
                    <span>
                          <input type='radio' name='genere' value='M' value='{{ old("genere") }}'>M
                          <input type='radio' name='genere' value='F' value='{{ old("genere") }}'>F
                    </span>
                </p>
                <p>
                    <label>Paese: <input type='text' name='Paese' value='{{ old("Paese") }}'></label>
                </p>
                <p>
                    <label>Numero di telefono: <input type='text' name='n_telefono' placeholder='Es. 0123456789' value='{{ old("n_telefono") }}'></label>
                </p>
                <p>
                    <label>Seleziona l'avatar: <input type='file' name="fileToUpload" id="fileToUpload" value='{{ old("fileToUpload") }}'></label>
                </p>
                <p>
                    <label>&nbsp;<input type='submit'></label>
                </p>
            </form>
        </div>
        </main>

        <section>
            <p>Hai già un account? <a href="{{ url('login') }}">Effettua il login!</a></p>
        </section>

        <footer>
            <h5>Powered by Carlo Castorina 1000002023</h5> 
        </footer>
    </body>
    
</html>