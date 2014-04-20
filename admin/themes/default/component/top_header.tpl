<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li class="" >
            <a title="" href="index.php?page=user&act=my_profile">
                <i class="icon icon-user"></i> <span class="text">Profil</span>
            </a>
        </li>
        <li class=" dropdown" id="menu-messages">
            <a href="index.php?page=messages">
                <i class="icon icon-envelope"></i> 
                <span class="text">Pesan</span>

                {if $total_messages > 0}
                    <span class="label label-important">{$total_messages}</span>
                {/if}

            </a>
        </li>
        <li class=""><a title="" href="index.php?page=logout"><i class="icon icon-share-alt"></i> <span class="text">Keluar</span></a></li>
    </ul>
</div>
<!--close-top-Header-menu-->