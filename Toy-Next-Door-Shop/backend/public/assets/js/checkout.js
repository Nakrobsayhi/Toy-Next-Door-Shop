document.addEventListener("DOMContentLoaded", () => {
  const productDetailsContainer = document.getElementById("product-details");
  const productImgContainer = document.getElementById("product-img");
  const productPriceContainer = document.getElementById("product-price");
  const productIdContainer = document.getElementById("product-id");
  const productData = localStorage.getItem("selectedProduct");

  if (productData) {
    const product = JSON.parse(productData);

    // Clear previous content
    productDetailsContainer.innerHTML = "";
    productImgContainer.innerHTML = "";
    productPriceContainer.innerHTML = "";
    productIdContainer.innerHTML = "";

    // Create and append product name
    const productName = document.createElement("h4");
    productName.textContent = product.name;
    productName.style.fontSize = "18px";
    productName.style.fontWeight = "500";
    productDetailsContainer.appendChild(productName);

    // Create and append product ID
    const productId = document.createElement("p");
    productId.textContent = `SKU ${product.product_id}`;
    productId.style.color = "grey";
    productIdContainer.appendChild(productId);

    // Create and append product price
    const productPrice = document.createElement("p");
    productPrice.textContent = `฿ ${product.price.toLocaleString()}`; // Format price with commas
    productPrice.style.color = "black";
    productPrice.style.fontSize = "1.65em";
    productPrice.style.fontWeight = "500";
    productPriceContainer.appendChild(productPrice);

    // Create and append product image
    const productImage = document.createElement("img");
    productImage.src = `http://localhost:8000/backend/product/${product.image}`;
    productImage.alt = product.name;
    productImage.style.width = "90%"; // Set width
    productImgContainer.appendChild(productImage);
  } else {
    console.error("No selected product found.");
  }
});

document.getElementById('update-cart-button').addEventListener('click', function() {
    // Show confirmation dialog
    const confirmOrder = confirm('Are you sure you want to place this order?');

    // If the user cancels the action, stop further execution
    if (!confirmOrder) {
        return;
    }

    // Get the form data
    const formData = new FormData(document.getElementById('data-form'));

    // Convert form data to a plain object
    const formObject = Object.fromEntries(formData.entries());

    // Retrieve and parse selectedProduct from localStorage
    const selectedProduct = JSON.parse(localStorage.getItem('selectedProduct'));

    // Extract the product_id from selectedProduct
    const productId = selectedProduct ? selectedProduct.product_id : null;

    // Add the product_id to the form data object
    const requestData = {
        ...formObject,
        product_id: productId
    };

    fetch('http://127.0.0.1:8000/api/orders', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify(requestData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Order saved successfully! ');
        } else {
            alert('Failed to save the order.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

