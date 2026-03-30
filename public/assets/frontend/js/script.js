// ==================== PASSWORD VISIBILITY ====================

const togglePasswordButtons = document.querySelectorAll(".toggle-password");
togglePasswordButtons.forEach((button) => {
    button.addEventListener("click", (e) => {
        e.preventDefault();

        // Find the input field - it should be a sibling in the input-wrapper
        const inputWrapper = button.closest(".input-wrapper");
        if (!inputWrapper) return;

        const passwordInput = inputWrapper.querySelector(
            'input[type="password"], input[type="text"]',
        );
        if (!passwordInput) return;

        const isPassword = passwordInput.type === "password";
        passwordInput.type = isPassword ? "text" : "password";
        button.classList.toggle("active");
    });
});

// ==================== CONTACT FORM ====================

const contactForm = document.getElementById("contactForm");
if (contactForm) {
    contactForm.addEventListener("submit", (e) => {
        e.preventDefault();

        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;
        const subject = document.getElementById("subject").value;
        const message = document.getElementById("message").value;
        const formMessage = document.getElementById("formMessage");

        // Simple validation
        if (!name || !email || !subject || !message) {
            showMessage(formMessage, "Please fill in all fields", "error");
            return;
        }

        if (!isValidEmail(email)) {
            showMessage(formMessage, "Please enter a valid email", "error");
            return;
        }

        // Simulate form submission
        showMessage(
            formMessage,
            "Thank you! We'll get back to you soon.",
            "success",
        );
        contactForm.reset();

        // Clear message after 5 seconds
        setTimeout(() => {
            formMessage.innerHTML = "";
            formMessage.classList.remove("success", "error");
        }, 5000);
    });
}

// ==================== FAQ ACCORDION ====================

const faqQuestions = document.querySelectorAll(".faq-question");
faqQuestions.forEach((question) => {
    question.addEventListener("click", () => {
        const faqItem = question.closest(".faq-item");

        // Close other items
        document.querySelectorAll(".faq-item.active").forEach((item) => {
            if (item !== faqItem) {
                item.classList.remove("active");
            }
        });

        // Toggle current item
        faqItem.classList.toggle("active");
    });
});

// ==================== PRICING TOGGLE ====================

const billingToggle = document.getElementById("billingToggle");
if (billingToggle) {
    billingToggle.addEventListener("change", () => {
        const starterPrice = document.getElementById("starter-price");
        const businessPrice = document.getElementById("business-price");
        const premiumPrice = document.getElementById("premium-price");

        if (billingToggle.checked) {
            // Annual pricing (20% discount)
            starterPrice.innerHTML = "$278<span>/year</span>";
            businessPrice.innerHTML = "$758<span>/year</span>";
            premiumPrice.innerHTML = "$1,908<span>/year</span>";
        } else {
            // Monthly pricing
            starterPrice.innerHTML = "$29<span>/month</span>";
            businessPrice.innerHTML = "$79<span>/month</span>";
            premiumPrice.innerHTML = "$199<span>/month</span>";
        }
    });
}

// ==================== MOBILE MENU ====================

const hamburger = document.getElementById("hamburger");
const navMenu = document.getElementById("navMenu");

if (hamburger) {
    hamburger.addEventListener("click", () => {
        navMenu.classList.toggle("active");
        hamburger.classList.toggle("active");
    });

    // Close menu when a link is clicked
    const navLinks = navMenu.querySelectorAll(".nav-link");
    navLinks.forEach((link) => {
        link.addEventListener("click", () => {
            navMenu.classList.remove("active");
            hamburger.classList.remove("active");
        });
    });

    // Close menu when clicking outside
    document.addEventListener("click", (e) => {
        if (!e.target.closest(".nav-container")) {
            navMenu.classList.remove("active");
            hamburger.classList.remove("active");
        }
    });
}

// ==================== SMOOTH SCROLL ====================

document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        const href = this.getAttribute("href");
        if (href !== "#" && document.querySelector(href)) {
            e.preventDefault();
            document.querySelector(href).scrollIntoView({
                behavior: "smooth",
                block: "start",
            });
        }
    });
});

// ==================== HELPER FUNCTIONS ====================

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function showMessage(element, message, type) {
    element.textContent = message;
    element.className = `form-message ${type}`;
}

function calculatePasswordStrength(password) {
    if (!password) return "";

    let strength = 0;

    // Length
    if (password.length >= 8) strength++;
    if (password.length >= 12) strength++;

    // Contains lowercase
    if (/[a-z]/.test(password)) strength++;

    // Contains uppercase
    if (/[A-Z]/.test(password)) strength++;

    // Contains numbers
    if (/[0-9]/.test(password)) strength++;

    // Contains special characters
    if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) strength++;

    if (strength < 2) return "weak";
    if (strength < 4) return "fair";
    return "strong";
}

// ==================== NAVIGATION ACTIVE STATE ====================

function updateActiveNavLink() {
    const currentPage =
        window.location.pathname.split("/").pop() || "index.html";
    const navLinks = document.querySelectorAll(".nav-link");

    navLinks.forEach((link) => {
        const href = link.getAttribute("href");

        if (
            currentPage === href ||
            (currentPage === "" && href === "index.html")
        ) {
            link.classList.add("active");
        } else {
            link.classList.remove("active");
        }
    });
}

// Update active link on page load
document.addEventListener("DOMContentLoaded", updateActiveNavLink);

// ==================== INTERSECTION OBSERVER FOR ANIMATIONS ====================

const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -100px 0px",
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.style.animation = "fadeInUp 0.6s ease-out forwards";
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

// Observe feature cards and price cards
document
    .querySelectorAll(".feature-card, .pricing-card, .reason-card")
    .forEach((card) => {
        card.style.opacity = "0";
        observer.observe(card);
    });

// ==================== FORM INPUT VALIDATION ====================

const emailInputs = document.querySelectorAll('input[type="email"]');
emailInputs.forEach((input) => {
    input.addEventListener("blur", () => {
        if (input.value && !isValidEmail(input.value)) {
            input.style.borderColor = "#EF4444";
        } else {
            input.style.borderColor = "";
        }
    });
});

// ==================== RESPONSIVE BEHAVIOR ====================

function handleResponsive() {
    const width = window.innerWidth;
    const navMenu = document.getElementById("navMenu");

    if (width > 640) {
        navMenu?.classList.remove("active");
        if (hamburger) hamburger.classList.remove("active");
    }
}

window.addEventListener("resize", handleResponsive);

// ==================== PAGE LOAD ANIMATIONS ====================

// Hide preloader after animation
document.addEventListener("DOMContentLoaded", () => {
    const card = document.querySelector(".card");
    if (!card) return; // safety check

    card.addEventListener("animationend", () => {
        const preloader = document.getElementById("preloader");
        if (!preloader) return;

        preloader.style.transition = "opacity 0.5s";
        preloader.style.opacity = "0";

        setTimeout(() => {
            preloader.style.display = "none";
            const mainContent = document.getElementById("main-content");
            if (mainContent) mainContent.style.display = "block";
        }, 500);
    });
});
