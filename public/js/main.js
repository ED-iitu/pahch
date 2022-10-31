// ZOOM
$('.zoom-img').on('click', function() {
  $('#zoom-img-overlay')
      .css({backgroundImage: `url(${this.src})`})
      .addClass('open')
      .one('click', function() {
        $(this).removeClass('open');
      });
});

// Menu Burger
$(document).ready(function () {
  $('.header__burger, .header__menu-close').click(function (event) {
      $('.header__burger,.header__menu').toggleClass('active');
      $('body').toggleClass('lock');
  });
});

$(document).ready(function() {
  $('.header__menu_items').click(function(event) {
    $('body').removeClass('lock');
    $('.header__burger,.header__menu').removeClass('active');
  })
});



// var modal1 = document.getElementById("main__myModal");
// var btn1 = document.getElementById("section__main-btn");
// var span1 = document.getElementsByClassName("main__modal_close")[0];

// btn1.onclick = function() {
//   modal1.style.display = "block";
// }
// span1.onclick = function() {
//   modal1.style.display = "none";
// }
// window.onclick = function(event1) {
//   if (event1.target == modal1) {
//     modal1.style.display = "none";
//   }
// }

// SWIPERS
// Swiper1 
var swiper1 = new Swiper(".mainSwiper", {
  navigation: {
    nextEl: ".swiper-button-next-1",
    prevEl: ".swiper-button-prev-1",
  },
  pagination: {
    el: ".swiper-pagination-1",
  },
  slidesPerView: 1,
  spaceBetween: 30,
  // loop: 1,
  // breakpoints: {
  //   1200: {
  //     slidesPerView: 3,
  //   },
  //   700: {
  //     slidesPerView: 2,
  //   },
  // }
});

// Swiper2
var swiper2 = new Swiper(".newsSwiper", {
  spaceBetween: 30,
  navigation: {
    nextEl: ".swiper-button-next-2",
    prevEl: ".swiper-button-prev-2",
  },
  breakpoints: {
    1200: {
      slidesPerView: 4,
    },
    991: {
      slidesPerView: 3,
    },
    768: {
      slidesPerView: 2,
    },
    500: {
      slidesPerView: 1,
    },
  },
  autoplay: {
    delay: 2500,
  },
  pagination: {
    el: ".swiper-pagination-2",
  },
  loop: 1,
});

// Swiper3
var swiper3 = new Swiper(".booksSwiper", {
  spaceBetween: 30,
  navigation: {
    nextEl: ".swiper-button-next-3",
    prevEl: ".swiper-button-prev-3",
  },
  breakpoints: {
    1200: {
      slidesPerView: 4,
    },
    991: {
      slidesPerView: 3,
    },
    768: {
      slidesPerView: 2,
    },
    500: {
      slidesPerView: 1,
    },
  },
  autoplay: {
    delay: 2500,
  },
  pagination: {
    el: ".swiper-pagination-3",
  },
  loop: 1,
});


// Swiper4
var swiper4 = new Swiper(".partnersSwiper", {
  spaceBetween: 30,
  navigation: {
    nextEl: ".swiper-button-next-4",
    prevEl: ".swiper-button-prev-4",
  },
  breakpoints: {
    991: {
      slidesPerView: 3,
    },
    768: {
      slidesPerView: 2,
    },
    500: {
      slidesPerView: 1,
    },
  },
  autoplay: {
    delay: 2500,
  },
  pagination: {
    el: ".swiper-pagination-4",
  },
  loop: 1,
});


// Swiper5
var swiper5 = new Swiper(".news-item-slider", {
  spaceBetween: 30,
  effect: "coverflow",
  grabCursor: true,
  // centeredSlides: true,
  slidesPerView: "auto",
  navigation: {
    nextEl: ".swiper-button-next-5",
    prevEl: ".swiper-button-prev-5",
  },
  coverflowEffect: {
    rotate: 0,
    stretch: 0,
    depth:100,
    modifier: 0,
    slideShadows: true,
  },
  breakpoints: {
    991: {
      slidesPerView: 3,
    },
    768: {
      slidesPerView: 2,
    },
    500: {
      slidesPerView: 1,
    },
  },
  autoplay: {
    delay: 1500,
  },
  pagination: {
    el: ".swiper-pagination-5",
  },
  loop: 0,
});

$("#profileImage").click(function(e) {
  $("#imageUpload").click();
});

function fasterPreview( uploader ) {
  if ( uploader.files && uploader.files[0] ){
        $('#profileImage').attr('src', 
           window.URL.createObjectURL(uploader.files[0]) );
  }
}

$("#imageUpload").change(function(){
  fasterPreview( this );
});

var map;
DG.then(function () {
    map = DG.map('map', {
        center: [43.210002, 76.969133],
        zoom: 17
    });
    DG.marker([43.210002, 76.969133]).addTo(map);
});

var phoneMask = IMask(
  document.getElementById('input-phone'), {
    mask: '+{7}(000)000-00-00',
  });
  document.getElementById("auth-card-form","profile-edit").addEventListener('submit', function(e) {
  e.preventDefault()
  let phone =  document.getElementById('input-phone')
  if(phone.value.length < 16){
    phone.style.border = '1px solid red';
    return
  }
});


