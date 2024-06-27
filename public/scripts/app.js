var swiper = new Swiper(".mySwiperRev", {
    pagination: {
        el: ".swiper-pagination-rev",
        clickable: true,
    },
    speed: 500,
});

const btnNumlike = document.querySelectorAll('.section1-top-block__lk-documents');
const tablike = document.querySelectorAll('.section1-top-container__lk-documents')

btnNumlike.forEach(function (item){
    item.addEventListener('click', function (){
        btnNumlike.forEach(function (i){
            i.classList.remove('section1-top-block-active__lk-documents')
        })

        item.classList.add('section1-top-block-active__lk-documents')

        let tubIDlike = item.getAttribute('data-tab-documents');
        let tabActivelike = document.querySelector(tubIDlike);

        tablike.forEach(function (item){
            item.classList.remove('section1-top-container-active__lk-documents')
        })
        tabActivelike.classList.add('section1-top-container-active__lk-documents')

    })
})



const btnNum = document.querySelectorAll('.section1-top-block__lk-agreement');
const tab = document.querySelectorAll('.section1-container__lk-agreement')

btnNum.forEach(function (item){
    item.addEventListener('click', function (){
        btnNum.forEach(function (i){
            i.classList.remove('section1-top-block-active__lk-agreement')
        })

        item.classList.add('section1-top-block-active__lk-agreement')

        let tubIDlike = item.getAttribute('data-tab-agreement');
        let tabActivelike = document.querySelector(tubIDlike);

        tab.forEach(function (item){
            item.classList.remove('section1-container-active__lk-agreement')
        })
        tabActivelike.classList.add('section1-container-active__lk-agreement')

    })
})
