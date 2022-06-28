
function invio_dati()
{
    event.preventDefault();
    var url = form.getAttribute("action");
    const regole=document.querySelector('#struttura_ricerca');
    regole.classList.add('hidden');
    servizio=form.servizi.value;
    const contenuto=form.contenuto.value;
    if(contenuto=='')
    {
        fetch(url +"?contenuto="+"&servizio="+servizio).then(onResponse).then(onJson);
    }
    else
    fetch(url+"?contenuto="+contenuto+"&servizio="+servizio).then(onResponse).then(onJson);
}

function onResponse(response)
{
    return response.json();
}

function onJson(json)
{
    const risultato = document.querySelector('#visualizza_risultati');
    risultato.innerHTML= '';
    if(servizio=='Carte Magic')
    {
        for(let i=0; i<100; i++)
        {
            const carte=json.cards[i];
            const img_url=carte.imageUrl;
            if(img_url)
            {
                const img=document.createElement('img');
                img.src=img_url;
                risultato.appendChild(img);
                img.addEventListener('click',scelta);
            }
        }
    }
    else if(servizio=='NASA')
    {
        const immagine=json;
        const img_url=immagine.hdurl;
        if(img_url)
        {
            const img=document.createElement('img');
            img.src=img_url;
            risultato.appendChild(img);
            img.addEventListener('click',scelta);
        }
    }
}

function scelta(event)
{
    const carta= createImage(event.currentTarget.src);
    modal.appendChild(carta);
    modal.classList.remove('hidden');
    carta.addEventListener('click',close_modal_view);
}

function createImage(src)
{
    const image = document.createElement('img');
    image.src = src;
    contenuto_multimediale=src;
    return image;
}

function close_modal_view(){
    const carta=event.currentTarget;
    modal.removeChild(carta);
    modal.classList.add('hidden');
}

function condividi_post(event)
{
    event.preventDefault();
    var url = form_post.getAttribute("action");
    fetch(url +"?send_content="+contenuto_multimediale+'&descrizione='+descrizione_post.value+'&servizio='+servizio);
    window.location="/search_content";
    //window.location="/romanello_daniele/PortingHw1/public/search_content";
}

let contenuto_multimediale;
let servizio;
const form_post = document.forms['post'];
const descrizione_post = form_post.descrizione;
form_post.addEventListener('submit', condividi_post);
const modal = document.querySelector('#modal_view');
const form = document.forms['ricerca'];
form.addEventListener('submit', invio_dati);
