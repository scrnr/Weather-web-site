const bgImg = document.getElementById('bg-img');
const preload = document.getElementById('preload');


setTimeout(() => {
    const img = new Image();
    img.src = bgImg.src;

    img.onload = () => {
        document.body.style.backgroundImage = `url(${bgImg.src})`;
        preload.classList.add('hide');
    }

}, 1000);

const addBtn = document.querySelector('.add-btn');
const todayMore = document.querySelector('.today__more');
const fourDaysItem = document.querySelectorAll('.four-days__item');

if (addBtn) {
    addBtn.onclick = function () {
        addBtn.classList.toggle('open');
        todayMore.classList.toggle('open');

        fourDaysItem.forEach((item, index) => {
            if (index === fourDaysItem.length - 2 || index === fourDaysItem.length - 1) {
                item.classList.toggle('hide');
            }
        });
    }
}
 


