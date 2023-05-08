<form>
    @csrf
    <input type="text" name="name" placeholder="Insira seu nome...">
    <input type="text" name="cpf" placeholder="Insira seu CPF...">
    <button id="btn-cadastrar" type="submit">Cadastrar</button>
</form>

<a href="#" onclick="listarUsuarios()">Listar usuários</a>


<div id="list"></div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
    // window.listarUsuarios = function() {

        const url = "http://127.0.0.1:8000/api/persons";

        const response = fetch(url)
            .then(response => response.json()
                .then(data => list(data)));
                
        function list(data) {
            $("#list").html("");
            for (const key in data) {
                $("#list").append(`<div>${data[key].name}</div>`);
            }

        }
    // }

    $("#btn-cadastrar").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '{{ route('persons') }}',
            data: $("form").serialize(),
            dataType: "json",
            sucess: function(data) {
                alert('ok');
            }
        })
    });
</script>
