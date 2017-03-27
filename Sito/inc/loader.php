<style>
  /* Paste this css to your style sheet file or under head tag */
 /* This only works with JavaScript,
 if it's not present, don't show loader */
 .no-js #loader { display: none;  }
 .js #loader { display: block; position: absolute; left: 100px; top: 0; }
 .se-pre-con {
 position: fixed;
 left: 0px;
 top: 0px;
 width: 100%;
 height: 100%;
 z-index: 9999;
 background-color: black;
 }
 /* Editable */
/* Probably shouldn't edit, but go crazy. */
/* Sassery */
.spinner {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) rotate(90deg);
  width: 2em;
}

.spinner, .spinner div {
  transform-origin: 50% 50%;
}

.spinner div {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
}

.spinner:before,
.spinner:after,
.spinner div:before,
.spinner div:after {
  animation-duration: 1000ms;
  animation-iteration-count: infinite;
  content: "";
  background: #009DDC;
  border-radius: 100%;
  width: 0.5em;
  height: 0.5em;
  position: absolute;
}

.spinner:before,
.spinner div:before {
  animation-name: orbBounceBefore;
  top: -0.25em;
  left: -0.25em;
}

.spinner:after,
.spinner div:after {
  animation-name: orbBounceAfter;
  top: -0.25em;
  right: -0.25em;
}

.spinner-a {
  transform: rotate(60deg) translateY(0);
}

.spinner-b {
  transform: rotate(120deg) translateY(0);
}

@keyframes orbBounceBefore {
  60% {
    transform: translateX(0);
    animation-timing-function: cubic-bezier(0.55, 0.085, 0.68, 0.53);
  }
  80% {
    animation-timing-function: cubic-bezier(0, 1.11, 0.7, 1.43);
    transform: translateX(-100%);
  }
  100% {
    transform: translateX(0);
  }
}
@keyframes orbBounceAfter {
  60% {
    animation-timing-function: cubic-bezier(0.55, 0.085, 0.68, 0.53);
    transform: translateX(0);
  }
  80% {
    animation-timing-function: cubic-bezier(0, 1.11, 0.7, 1.43);
    transform: translateX(100%);
  }
  100% {
    transform: translateX(0);
  }
}
.spinner-a:before {
  animation-delay: 166.66667ms;
}

.spinner-b:before {
  animation-delay: 333.33333ms;
}

.spinner:after {
  animation-delay: 500ms;
}

.spinner-a:after {
  animation-delay: 666.66667ms;
}

.spinner-b:after {
  animation-delay: 833.33333ms;
}


</style>
<div class="se-pre-con">
  <div class="spinner">
    <div class="spinner-a"></div>
    <div class="spinner-b"></div>
  </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
//paste this code under the head tag or in a separate js file.
// Wait for window load
$(window).load(function() {
// Animate loader off screen
$(".se-pre-con").fadeOut("slow");
setTimeout(function () {
  $(".se-pre-con").remove();
}, 2000);
});
</script>
