function controllo_login(event)
{
    // Verifica se tutti i campi sono riempiti
    if(form.Nome_Utente.value.length == 0 ||
       form.Password.value.length == 0)
    {
        alert ("Compilare tutti i campi.");
        event.preventDefault();
    }
        
}

// Riferimento al form
const form = document.forms['form_login'];
// Aggiungi listener
form.addEventListener('submit', controllo_login);