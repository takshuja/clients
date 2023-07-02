function leftScroll() {
    const left = document.querySelector(".scroll-container");
    //   left.scrollBy(200, 0);
    left.scrollLeft += 600;
}
function rightScroll() {
    const right = document.querySelector(".scroll-container");
    right.scrollBy(-200, 0);
}
