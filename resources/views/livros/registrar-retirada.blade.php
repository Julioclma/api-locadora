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
    
    
    <h1>Retirando...</h1>
    
    <header>
    
        <nav>
            <div id="links">
                <ul>

                </ul>
            </div>
    
            
            <div id="links-to-actions"> 
                <ul>
                    <li><a href="{{route('home')}}">Home</a>
                    <li><a href="{{route('pessoas')}}">Pessoas</a></li>
                    <li><a href="{{route('livros')}}">Livros</a></li>
                    <li><a href="{{route('alugar-livro')}}">Livros Alugados</a></li>
                    <li><a href="{{route('livros-atrasados')}}">Livros Em atraso</a></li>
                    <li><a href="{{route('livros-devolvidos')}}">Livros Devolvidos</a></li>
                </ul>
        </div>
          
        </nav>
    
       
    
    </header>
    
    <fieldset>
    <legend>Registrar retirada</legend>
    <form id="#form-registrar-retirada" action="http://127.0.0.1:8000/api/aluguel-livros" method="POST">
        @csrf
        <div>
            <label>Livros: </label>
        <select id="livros-disponiveis" name="fk_livro"><option value="null">Selecione o Livro:</option></select>
    </div>

    <div>
        <label>Pessoas: </label>
    <select id="pessoas-cadastradas" name="fk_user"><option value="null">Selecione a Pessoa:</option></select>
</div>

<div>
    <label>Devolver até dia: </label>
    
<input type="date" name="data_limite_devolucao"/>

<input hidden type="number" name="devolvido" value="0"/>
</div>

<button id="btn-registrar">Registrar retirada</button>
    </form>
</fieldset>
    <div id="message"></div>
    
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