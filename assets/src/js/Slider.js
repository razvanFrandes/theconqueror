import { Splide } from "@splidejs/splide";

productGalleryInit();

function productGalleryInit() {
  const sliders = document.querySelectorAll(".slider.chalange-gallery");

  if (sliders.length === 0) {
    return;
  }

  sliders.forEach((slider, index) => {
    const hasPagination = slider.dataset.pagination ? true : false;

    const productGallery = new Splide(slider, {
      type: "loop",
      pagination: false,
      arrows: JSON.parse(slider.dataset.arrows),
      pagination: hasPagination,
    });

    productGallery.on("pagination:mounted", function (data) {
      data.list.classList.add("splide__pagination--custom");
      data.items.forEach(function (item) {
        item.button.textContent = String(item.page + 1);
      });
    });

    productGallery.mount();
  });
}
