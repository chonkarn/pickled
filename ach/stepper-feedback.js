 (function () {
    var selector = '.mdl-stepper#demo-stepper-feedback';
    // Select stepper container element      
    var stepperElement = document.querySelector(selector);
    var Stepper;
    var steps;
    var inputTransientMessage /** @type {HTMLElement} */;
    if (!stepperElement) return;
    
    // Get the MaterialStepper instance of element to control it.          
    Stepper = stepperElement.MaterialStepper;
    
    if (!Stepper) {
      console.error('MaterialStepper instance is not available for selector: ' + selector + '.');
      return;
    }
    steps = stepperElement.querySelectorAll('.mdl-step');
    for (var i = 0; i < steps.length; i++) {
      
      // When user clicks on [data-stepper-next] button of step.          
      steps[i].addEventListener('onstepnext', (function (e, step) {
        return function () {
          // {element}.MaterialStepper.next() change the state of current step to "completed" 
          // and move one step forward.        
          inputTransientMessage = step.querySelector('#stepper-transient-message');
          
          if (inputTransientMessage && inputTransientMessage.value.length) {
            step.setAttribute('data-step-transient-message', inputTransientMessage.value);
          }
          setTimeout(function () {
            Stepper.next();              
          }, 3000);
        };
      })(event, steps[i]));
    }
    // When all steps are completed this event is dispatched.          
    stepperElement.addEventListener('onsteppercomplete', function (e) {
      var toast = document.querySelector('#snackbar-stepper-complete');
      if (!toast) return;
      toast.MaterialSnackbar.showSnackbar({
        message: 'Stepper feedback are completed',
        timeout: 4000,
        actionText: 'Ok'
      });
    });
  })();
  (function () {
    var toggle = document.querySelector('[href="#stepper-feedback-toggle"]');
    var snippetDirections = document.querySelector('#snippet-stepper-feedback');
    var stepperElement = snippetDirections.querySelector('.mdl-stepper');
    var cssClassHorizontal = 'mdl-stepper--horizontal';
    toggle.addEventListener('click', function (event) {
      event.preventDefault();
      
      if (!stepperElement) return;
      if (stepperElement.classList.contains(cssClassHorizontal)) {
        stepperElement.classList.remove(cssClassHorizontal);
      } else {
        stepperElement.classList.add(cssClassHorizontal);        
      }
    });
  })();
