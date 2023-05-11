<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<style>

nav{ 
    display: flex;
    justify-content: space-between;
}
</style>


<h1>Pessoas</h1>

<header>

    <nav>
        <div id="links">
            <ul>
                <li><a href="{{route('cadastro-pessoas')}}">Cadastrar Pessoa</a></li>
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

<table class="table table-striped">
    <thead>
        <th scope="col">#Id</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Idade</th>
    </thead>
    <tbody>
      
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>


//REQUEST API PARA CONSUMIR USUÁRIOS
    const url = "http://127.0.0.1:8000/api/persons";

    const response = fetch(url)
        .then(response => response.json()
            .then(data => list(data)));
            
    function list(data) {

        for (const key in data) {
            $("table tbody").append(`<tr>
            <td scope="row">${data[key].id}</td>\
            <td>${data[key].name}</td>\
            <td>${data[key].email}</td>\
            <td>${data[key].age}</td>\
        </tr>`);


        }
    }

    list();
    //FINAL USUARIOS


</script>