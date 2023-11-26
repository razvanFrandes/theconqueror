import { globalState } from "./main.js";

export function updateGrandTotal() {
  const cart = globalState.getState().cart;
  let grandTotal = 0;
  console.log('caca')
  cart.forEach(item => {
      grandTotal += (item.price * (item.quantity || 1));
  });

  document.getElementById('order_total').textContent = `$${grandTotal.toFixed(2)} USD`;
}