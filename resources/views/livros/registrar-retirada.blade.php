<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<style>

    nav{ 
        display: flex;
        justify-content: space-between;
    }

    form div{
        padding: 15px 0;
        display: flex;
        flex-direction: column;
    }

    </style>
        @include('header')


    
        <div class="col-sm p-3 min-vh-100">
    
            <h2>Retirando livro ...</h2>
 
    
    <fieldset>

    <form id="#form-registrar-retirada" action="http://127.0.0.1:8000/api/aluguel-livros" method="POST">
        @csrf
        <div>
            <label>Livros: </label>
        <select class="form-select form-control-sm" id="livros-disponiveis" name="fk_livro"><option value="null">Selecione o Livro:</option></select>
    </div>

    <div>
        <label>Pessoas: </label>
    <select class="form-select form-control-sm" id="pessoas-cadastradas" name="fk_user"><option value="null">Selecione a Pessoa:</option></select>
</div>

<div>
    <label>Devolver até dia: </label>
    
<input class="form-control" type="date" name="data_limite_devolucao"/>

<input hidden type="number" name="devolvido" value="0"/>
</div>

<button id="btn-registrar" class="btn btn-primary">Registrar retirada</button>
    </form>
</fieldset>
    <div id="message"></div>

</div></div></div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
    
    
    //REQUEST API PARA CONSUMIR LIVROS
        const responseLivros = fetch("http://127.0.0.1:8000/api/livros")
            .then(response => response.json()
                .then(data => listLivros(data)));

                function listLivros(data) {
                    for (const key in data) {
                        if(data[key].quantity > 0){
                            $("#livros-disponiveis").append(`<option value="${data[key].id}">${data[key].name}</option>`);
                        }
                    }
                }
        //FINAL LIVROS

         
    //REQUEST API PARA CONSUMIR PESSOAS
    const responsePessoas = fetch("http://127.0.0.1:8000/api/persons")
        .then(response => response.json()
            .then(data => listPessoas(data)));
            
            function listPessoas(data) {
                for (const key in data) {
                        $("#pessoas-cadastradas").append(`<option value="${data[key].id}">${data[key].email}</option>`);
                }
            }
    //FINAL PESSOAS

    </script>