//search bar
const form = document.getElementById('search-form');

form.addEventListener('submit', function(e){
    e.preventDefault();

    const token =document.querySelector('meta[name="csrf-token"]').content;
    
    const url = this.getAttribute('action');
    
    const query = document.getElementById('query').value;
    
    fetch(url, {
        headers: {
            'Content-Type':'application/json',
            'X-CSRF-TOKEN':token
        },
        method:'post',
        body:JSON.stringify({
            query:query
        })
    }).then(response => {
        response.json().then(data =>{

            const posts = document.getElementById('posts');
            posts.innerHTML = '';

            Object.entries(data)[0][1].forEach(element => {
                posts.innerHTML += `
                <div class="bg-white shadow p-3 rounded lg:w-64">
                  <div>
                    <div style="background-image: url('${element.image_path}')"
                        class="bg-cover bg-center bg-gray-300 h-32 rounded">
                    </div>
                  </div>
                  <div class="mt-6">
                    <p class="text-lg text-bold tracking-wide text-gray-600 mb-2">
                    <h1>${element.title}</h1>
                    </p>
                    <p class="text-sm text-gray-600 font-hairline">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </p>
                  </div>
                  <div class="mt-6">
                    <button class="rounded shadow-md flex items-center shadow bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">
                    <a href="/annonces/${element.slug}">${element.price}</a>
                    </button>
                  </div>
              </div>`
               

            })
        })
    }).catch(error => {
        console.log(error);
    })
    
})
//select categorie
const Form = document.querySelector('#categories');
document.querySelectorAll('#categories select').forEach( select => {
    select.addEventListener('change', () => {
        const Data = new FormData(FiltersForm);
        console.log('je suis Data : ' + Data);
        const UrlParams = new URLSearchParams();
        console.log('je suis UrlParams :' + UrlParams);

        Data.forEach((value, key) => {
            UrlParams.append(key,value);
        })

        const Url = new URL(window.location.href);

        fetch(Url.pathname + '?' + UrlParams.toString() + '&ajax=1', {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        }).then(response => 
            response.json()
        ).then( data => {
            // La div ou tu affichera le contenu. 
            const content = document.querySelector('#content');
            content.innerHTML = data.content;

            history.pushState({}, null, Url.pathname + '?' + UrlParams.toString());

        }).catch(e => alert(e));
    })
})