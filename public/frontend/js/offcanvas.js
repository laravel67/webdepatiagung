$(function () {
  'use strict'

  $('[data-toggle="offcanvas"]').on('mouseenter', function () {
    $('.offcanvas-collapse').toggleClass('open')
  })
})

// document.querySelector('.nav-item.dropdown').addEventListener('mouseenter', function() {
//         this.querySelector('.dropdown-menu').classList.add('show');
//     });
//     document.querySelector('.nav-item.dropdown').addEventListener('mouseleave', function() {
//         this.querySelector('.dropdown-menu').classList.remove('show');
//     });
