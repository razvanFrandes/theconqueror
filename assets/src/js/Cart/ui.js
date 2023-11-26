export function updateCartDisplay(count) {
  const cartCountElement = document.querySelector(".count_cart");
  cartCountElement.textContent = count;
}

export function updateButtonStyle(button, isInCart) {
  button.textContent = isInCart ? "Remove challenge" : "Add challenge";
  if (isInCart) {
    button.classList.add("is-gold");
  } else {
    button.classList.remove("is-gold");
  }
}

