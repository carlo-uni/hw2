home();

function home()
{
    const url = document.getElementById('modal_view').getAttribute("url");
    console.log(url);
    fetch(url).then(onResponse).then(onJson);
}

function onResponse(response)
{
    return response.json();
}

function onJson(json)
{
    const spazio_post=document.querySelector('section');
    spazio_post.innerHTML='';
    console.log(json);
    for(let i of json)
    {
        const singolo_post=document.createElement('div');
        const descrizione=document.createElement('div');
        const contenuto=document.createElement('img');
        const utente=document.createElement('span');
        const data=document.createElement('span');
        const intestazione=document.createElement('div');
        const icona_like=document.createElement('img');
        const n_like=document.createElement('span');
        descrizione.textContent=i.descrizione;
        contenuto.src=i.contenuto_multimediale;
        contenuto.classList.add('contenuto');
        n_like.dataset.id_post=i.id_post;
        utente.textContent=i.id_utente;
        n_like.textContent=i.numero_like;
        data.textContent=i.data_pubblicazione;
        icona_like.classList.add('pointer');
        n_like.classList.add('pointer');
        if(i.liked==0)
        {
            icona_like.src="../icons/like.png";
        }
        else
        {
            icona_like.src="../icons/piaciuto.png";
        }
        icona_like.dataset.id_post=i.id_post;
        singolo_post.classList.add('single_post');
        intestazione.appendChild(utente);
        intestazione.appendChild(data);
        singolo_post.appendChild(intestazione);
        singolo_post.appendChild(contenuto);
        singolo_post.appendChild(descrizione);
        singolo_post.appendChild(icona_like);
        singolo_post.appendChild(n_like);
        spazio_post.appendChild(singolo_post);
        icona_like.addEventListener('click',ilike);
        n_like.addEventListener('click',show_like);
    }
}

function show_like()
{
    const current=event.currentTarget;
    const id_post=current.dataset.id_post;
    const url = document.getElementById('modal_view');
    route_url = url.dataset.url_show_like;
    console.log(route_url);
    fetch(route_url+"?id_post="+id_post).then(onResponse).then(onLike);
}

function onLike(json)
{
    for(let i of json)
    {
        console.log(json);
        const user=document.createElement('span');
        const immagine=document.createElement('img');
        const utente=document.createElement('div');
        //const folder="../storage/app/public/"+i.avatar;
        const folder="../storage/"+i.avatar;
        user.textContent=i.id;
        immagine.src= folder;
        utente.appendChild(immagine);
        utente.appendChild(user);
        modal.classList.add('utente');
        modal.appendChild(utente);
        modal.classList.remove('hidden');
        modal.addEventListener('click',close_modal_view);
    }
}

function close_modal_view(){
    const modale=event.currentTarget;
    modal.innerHTML='';
    modale.classList.add('hidden');
}


async function ilike()
{
    console.log('cliccato');
    const post_piaciuto=event.currentTarget;
    const id_post=post_piaciuto.dataset.id_post;
    const url = document.getElementById('modal_view');
    route_url = url.dataset.url_like;
    await fetch(route_url+"?id_post="+id_post);
    home();
}
const modal = document.querySelector('#modal_view');
