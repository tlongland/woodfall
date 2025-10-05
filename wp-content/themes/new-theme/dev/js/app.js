window.addEventListener('load', () => {
    window.nt ? null : this.window.nt = {};
    window.nt.main = new Main();

    window.nt.main.ready(() => {
        window.dispatchEvent(window.nt.main.events.mainReady);
        window.nt.lazyLoader = new LazyLoad();
    });
});

