
  /**
   * Easy selector helper function
   * Start Isotop Filter JS Activation
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /**
   * Porfolio isotope and filter
   */
  window.addEventListener('load', () => {
    let portfolioContainer = select('.isotop_filter-container');
    if (portfolioContainer) {
      let portfolioIsotope = new Isotope(portfolioContainer, {
        itemSelector: '.isotop_filter-item',
        layoutMode: 'fitRows'
      });

      let portfolioFilters = select('#isotop_filter-flters li', true);

      on('click', '#isotop_filter-flters li', function(e) {
        e.preventDefault();
        portfolioFilters.forEach(function(el) {
          el.classList.remove('filter-active');
        });
        this.classList.add('filter-active');

        portfolioIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
      }, true);
    }

  });





/**** Back to top button ********************/

  const topbutton = document.getElementById("topcontrol");
  topbutton.onclick = function (e) {
      window.scrollTo({ top: 0, behavior: "smooth" });
  };

  window.onscroll = function () {
      if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
          topbutton.style.opacity = "1";
      } else {
          topbutton.style.opacity = "0";
      }
  };


  
  AOS.init({
    duration: 1000,
    easing: "ease-in-out",
    once: false,
    mirror: false,
  });



	/*****************************
  // head_room Activation For Hide and show Menubar
   ******************************/
  let header = document.querySelector(".nav_head_room");
  let headroom = new Headroom(header);
  headroom.init();



  /*****************************
  // Pure Counter Activation 
   ******************************/
  new PureCounter();



  /*****************************
  // Jquery Draggable  
   ******************************/

  $('.mlw_qmn_timer').draggable();
  $('.quiz_counter').draggable();

  function touchHandler(event) {
    var touch = event.changedTouches[0];

    var simulatedEvent = document.createEvent("MouseEvent");
        simulatedEvent.initMouseEvent({
        touchstart: "mousedown",
        touchmove: "mousemove",
        touchend: "mouseup"
    }[event.type], true, true, window, 1,
        touch.screenX, touch.screenY,
        touch.clientX, touch.clientY, false,
        false, false, false, 0, null);

    touch.target.dispatchEvent(simulatedEvent);
    event.preventDefault();
}

function init() {
    document.addEventListener("touchstart", touchHandler, true);
    document.addEventListener("touchmove", touchHandler, true);
    document.addEventListener("touchend", touchHandler, true);
    document.addEventListener("touchcancel", touchHandler, true);
}



  /*****************************
  // QSM Plugin Question Counter  
   ******************************/

// Detect when a user clicks on an option and Run Delay

document.querySelectorAll('.qmn_mc_answer_wrap').forEach(function(option) {
  option.addEventListener('click', function() {
    setTimeout(function() {

      var correctAnswerCount = 0;
      var incorrectAnswerCount = 0;

      // Count the number of correct and incorrect answers
      var quizSections = document.querySelectorAll('.quiz_section');
      for (var i = 0; i < quizSections.length; i++) {
        var options = quizSections[i].querySelectorAll('.qmn_mc_answer_wrap');
        for (var j = 0; j < options.length; j++) {
          if (options[j].classList.contains('qmn_correct_answer')) {
            correctAnswerCount++;
          } else if (options[j].classList.contains('qmn_incorrect_answer')) {
            incorrectAnswerCount++;
          }
        }
      }

      // Update the counts
      document.querySelector('.correct-answer-count').textContent = correctAnswerCount;
      document.querySelector('.incorrect-answer-count').textContent = incorrectAnswerCount;
    }, 2000);
  });
});
      // Count Total Questions
var quizSections = document.querySelectorAll('.quiz_section');
var totalQuiz = quizSections.length;
document.querySelector('.total_Question').textContent = totalQuiz -1;




// Detect when a user clicks on an option
// document.querySelectorAll('.mrq_checkbox_class').forEach(function(option) {
//   option.addEventListener('click', function() {
//     setTimeout(function() {
//       // Click the next button if it exists
//       var nextButton = option.closest('.qsm-quiz-container').querySelector('.qmn_btn.mlw_qmn_quiz_link.mlw_next.mlw_custom_next');
//       if (nextButton) {
//         nextButton.click();
//       }
//     }, 3000);
//   });
// });