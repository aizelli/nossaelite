<nav class="top-bar" data-topbar role="navigation" data-options="is_hover: false">
    <ul class="title-area">
        <li class="name">
            <h1><a href="#">Painle Admin</a></h1>
        </li>
        <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>

    <section class="top-bar-section">


        <!-- Left Nav Section -->
        <ul class="left">

            <li class="has-dropdown">
                <a href="#">Cadastros</a>
                <ul class="dropdown">
                    <li><a href="{{URL::to('/painel/cadastro/eventos')}}">Eventos</a></li>
                    <li><a href="{{URL::to('/painel/cadastro/noticias')}}">Noticias</a></li>
                </ul>
            </li>
            <li class="has-dropdown">
                <a href="#">Relatórios</a>
                <ul class="dropdown">
                    <li><a href="{{URL::to('/painel/relatorio/eventos')}}">Eventos</a></li>
                    <li><a href="{{URL::to('/painel/relatorio/noticias')}}">Noticias</a></li>
                </ul>
            </li>
        </ul>
    </section>
</nav>