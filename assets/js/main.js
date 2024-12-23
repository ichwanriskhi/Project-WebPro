document.addEventListener("DOMContentLoaded", function () {
    // Ambil semua elemen nav-link di sidebar
    const navLinks = document.querySelectorAll("#sidenav-main .nav-link");
    const currentURL = window.location.pathname; // Ambil URL saat ini

    // Loop melalui setiap nav-link
    navLinks.forEach(link => {
        const linkURL = new URL(link.href).pathname; // Ambil URL dari elemen <a>

        if (linkURL === currentURL) {
            // Tambahkan kelas aktif ke link yang URL-nya cocok dengan URL saat ini
            link.classList.add("active", "text-white");
            link.classList.remove("text-dark");
        } else {
            // Reset kelas untuk elemen lainnya
            link.classList.remove("active", "text-white");
            link.classList.add("text-dark");
        }
    });
});
