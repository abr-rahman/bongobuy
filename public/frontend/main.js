function dropdownHandler(element) {
  let single = element.getElementsByTagName("ul")[0];
  single.classList.toggle("hidden");
}

function MenuHandler(el, val) {
  let MainList = el.parentElement.parentElement.getElementsByTagName("ul")[0];
  let closeIcon =
    el.parentElement.parentElement.getElementsByClassName("close-m-menu")[0];
  let showIcon =
    el.parentElement.parentElement.getElementsByClassName("show-m-menu")[0];
  if (val) {
    MainList.classList.remove("hidden");
    el.classList.add("hidden");
    closeIcon.classList.remove("hidden");
  } else {
    showIcon.classList.remove("hidden");
    MainList.classList.add("hidden");
    el.classList.add("hidden");
  }
}
// ------------------------------------------------------
let sideBar = document.getElementById("mobile-nav");
let menu = document.getElementById("menu");
let cross = document.getElementById("cross");
const sidebarHandler = (check) => {
  if (check) {
    sideBar.style.transform = "translateX(0px)";
    menu.classList.add("hidden");
    cross.classList.remove("hidden");
  } else {
    sideBar.style.transform = "translateX(-100%)";
    menu.classList.remove("hidden");
    cross.classList.add("hidden");
  }
};
let list = document.getElementById("list");
let chevrondown = document.getElementById("chevrondown");
let chevronup = document.getElementById("chevronup");
const listHandler = (check) => {
  if (check) {
    list.classList.remove("hidden");
    chevrondown.classList.remove("hidden");
    chevronup.classList.add("hidden");
  } else {
    list.classList.add("hidden");
    chevrondown.classList.add("hidden");
    chevronup.classList.remove("hidden");
  }
};






// phone menu toggoles
var sub_menus = document.querySelectorAll('.sub_menu');
var sub_menu_uls = document.querySelectorAll('.sub_menu_ul');
var sub_sub_menus = document.querySelectorAll('.sub_sub_menu');
var sub_sub_menu_uls = document.querySelectorAll('.sub_sub_menu_ul');
var show_sub_menu_ul_closes = document.querySelectorAll('.show_sub_menu_ul_close');

sub_menus.forEach((button, index) => {
  button.addEventListener('click', () => {
    // Toggle 'show_submenu' class of clicked sub_menu_ul
    sub_menu_uls[index].classList.toggle('show_submenu');
  });
});

sub_sub_menus.forEach((button, index) => {
  button.addEventListener('click', () => {
    // Toggle 'show_sub_submenu' class of clicked sub_sub_menu_ul
    sub_sub_menu_uls[index].classList.toggle('show_sub_submenu');
  });
});

show_sub_menu_ul_closes.forEach((button, index) => {
  button.addEventListener('click', () => {
    // Add 'show_submenu' class to the corresponding sub_menu_ul when the close button is clicked
    sub_menu_uls[index].classList.add('show_submenu');
    // If 'show_submenu' class is added, also add 'show_sub_submenu' class to the corresponding sub_sub_menu_ul
    if (sub_menu_uls[index].classList.contains('show_submenu')) {
      sub_sub_menu_uls[index].classList.add('show_sub_submenu');
    }
  });
});






// Price Range
(function () {
  var parent = document.querySelector(".range-slider");
  if (!parent) return;

  var rangeS = parent.querySelectorAll("input[type=range]"),
    numberS = parent.querySelectorAll("input[type=number]");

  rangeS.forEach(function (el) {
    el.oninput = function () {
      var slide1 = parseFloat(rangeS[0].value),
        slide2 = parseFloat(rangeS[1].value);

      if (slide1 > slide2) {
        [slide1, slide2] = [slide2, slide1];
        // var tmp = slide2;
        // slide2 = slide1;
        // slide1 = tmp;
      }

      numberS[0].value = slide1;
      numberS[1].value = slide2;
    };
  });

  numberS.forEach(function (el) {
    el.oninput = function () {
      var number1 = parseFloat(numberS[0].value),
        number2 = parseFloat(numberS[1].value);

      if (number1 > number2) {
        var tmp = number1;
        numberS[0].value = number2;
        numberS[1].value = tmp;
      }

      rangeS[0].value = number1;
      rangeS[1].value = number2;
    };
  });
})();



// web search toggoles
var web_search_sec = document.querySelector('.web_search_sec');
var web_search_btn = document.querySelector('.web_search_btn');

var isToggled = false; // flag to keep track of the state

web_search_btn.addEventListener('click', () => {
  if (!isToggled) {
    web_search_sec.style.top = '40px';
    isToggled = true; // Update the flag
  } else {
    web_search_sec.style.top = '-100vh'; // Return to original position
    isToggled = false; // Update the flag
  }
});




// phone search toggoles

var phone_search_sec = document.querySelector('.phone_search_sec');
var phone_search_btn = document.querySelector('.phone_search_btn');
var phone_search_close_btn = document.querySelector('.phone_search_close_btn');

phone_search_btn.addEventListener('click', () => {
  phone_search_sec.style.top = '0';
});

phone_search_close_btn.addEventListener('click', () => {
  phone_search_sec.style.top = '-100vh';
});
