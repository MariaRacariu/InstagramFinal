let heartIcon = document.querySelector("#heartIkon");

heartIcon.addEventListener("click", () => {
    console.log("click");

    heartIcon.style.color = "red";
    let likes = 0;

    // heartIcon.addEventListener("click", () => {
    //     likes += 1;
    // });
});
let likesSpan = document.querySelector("#likes");

likes = 55;

heartIcon.addEventListener("click", () => {
    likes += 1;

    likesSpan.innerHTML = likes;
});