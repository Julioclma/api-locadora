<style>#side-menu li a{
    color:white;
}
</style>
 <div class="container-fluid" id="side-menu">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Biblioteca Digital</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        {{-- <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li> --}}
                        <li>
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Livros</span> </a>
                            <ul class="collapse show nav flex-column ms-3" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="{{route('livros')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Listar Livros</span></a>
                                </li>
                                <li>
                                    <a href="{{route('cadastrar-livro')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Cadastrar Livro</span></a>
                                </li>
                                
                            </ul>
                        </li>

                       

                      
                        <li>
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Aluguel</span></a>
                            <ul class="collapse nav flex-column ms-3" id="submenu2" data-bs-parent="#menu">
                                <li class="w-100">
                                        <a href="{{route('registrar-retirada')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Registrar Aluguel</span></a>
                                </li>
                                
                                <li>
                                    <a href="{{route('alugar-livro')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Alugados</span></a>
                                </li>
                                <li>
                                    <a href="{{route('livros-atrasados')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Atrasados</span></a>
                                </li>

                                <li>
                                    <a href="{{route('livros-devolvidos')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Devolvidos</span></a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Usuários</span></a>
                            <ul class="collapse nav flex-column ms-3" id="submenu3" data-bs-parent="#menu">
                                
                                <li class="w-100">
                                    <a href="{{route('cadastro-pessoas')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Cadastrar Usuário</span></a>
                                </li>
                                <li>
                                    <a href="{{route('pessoas')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Listar Usuários</span></a>
                                </li>

                                
                            </ul>
                        </li>
                       
                       
                    </ul>
                    
                  
                </div>
            </div>
           
  