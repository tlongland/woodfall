class Main {
    constructor() {
        this.config = {
            smoothScrolling: true,
            internalScrollSpeed: 2,
            smootherSettings: {
                normalizeScroll: false,
                smoothTouch: 0.01,
                ignoreMobileResize: true,
                content: '#smooth-inner',
                smooth: 1,
                effects: true,
            },
            smoother: null,
        }
        this.breakpoints = {
            sm: 768,
            md: 1024,
            lg: 1440
        };

        this.events = {
            breakpointChange: new Event('breakpointChange'),
            mainReady: new Event('mainReady'),
        };

        this.currentBreakpoint = this.getBreakpoint();
        this.init();
    }

    init() {
        gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

        if (this.config.smoothScrolling) {
            if (this.currentBreakpoint === 'lg') {
                this.config.smoother = ScrollSmoother.create(this.config.smootherSettings);
                ScrollTrigger ? ScrollTrigger.refresh(true) : null;
            } else {
                this.config.smoother = false;
                document.body.classList.add('no-smooth-scrolling');
                ScrollTrigger ? ScrollTrigger.refresh(true) : null;
            }
        } else {
            document.body.classList.add('no-smooth-scrolling');
        };
    }

    ready(callback) {
        callback.bind(this)();
    }

    /**
     * Method to get the current breakpoint
     */
    getBreakpoint() {
        let windowWidth = window.innerWidth;
        let newBP = null;

        if (windowWidth > this.breakpoints.md) {newBP = 'lg';}
        if (windowWidth <= this.breakpoints.md && windowWidth > this.breakpoints.sm) {newBP = 'md';}
        if (windowWidth <= this.breakpoints.sm) {newBP = 'sm';}

        if (this.currentBreakpoint != newBP) {
            window.dispatchEvent(this.events.breakpointChange);
        }

        this.currentBreakpoint = newBP;

        return this.currentBreakpoint
    }
}