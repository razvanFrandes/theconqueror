import { Cookie } from "./Helpers/Cookies";

// Global State Object
const globalState = {
  data: {
    cart: [],
  },
  listeners: [],

  // Gets the current state
  getState() {
    return this.data;
  },

  // Sets the new state and updates listeners
  setState(newState) {
    this.data = { ...this.data, ...newState };
    this.listeners.forEach((listener) => listener(this.data));
    Cookie.set("cart", JSON.stringify(this.data.cart), 7); // Update cookie with cart data
  },

  // Subscribes a new listener
  subscribe(listener) {
    this.listeners.push(listener);
    listener(this.data); // Initialize listener with current state

    return () => {
      this.listeners = this.listeners.filter((l) => l !== listener);
    };
  },
};

// Load saved cart from cookie
const savedCart = Cookie.get("cart");
if (savedCart) {
  globalState.data.cart = JSON.parse(savedCart);
}

// Function to add item to cart
function addToCart(item) {
  const cart = globalState.getState().cart;
  if (!cart.some((cartItem) => cartItem.id === item.id)) {
    globalState.setState({ cart: [...cart, item] });
  }
}

// Function to remove item from cart
function removeFromCart(itemId) {
  const cart = globalState.getState().cart;
  globalState.setState({
    cart: cart.filter((cartItem) => cartItem.id !== itemId),
  });
}

// Update cart display
function updateCartDisplay(cart) {
  const cartCountElement = document.querySelector(".count");
  cartCountElement.textContent = cart.length;
}

// Subscribe to state changes
globalState.subscribe((state) => updateCartDisplay(state.cart));

// Function to initialize button states and events
function initializeButtons() {
  document.querySelectorAll(".add-to-cart-button").forEach((button) => {
    const itemId = button.getAttribute("data-id");

    // Set initial button state based on cart
    updateButtonState(button, itemId);

    // Set click event for each button
    button.addEventListener("click", () => toggleCartItem(button, itemId));
  });
}

// Function to update button state (text and class)
function updateButtonState(button, itemId) {
  const isInCart = globalState
    .getState()
    .cart.some((cartItem) => cartItem.id === itemId);
  button.textContent = isInCart ? "Remove challenge" : "Add challenge";
  button.classList.toggle("is-gold", isInCart);
}

// Function to toggle cart item on button click
function toggleCartItem(button, itemId) {
  const cart = globalState.getState().cart;
  const isInCart = cart.some((cartItem) => cartItem.id === itemId);

  if (isInCart) {
    removeFromCart(itemId);
  } else {
    const itemPrice = button.getAttribute("data-price");
    addToCart({ id: itemId, price: itemPrice });
  }

  updateButtonState(button, itemId);
}

// Initialize all add-to-cart buttons
initializeButtons();
