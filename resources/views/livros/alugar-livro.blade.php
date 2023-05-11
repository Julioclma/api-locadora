<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


<style>

    nav{ 
        display: flex;
        justify-content: space-between;
    }

    .disable{
        display: none;
        }

        #btn-close-modal-devolucao{
            border: none;
    background-color: transparent;
        }

        .modal-body div{
display: flex;
flex-direction: column;
padding: 10px 0;
        }

        .modal-body input{
            padding: 5px;
        }
    </style>
    
    
    <h1>Livros Alugados</h1>
    
    <header>
    
        <nav>
            <div id="links">
                <ul>
                    <li><a href="{{route('registrar-retirada')}}">Registrar Aluguel</a></li>

                </ul>
            </div>
    
            
            <div id="links-to-actions"> 
                <ul>
                    <li><a href="{{route('home')}}">Home</a>
                    <li><a href="{{route('pessoas')}}">Pessoas</a></li>
                    <li><a href="{{route('livros')}}">Livros</a></li>
                    <li><a href="{{route('alugar-livro')}}">Livros Alugados</a></li>
                    <li><a href="{{route('livros-atrasados')}}">Livros Em atraso</a></li>
                    <li><a href="{{route('livros-devolvidos')}}">Registro de Devoluções</a></li>
                </ul>
        </div>
          
        </nav>
    
       
    
    </header>
    
    <div id="message"></div>
    <table class="disable table table-striped">
        <thead>
            <th scope="col">#Id Aluguel</th>
            <th scope="col">ID livro</th>
            <th scope="col">ID pessoa</th>
            <th scope="col">Retirado EM</th>
            <th scope="col">Data Limite para Devolução</th>
<th scope="col">Ações</th>
        </thead>
        <tbody>
        
        </tbody>
    </table>


  <!-- Modal -->
  <div class="modal fade" id="ModalDevolucao" tabindex="-1" role="dialog" aria-labelledby="ModalDevolucaoTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Informações para Devolução</h5>
          <button type="button" id="btn-close-modal-devolucao" class="close btn-close-devolucao" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="PUT" action="">
        <div>
            <label>Livro: </label>
            <input id="nome-livro" type="text" readonly>
        </div> 

        <div>
            <label>Nome Pessoa: </label>
            <input id="nome-pessoa" type="text" readonly>
        </div>

        <div>
            <label>Email: </label>
            <input id="email-pessoa" type="text" readonly>
        </div>


        <div>
            <label>Data devolução: </label>
            <input id="data-devolucao" type="text" readonly>
        </div>
        </div>
        <div class="modal-footer">
          <div>
            <button type="button" class="btn btn-secondary btn-close-devolucao" data-dismiss="modal">Fechar</button>
        </div>
          <div id="btn-add-confirma">
            <a type="button" class="btn btn-primary" onclick="confirmarDevolucao()">Confirmar Devolução</a>
        </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
        $(function() {


            $(".btn-close-devolucao").on('click', function(){
                $("#ModalDevolucao").modal('hide');
            })
         
            
            window.confirmarDevolucao = function(idAluguel){

const url = `http://127.0.0.1:8000/api/registrar-devolucao/${idAluguel}`;

    const putMethod = {
 method: 'PUT', // Method itself
 headers: {
  'Content-type': 'application/json; charset=UTF-8' // Indicates the content 
 },
 body: JSON.stringify({idAluguel : idAluguel}) // We send data in JSON format
}

// make the HTTP put request using fetch api
fetch(url, putMethod)
.then(response => response.json())
.then(data => console.log(data)) // Manipulate the data retrieved back, if we want to do something with it
.catch(err => console.log(err)) // Do something with the error
}

        window.abrirModalDevolucao = function(idAluguel, idLivro, idUsuario){
        const url = `http://127.0.0.1:8000/api/livros/${idLivro}`;
    
   fetch(url).then(response => response.json().then(data => livro(data)));

            function livro(data){
                $("#nome-livro").val(data.name);
            }

            const urlPessoa = `http://127.0.0.1:8000/api/persons/${idUsuario}`;

            fetch(urlPessoa).then(response => response.json().then(data => pessoa(data)));

function pessoa(data){
    $("#nome-pessoa").val(data.name);
    $("#email-pessoa").val(data.email);
}

date = new Date();
year = date.getFullYear();
month = date.getMonth() + 1;
day = date.getDate();

$("#data-devolucao").val(day+"/"+month+"/"+year);

    $("#ModalDevolucao").modal('show');
    
$("#btn-add-confirma").html(`<a class="btn btn-primary" onclick="confirmarDevolucao(${idAluguel})">Confirmar Devolução</a>`);

}
        
    
    //REQUEST API PARA CONSUMIR ALUGUEL LIVROS
        const url = "http://127.0.0.1:8000/api/aluguel-livros";
    
        const response = fetch(url)
            .then(response => response.json()
                .then(data => list(data)));
                
        function list(data) {
    
          
    if(data.Message){
        $("#message").append(`${data.Message}`);
        return;
    }
    
    $("table").removeClass('disable');


            for (const key in data) {
                $("table tbody").append(`<tr>
                <th scope="row">${data[key].id}</th>\
                <td>${data[key].fk_livro}</td>\
                <td>${data[key].fk_user}</td>\
                <td>${dataAtualFormatada(data[key].created_at)}</td>\
                <td>${data[key].data_limite_devolucao }</td>\
                <td><a href="#" onclick="abrirModalDevolucao(${data[key].id}, ${data[key].fk_livro}, ${data[key].fk_user})">Registrar Devolução</a></td>\
            </tr>`);
    
    
            }
        }
    
        list();
        //FINAL LIVROS

        function dataAtualFormatada(data){
    var data = new Date(data),
        dia  = data.getDate(),
        mes  = (data.getMonth()+1).toString().padStart(2, '0'), //+1 pois no getMonth Janeiro começa com zero.
        ano  = data.getFullYear();
    return dia+"/"+mes+"/"+ano;
}



    
    });
    </script>