const heroBtn = document.getElementById("heroBtn");

if (heroBtn) {
    heroBtn.addEventListener("click", function () {
        const productsSection = document.getElementById("products");

        if (productsSection) {
            productsSection.scrollIntoView({
                behavior: "smooth"
            });
        }
    });
}

const cartButtons = document.querySelectorAll(".product-card button");

cartButtons.forEach(function (button) {
    button.addEventListener("click", function () {
        alert("محصول به سبد خرید اضافه شد!");
    });
});
