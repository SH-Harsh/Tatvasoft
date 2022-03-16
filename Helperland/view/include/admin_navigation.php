<?php  $base_url = "http://localhost/helperland/"; ?>

<header>
    <nav style="display: flex;">
        <div class="logo">
            <p class="helperland_logo">helperland</p>
        </div>
        <div style="width: 100%;">
            <ul class="nav_items">
                <li>
                    <img src="assets/images/person_logo.png" alt="person_logo" class="person_logo">
                </li>
                <li>
                    <p class="person_name"><?php echo $_SESSION["name"] ?></p>
                </li>
                <li>
                    <a href="<?= "$base_url?function=logout"; ?>">
                        <img src="assets/images/logout.png" alt="logout" class="person_logo" style="margin-top: 20px;">
                    </a>

                </li>
            </ul>
        </div>

    </nav>
</header>