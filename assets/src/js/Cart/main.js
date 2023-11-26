// main.js
import { addToCart, removeFromCart } from "./cart.js";
import { updateCartDisplay, updateButtonStyle } from "./ui.js";
import { Cookie } from "../Helpers/Cookies.js";
import { updateCartItemPrice } from "./updateCartItemPrice.js";
import { updateGrandTotal } from "./updateGrandTotal.js";
export const globalState = {
  data: {
    cart: [],
  },
  listeners: [],

  getState() {
    return this.data;
  },

  setState(newState) {
    this.data = { ...this.data, ...newState };
    this.listeners.forEach((listener) => listener(this.data));
    Cookie.set("cart", JSON.stringify(this.data.cart), 7);
  },

  loadCartFromCookie() {
    const savedCart = Cookie.get("cart");
    if (savedCart) {
      this.data.cart = JSON.parse(savedCart);
    }
  },

  subscribe(listener) {
    this.listeners.push(listener);
    listener(this.data);

    return () => {
      this.listeners = this.listeners.filter((l) => l !== listener);
    };
  },
};

globalState.loadCartFromCookie();

document.querySelectorAll(".add-to-cart-button").forEach((button) => {
  button.addEventListener("click", () => {
    const itemId = button.getAttribute("data-id");
    const itemPrice = button.getAttribute("data-price");
    const cart = globalState.getState().cart;
    const isInCart = cart.some((cartItem) => cartItem.id === itemId);

    if (isInCart) {
      const newCart = removeFromCart(cart, itemId);
      globalState.setState({ cart: newCart });
      updateButtonStyle(button, false);

      if (button.classList.contains("is-cart")) {
        const cartItem = button.closest(".cart-item");
        if (cartItem) {
          cartItem.remove();
        }
      }
    } else {
      const item = { id: itemId, price: itemPrice };
      const newCart = addToCart(cart, item);
      globalState.setState({ cart: newCart });
      updateButtonStyle(button, true);
    }
  });
});

globalState.subscribe((state) => {
  updateCartDisplay(state.cart.length);
  document.querySelectorAll(".add-to-cart-button").forEach((button) => {
    const itemId = button.getAttribute("data-id");
    const isInCart = state.cart.some((cartItem) => cartItem.id === itemId);
    updateButtonStyle(button, isInCart);
  });
  if (document.querySelector("#order_total")) {
    updateGrandTotal();
  }
});

if (document.querySelector("#order_total")) {
  updateGrandTotal();
}

updateCartItemPrice();
