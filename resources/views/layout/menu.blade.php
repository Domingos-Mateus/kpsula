
<!-- br><br><br><br><br -->
      <!-- partial -->
      <!-- Menu -->
      <div class="container-fluid page-body-wrapper" style="margin-top: 50px;">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas bg-dark-my" id="sidebar">
          <ul class="nav pt-3">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="/assets/images/faces/face1.JPG" alt="profile" />
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>


                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">{{$usuario->name}}</span>
                  <span class="text-secondary text-small">{{$usuario->status}}</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/dashboard">
                <span class="menu-title">Página Inicial</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

            <!--
            @can('pode_visualizar_usuario')
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Usuários</span>
                <i class="menu-arrow"></i>
                <i class="fa fa-user-circle-o"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="/usuarios/listar_usuarios">Lista de Usuários</a>
                  </li>
                </ul>
              </div>
            </li>
            @endcan
            -->
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <span class="menu-title">Vídeos</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
              <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="/modulos/listar_modulos">Módulos</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#imagens" aria-expanded="false" aria-controls="icons">
                <span class="menu-title">Imagens & Logo</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
              <div class="collapse" id="imagens">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="/listar_banner">Meu Banner</a>
                  </li>
                </ul>
              </div>
              <div class="collapse" id="imagens">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="/listar_logo">Logo</a>
                  </li>
                </ul>
              </div>
            </li>

            @can('pode_visualizar_permissao')
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <span class="menu-title">Permissões</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
              <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="/permissions_roles">Permissões</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/roles_users">Perfil</a>
                  </li>
                </ul>
              </div>
            </li>
            @endcan
            @can('pode_visualizar_plano')
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <span class="menu-title">Planos</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
              <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="/planos/listar_planos">Listar Planos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/plano_usuario/plano_individual_user">Meu Plano</a>
                  </li>
                  @can('pode_registrar_plano')
                  <li class="nav-item">
                    <a class="nav-link" href="/plano_usuario/listar_plano_usuario">Plano dos Usuários</a>
                  </li>
                  @endcan
                </ul>
              </div>
            </li>
            @endcan
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">Páginas do Usuário</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-lock menu-icon"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">

                  <li class="nav-item">
                    <a class="nav-link" href="/usuarios/listar_usuarios"> Usuário </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"> Registro de Usuário </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" target="_blank">
                <span class="menu-title">Documentação</span>
                <i class="mdi mdi-file-document-box menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
        <!-- Menu -->
        <!-- partial -->
