function controllo_signup(event)
{

    // Verifica se tutti i campi sono riempiti
    if( form.Nome_Utente.value.length == 0 ||
        form.password.value.length == 0 ||
        form.Nome.value.length == 0 ||
        form.Cognome.value.length == 0 ||
        form.Email.value.length == 0 ||
        form.genere.value == false ||
        form.Paese.value == null ||
        form.n_telefono.value == 0 ||
        form.fileToUpload.value.length==0||
        form.Data_Nascita == 0)
    {
      // Avvisa utente
      alert("Compilare tutti i campi.");
      // Blocca l'invio del form
      event.preventDefault();
    }
    console.log('fatto');
    ctrlEmail();
    ctrlPassword();
}

function ctrlPassword(){

    if(form.password.value !== form.password_confirmation.value)
    {
      alert("Le password non coincidono");
      event.preventDefault();
    }
    else if(form.password.value.length>16)
    {
        alert("Assicurati che la password abbia Max 16 caratteri");
        event.preventDefault();
    }

  }

function ctrlEmail(){
  var em = document.forms["form_signup"]["Email"].value;
  var atpos = em.indexOf("@");
  var dotpos = em.lastIndexOf(".");
  if (atpos<1 || dotpos<atpos+2 || dotpos+2>=em.length){
    alert("Indirizzo email non valido");
    event.preventDefault();
    return 0;
  }
  else
    return 1;
}

function onResponse(response)
{
  return response.json();

}

function onText(text)
{
  if(text.success==true)
  {
    alert('username già in uso');
  }
}

function controllo_username()
{
  var token= document.querySelector("meta[name='csrf-token']").getAttribute("content");

  const inserito = event.currentTarget.value;
  console.log(inserito);
  const formData = new FormData();
  formData.append('send', inserito);
  formData.append('_token', token);
  fetch(event.currentTarget.getAttribute("verifyUsername"), {body: formData, method: "post"}).then(onResponse).then(onText);
}

const campo_id=document.forms['form_signup'].Nome_Utente;
campo_id.addEventListener('blur', controllo_username);

// Riferimento al form
const form = document.forms['form_signup'];
// Aggiungi listener
form.addEventListener('submit', controllo_signup);
