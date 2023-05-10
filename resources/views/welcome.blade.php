

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
                    <li><a href="{{route('alugar-livro')}}">Retirar Livro</a></li>
                    <li><a href="{{route('livros-atrasados')}}">Livros Em atraso</a></li>
                    <li><a href="{{route('livros-devolvidos')}}">Devolver Livro</a></li>
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
