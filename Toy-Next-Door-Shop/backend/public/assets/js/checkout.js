
document.addEventListener("DOMContentLoaded", function () {
    const amountInput = document.getElementById("amount");
    const productPriceElement = document.getElementById("display-price");
    const totalPriceElement = document.getElementById("total-price");
    const priceInput = document.getElementById("price");
    const increaseBtn = document.getElementById("increase");
    const decreaseBtn = document.getElementById("decrease");

    function updateTotalPrice() {
        const price = parseFloat(
            productPriceElement.textContent.replace("฿", "")
        );
        const amount = parseInt(amountInput.value, 10);
        const total = price * amount;
        totalPriceElement.innerHTML = `<bdi>฿ ${total.toFixed(2)}</bdi>`;
        totalPriceElement.style.fontWeight = 500;
        totalPriceElement.style.fontSize = "1.2em";
        priceInput.value = total.toFixed(2); // Update the hidden input field with total price
    }

    amountInput.addEventListener("input", updateTotalPrice);
    increaseBtn.addEventListener("click", function () {
        amountInput.value = parseInt(amountInput.value, 10) + 1;
        updateTotalPrice();
    });
    decreaseBtn.addEventListener("click", function () {
        if (amountInput.value > 1) {
            amountInput.value = parseInt(amountInput.value, 10) - 1;
            updateTotalPrice();
        }
    });

    updateTotalPrice();
});

document.getElementById('showQrButton').addEventListener('click', function () {
    var qrCodeModal = new bootstrap.Modal(document.getElementById('qrCodeModal'));
    qrCodeModal.show();
});
