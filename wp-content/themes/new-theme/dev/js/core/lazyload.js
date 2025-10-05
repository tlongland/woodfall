class LazyLoad {
    constructor() {
        this.images = document.querySelectorAll('img:not(.no-lozad');
        let self = this;

        this.observer = lozad(this.images, {
            loaded: function(el) {
                el.setAttribute('sizes', el.dataset.sizes);
                el.removeAttribute('data-sizes');

                if (el.classList.contains('carousel_img')) {
                    let parentCarousel = el.parentNode.parentNode;
                    parentCarousel.querySelectorAll('.keen-slider__slide img').foreach(slideImg => {
                        self.observer.triggerLoad(slideImg);
                    });
                }
            }
        });

        this.observer.observe();
    }
}