
function cerca_utenti(event)
{
    event.preventDefault();
    var url = ricerca.getAttribute("action");
    const titolo=document.querySelector('main h1');
    titolo.classList.add('hidden');
    const utente=ricerca.utente_cercato.value;
    if(utente.value!==null)
    {
        fetch(url +"?utente_cercato="+utente).then(onResponse).then(onJson);
    }
    else
    fetch(url+"?").then(onResponse).then(onJson);
}

function onResponse(response)
{
    return response.json();
}

function onJson(json)
{
    const risultato_ricerca=document.querySelector('section');
    risultato_ricerca.innerHTML= '';
    for(let i of json)
    {
        const username=document.createElement('span');
        const immagine=document.createElement('img');
        const segui=document.createElement('img');
        const utente=document.createElement('div');
        username.textContent=i.id;
        const url=i.avatar;
        //immagine.src="../storage/app/public/"+url;
        immagine.src='../storage/'+ url;
        immagine.classList.add('img');
        segui.src='../icons/segui.png';
        segui.classList.add('pointer');
        segui.dataset.id=username.textContent;
        utente.classList.add('div');
        utente.appendChild(immagine);
        utente.appendChild(username);
        utente.appendChild(segui);
        risultato_ricerca.appendChild(utente);
        segui.addEventListener('click',segui_utente);
    }
}

function segui_utente()
{
    const segui=event.currentTarget;
    const id_seguito=segui.dataset.id;
    fetch("/follow_user?id="+id_seguito).then(controllo).then(onText);
}

function controllo(response)
{
  return response.text();

}

function onText(text)
{
    if(text=='true')
    {
        alert('Utente seguito');
    }
    else alert('Utente non seguito');
}

const ricerca=document.forms["form_ricerca"];
ricerca.addEventListener('submit',cerca_utenti);
