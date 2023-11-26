import { globalState } from "./main.js";

export function updateCartItemPrice() {
  const quantityInputs = document.querySelectorAll("[data-quantity-id]");

  quantityInputs.forEach((input) => {
    input.addEventListener("input", function () {
      const itemId = input.dataset.quantityId;
      const price = parseFloat(input.dataset.price);
      const quantity = parseInt(input.value);
      const totalElement = document.querySelector(`[data-total="${itemId}"]`);

      if (totalElement) {
        const total = price * quantity;
        totalElement.textContent = total.toFixed(2) + "$";
        updateGlobalState(itemId, quantity, total);
      }
    });
  });
}

function updateGlobalState(itemId, quantity, total) {

  let cart = globalState.getState().cart;
  cart = cart.map((item) => {
    if (item.id === itemId) {
      return { ...item, quantity: quantity, total: total };
    }
    return item;
  });
  globalState.setState({ cart: cart });
}
