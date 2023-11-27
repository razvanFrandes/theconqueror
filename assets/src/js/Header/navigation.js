navigation()
function navigation() {
  const btn = document.querySelector(".mastheader__mobile");
  const nav = document.querySelector(".mastheader__nav");
  btn.addEventListener("click", () => {
    nav.classList.toggle('is-active');
    btn.classList.toggle('is-active');
  })
}
