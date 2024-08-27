async function fetchAndDisplayProducts(category = 'all') {
    const API_BASE_URL = "http://localhost:8000/api";
    const productList = document.getElementById("shop-list");

    try {
        const response = await fetch(`${API_BASE_URL}/products`);
        if (!response.ok) {
            throw new Error("Network response was not ok");
        }
        const products = await response.json();

        // Clear existing list
        productList.innerHTML = "";

        let productCount = 0;

        // Iterate through products
        products.forEach((product) => {
            // Check if the product category matches the selected category or if showing all products
            if (category === 'all' || (product.cat && product.cat.name === category)) {
                const productContainer = document.createElement("div");
                productContainer.classList.add("product-item");

                // Product Image
                if (product.image) {
                    const productLink = document.createElement("a");
                    productLink.href = "product.html";

                    productLink.addEventListener("click", (event) => {
                        event.preventDefault();
                        localStorage.setItem("selectedProduct", JSON.stringify(product));
                        window.location.href = productLink.href;
                    });

                    const productImage = document.createElement("img");
                    productImage.src = `http://localhost:8000/backend/product/${product.image}`;
                    productImage.alt = product.name;
                    productImage.style.width = "225px";
                    productLink.appendChild(productImage);
                    productContainer.appendChild(productLink);
                }

                // Product Name
                const productName = document.createElement("h4");
                productName.textContent = product.name;
                productName.style.fontSize = "16px";
                productName.style.fontWeight = "normal";
                productContainer.appendChild(productName);

                // Product Price
                const productPrice = document.createElement("p");
                productPrice.textContent = `${product.price.toLocaleString()} บาท`;
                productPrice.style.color = "black";
                productPrice.style.textAlign = "left";
                productPrice.style.fontSize = "18px";
                productContainer.appendChild(productPrice);

                // Product Stock (only on product.html)
                if (window.location.pathname.includes("product.html")) {
                    const productStock = document.createElement("p");
                    productStock.textContent = `${product.amount} in stock`;
                    productContainer.appendChild(productStock);
                }

                // Append to the product list
                productList.appendChild(productContainer);
            }

            if (product < 3) {
                productList.appendChild(productContainer);
                productCount++;
            }
        });
    } catch (error) {
        console.error("Error fetching products:", error);
    }
}

// Function to get query parameters
function getQueryParameter(name) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
}

// Function to set query parameters
function setQueryParameter(name, value) {
    const urlParams = new URLSearchParams(window.location.search);
    urlParams.set(name, value);
    history.replaceState(null, null, `?${urlParams.toString()}`);
}

// Function to handle category filter clicks
function setupCategoryFilter() {
    const categoryLinks = document.querySelectorAll('.category-link');

    categoryLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault();
            const category = link.dataset.category;
            setQueryParameter('category', category);
            fetchAndDisplayProducts(category);
        });
    });
}

// Call the function to fetch and display products initially
document.addEventListener("DOMContentLoaded", () => {
    const category = getQueryParameter('category') || 'all';
    fetchAndDisplayProducts(category);
    setupCategoryFilter();
});
