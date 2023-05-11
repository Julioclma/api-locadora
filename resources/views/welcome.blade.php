<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<style>

    nav{ 
        display: flex;
        justify-content: space-between;
    }
    </style>
    
    
    <h1>Biblioteca Digital</h1>
    <header>
    
        <nav>
           
    
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
    

{{-- <form>
    @csrf
    <input type="text" name="name" placeholder="Insira seu nome...">
    <input type="text" name="cpf" placeholder="Insira seu CPF...">
    <button id="btn-cadastrar" type="submit">Cadastrar</button>
</form> --}}

<!-- <a href="#" onclick="listarUsuarios()">Listar usuários</a> -->


<div id="list"></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
    // window.listarUsuarios = function() {

    //     const url = "http://127.0.0.1:8000/api/persons";

    //     const response = fetch(url)
    //         .then(response => response.json()
    //             .then(data => list(data)));
                
    //     function list(data) {
    //         $("#list").html("");
    //         for (const key in data) {
    //             $("#list").append(`<div>${data[key].name}</div>`);
    //         }

    //     }
    // // }

  
</script>
