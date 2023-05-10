<style>

    nav{ 
        display: flex;
        justify-content: space-between;
    }

    .disable{
        display: none;
        }
    </style>
    
    
    <h1>Livros Alugados</h1>
    
    <header>
    
        <nav>
            <div id="links">
                <ul>
                    <li><a href="#">Registrar retirada</a></li>

                </ul>
            </div>
    
            
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
    
    <div id="message"></div>
    <table class="disable">
        <thead>
            <th>#Id</th>
            <th>ID livro</th>
            <th>ID pessoa</th>
            <th>Retirado EM</th>
            <th>Data Limite para Devolução</th>

        </thead>
        <tbody>
        
        </tbody>
    </table>
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
    
    
    //REQUEST API PARA CONSUMIR LIVROS
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
                <td>${data[key].id}</td>\
                <td>${data[key].fk_livro}</td>\
                <td>${data[key].fk_user}</td>\
                <td>${dataAtualFormatada(data[key].created_at)}</td>\
                <td>${ dataAtualFormatada(data[key].data_limite_devolucao) }</td>\
            </tr>`);
    
    
            }
        }
    
        list();
        //FINAL LIVROS

        function dataAtualFormatada(data){
    var data = new Date(data),
        dia  = data.getDate().toString().padStart(2, '0'),
        mes  = (data.getMonth()+1).toString().padStart(2, '0'), //+1 pois no getMonth Janeiro começa com zero.
        ano  = data.getFullYear();
    return dia+"/"+mes+"/"+ano;
}
    
    
    </script>