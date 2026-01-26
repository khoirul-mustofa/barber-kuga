// ===================================
// GLOBAL INTERACTIVE FEATURES
// ===================================

document.addEventListener("DOMContentLoaded", function () {
    // Include Partial
    // fetch("partials/header.html")
    //     .then((res) => res.text())
    //     .then((html) => {
    //         document.getElementById("header").innerHTML = html;
    //         initMobileMenu();
    //         feadin();
    //     });
    initMobileMenu();
    feadin();
    // fetch("partials/footer.html")
    //     .then((res) => res.text())
    //     .then((html) => {
    //         document.getElementById("footer").innerHTML = html;
    //     });

    // 1. STICKY HEADER ON SCROLL
    const header = document.getElementById("header");

    if (header) {
        window.addEventListener("scroll", function () {
            if (window.scrollY > 50) {
                header.classList.add("scrolled");
            } else {
                header.classList.remove("scrolled");
            }
        });
    }

    // 2. MOBILE HAMBURGER MENU
    function initMobileMenu() {
        const hamburger = document.getElementById("hamburger");
        const navMenu = document.getElementById("navMenu");
        const navLinks = document.querySelectorAll(".nav-link");

        if (hamburger) {
            hamburger.addEventListener("click", function () {
                navMenu.classList.toggle("active");

                // Hamburger animation
                const spans = this.querySelectorAll("span");
                spans[0].style.transform = navMenu.classList.contains("active")
                    ? "rotate(45deg) translate(4px, 4px)"
                    : "none";
                spans[1].style.opacity = navMenu.classList.contains("active")
                    ? "0"
                    : "1";
                spans[2].style.transform = navMenu.classList.contains("active")
                    ? "rotate(-45deg) translate(6px, -5px)"
                    : "none";
            });
        }

        // Close menu when clicking a link
        navLinks.forEach((link) => {
            link.addEventListener("click", function () {
                navMenu.classList.remove("active");
                // Reset hamburger
                const spans = hamburger.querySelectorAll("span");
                spans.forEach((span) => (span.style.transform = "none"));
                spans[1].style.opacity = "1";
            });
        });
    }
    // 3. FADE-IN ANIMATION ON SCROLL
    function feadin() {
        const fadeElements = document.querySelectorAll(".fade-in");

        const fadeObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("visible");
                    }
                });
            },
            { threshold: 0.1 },
        );

        fadeElements.forEach((el) => fadeObserver.observe(el));
    }

    // 4. CONTACT FORM SUBMISSION (Simulated)
    const contactForm = document.getElementById("contactForm");
    if (contactForm) {
        contactForm.addEventListener("submit", function (e) {
            e.preventDefault();

            // Get form data
            const formData = new FormData(this);
            const name = formData.get("name");

            // Simulated success message
            alert(
                `Terima kasih, ${name}! Pesan Anda telah terkirim. Kami akan menghubungi Anda segera.`,
            );
            this.reset();
        });
    }

    // 5. JOURNAL SLIDER LOGIC
    const journalWrapper = document.getElementById("journalWrapper");
    const prevBtn = document.getElementById("prevJournal");
    const nextBtn = document.getElementById("nextJournal");

    if (journalWrapper && prevBtn && nextBtn) {
        const scrollAmount = 350;

        nextBtn.addEventListener("click", () => {
            journalWrapper.scrollBy({ left: scrollAmount, behavior: "smooth" });
        });

        prevBtn.addEventListener("click", () => {
            journalWrapper.scrollBy({
                left: -scrollAmount,
                behavior: "smooth",
            });
        });
    }
    // 6. LOCATION MAP HEADER CONTRAST
    const locationMap = document.querySelector(".location-map");

    if (locationMap && header) {
        const mapObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        header.classList.add("scrolled");
                        header.classList.add("map-visible");
                    } else {
                        header.classList.remove("map-visible");
                        // Do not remove 'scrolled' here as it's handled by window scroll logic
                    }
                });
            },
            { threshold: 0.1 },
        );

        mapObserver.observe(locationMap);
    }
});
