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
    <h2>Cadastrar livro...</h2>
    

    
    <fieldset>

    <form id="#form-registrar-pessoa" action="http://127.0.0.1:8000/api/livros" method="POST">
        @csrf
        <div>
            <label>Nome do Livro: </label>
        <input type="text" name="name" class="form-control">
    </div>

    <div>
        <label>Quantidade: </label>
    <select name="quantity" id="quantidade-livro" class="form-select form-select-sm" aria-label=".form-select-sm example"> 

    </select>

</div>



<button class="btn btn-primary">Cadastrar Livro</button>
    </form>
</fieldset>
    <div id="message"></div>

</div></div></div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script>

    for (let i = 0; i <= 100; i++) {
                        $("#quantidade-livro").append(`<option value="${i}">${i}</option>`);
                }
  

    </script>