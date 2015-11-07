<div class="left">
    <div id="menu" class="menu">
        <div class="menu-title">
            <a href="<?php echo SITE_ROOT; ?>">
                <img src="<?php echo SITE_ROOT; ?>/public/img/logo.svg" alt="">
                <span>FinAppsParty</span>
            </a>
        </div>

        <div class="menu-profile">
            <div class="menu-profile-pic">
                <img src="<?php echo SITE_ROOT; ?>/public/img/Apolo.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="menu-profile-info">
                <span>Hola,</span>
                <h2><?php echo $data['username']; ?></h2>
            </div>
        </div>

        <div class="menu-content">
            <div class="menu_section">
                <ul class="menu-items">
                    <li><a href="<?php echo SITE_ROOT; ?>"><i class="fa fa-shield"></i> Sensores </a>
                    </li>
                    <li><a href="<?php echo SITE_ROOT; ?>/newsletters/view"><i class="fa fa-lightbulb-o"></i> Activadores</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>