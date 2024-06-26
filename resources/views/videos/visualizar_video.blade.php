@extends('layout.template')

@section('conteudo')

<div class="container-scroller">
    <br><br><br><br><br>
    <!-- partial -->
    <!-- Menu -->
    <div class="container-fluid page-body-wrapper">
        <div class="row">
            <!-- Exibição do Vídeo -->
            <div class="col-lg-8">
                <h3 class="page-title text-center">{{ $videos->nome_video }}</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    {!!$videos->link_video!!}
                </div>
                <p class="mt-4">{{ $videos->descricao }}</p>
            </div>
            <!-- Lista de Vídeos -->
            <div class="col-lg-4 mt-4 mt-lg-0">
                <h4 class="page-title">Outros Vídeos</h4>
                <ul class="list-group">
                    <li class="list-group-item">Lista de vídeos1</li>
                    <li class="list-group-item">Lista de vídeos2</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- main-panel ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../../assets/js/off-canvas.js"></script>
<script src="../../assets/js/misc.js"></script>
<script src="../../assets/js/settings.js"></script>
<script src="../../assets/js/todolist.js"></script>
<script src="../../assets/js/jquery.cookie.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<!-- End custom js for this page -->
@endsection
