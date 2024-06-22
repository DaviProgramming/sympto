<aside >

    <div class="aside-container">

        <div class="aside-container-head">
            <div class="aside-container-head-image">
                <img src="assets/logo-without-text.png" alt="">
            </div>
            
        </div>

        <div class="aside-container-body">

            <a href="/" class="aside-container-body-item <?php if($current_page == 'home') echo 'active'; ?>">
                <i class="fa-solid fa-house"></i> <span>Inicio</span> 
            </a>

            <a href="/nova-consulta" class="aside-container-body-item <?php if($current_page == 'nova-consulta') echo 'active'; ?>">
                <i class="fa-regular fa-calendar-plus"></i><span>Nova Consulta</span> 
            </a>

            <a class="aside-container-body-item">
                <i class="fa-solid fa-clipboard-check"></i><span>Consultas Realizadas</span> 
            </a>
            <a class="aside-container-body-item">
                <i class="fa-solid fa-clipboard-list"></i><span>consultas Agendadas</span>
            </a>
            <a class="aside-container-body-item">
                <i class="fa-solid fa-file-waveform"></i><span>Exames solicitados</span>
            </a>

        </div>

        <div class="aside-container-footer">
            <div class="aside-container-footer-item logout" id="logout">
                <i class="fa-solid fa-right-from-bracket"></i><span>Sair</span> 
            </div>
        </div>
    
    </div>
    
</aside>