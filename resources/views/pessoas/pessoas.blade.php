<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<style>

nav{ 
    display: flex;
    justify-content: space-between;
}
</style>


       

        @include('header')
        <h2>Usuários</h2>
        <div class="col-sm p-3 min-vh-100">
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
        </div>

    </div>
</div>

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