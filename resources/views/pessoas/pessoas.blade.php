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
                <li><a href="#">Cadastrar Pessoa</a></li>
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

<table>
    <thead>
        <th>#Id</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Idade</th>
    </thead>
    <tbody>
      
    </tbody>
</table>

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
            <td>${data[key].id}</td>\
            <td>${data[key].name}</td>\
            <td>${data[key].email}</td>\
            <td>${data[key].age}</td>\
        </tr>`);


        }
    }

    list();
    //FINAL USUARIOS


</script>