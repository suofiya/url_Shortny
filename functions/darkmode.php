<a id="dark-mode-btn" title="Toggle night mode" href="javascript:void(0)" onclick="toggleNightMode(this)"><i class="fas fa-moon"></i></a>
<script>
    toggleNightMode("cookies")

    function toggleNightMode(e) {
        const body = document.querySelector("body");
        const button = document.querySelector("#dark-mode-btn");
        const logo = document.querySelector("#main-logo");
        if (window.innerWidth < 650) {
            body.append(button);
        }
        if (e == "cookies") {
            // HERE GOES IDB STUFF
            let now = document.cookie.split("dark=");
            now = now[1].split(";");
            if (Boolean(Number(now[0]))) {
                body.classList.add("dark-mode");
                button.classList.add("active");
                if (logo) {
                    logo.src = "<?php echo $logo_url[1]; ?>";
                }
            };

            return;
        };
        if (body.classList.toggle("dark-mode")) {
            document.cookie = "dark=1";
            if (logo) {
                logo.src = "<?php echo $logo_url[1]; ?>";
            }
        } else {
            document.cookie = "dark=0";
            if (logo) {
                logo.src = "<?php echo $logo_url[0]; ?>";
            }
        }
        button.classList.toggle("active");
    }
</script>