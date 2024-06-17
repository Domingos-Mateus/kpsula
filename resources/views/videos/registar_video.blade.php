@extends('layout.template')

@section('conteudo')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Adicionar um Vídeo </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/videos/listar_videos">Cancelar</a></li>
                    </ol>
                </nav>
            </div>

            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulário de Adição de Vídeo</h4>

                        <form action="/salvar_video" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Informações do Vídeo -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Link do Vídeo</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="link_video" placeholder="Link do Vídeo" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nome do Vídeo</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nome_video" placeholder="Nome do Vídeo" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Descrição</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="descricao" placeholder="Descrição do Vídeo" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect2">Seleciona um Módulo</label>
                                            <select name="modulo_id" class="form-select" id="exampleFormControlSelect2">
                                                @foreach ($modulos as $modulo)
                                              <option value="{{$modulo->id}}">{{$modulo->nome_modulo}}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Upload de Imagem -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Carregar Imagem</label>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="imagem" name="imagem" required>
                                                <label class="custom-file-label" for="imagem">Escolha uma imagem</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Botão de Submissão -->
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary" type="submit">Registrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2024 <a href="www.devaholic.ao" target="_blank">DevAholic</a>. Todos os direitos reservados.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Feito com <i class="mdi mdi-heart text-danger"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
    <!-- page-body-wrapper ends -->

    <!-- CSS Personalizado para Upload de Imagem -->
    <style>
        .custom-file-input {
            display: none;
        }
        .custom-file {
            position: relative;
            display: inline-block;
            width: 100%;
        }
        .custom-file-label {
            display: inline-block;
            width: 100%;
            padding: 10px 12px;
            cursor: pointer;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            background-color: #f8f9fa;
            text-align: center;
        }
        .custom-file-label::after {
            content: 'Procurar...';
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background-color: #007bff;
            color: white;
            padding: 0.5em 1em;
            border-radius: 0.25rem;
        }
        .custom-file-label:hover::after {
            background-color: #0056b3;
        }
        .custom-file-input:focus ~ .custom-file-label {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
    </style>

    <!-- JavaScript para Atualizar Nome do Arquivo Selecionado -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var fileInputs = document.querySelectorAll('.custom-file-input');
            fileInputs.forEach(function(input) {
                input.addEventListener('change', function(e) {
                    var fileName = e.target.files[0].name;
                    var label = e.target.nextElementSibling;
                    label.innerText = fileName;
                });
            });
        });
    </script>
@endsection
