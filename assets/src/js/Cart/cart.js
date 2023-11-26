export function addToCart(cart, item) {
  const itemIndex = cart.findIndex((cartItem) => cartItem.id === item.id);
  if (itemIndex === -1) {
    return [...cart, item];
  } else {
    console.log("Item is already in the cart");
    return cart;
  }
}

export function removeFromCart(cart, itemId) {
  return cart.filter((cartItem) => cartItem.id !== itemId);
}
