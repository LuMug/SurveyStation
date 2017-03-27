<div class="page-sidebar sidebar">
    <div class="page-sidebar-inner slimscroll">
        <ul class="menu accordion-menu">
            <li class="<?php if($globals['page'] == 'Home') echo 'active'; ?>"><a href="/surveystation/" class="waves-effect waves-button"><span class="menu-icon icon-home"></span><p>Home</p><?php if($globals['page'] == 'home') echo '<span class="active-page"></span>'; ?></a></li>
            <li class="<?php if($globals['page'] == 'Shake') echo 'active'; ?>"><a href="/surveystation/shake" class="waves-effect waves-button"><span class="menu-icon icon-user"></span><p>Sismografo</p><?php if($globals['page'] == 'shake') echo '<span class="active-page"></span>'; ?></a></li>
            <li class="<?php if($globals['page'] == 'Temperatura') echo 'active'; ?>"><a href="profile.html" class="waves-effect waves-button"><span class="menu-icon icon-user"></span><p>Temperatura</p><?php if($globals['page'] == 'temp') echo '<span class="active-page"></span>'; ?></a></li>
        </ul>
    </div>
</div>
