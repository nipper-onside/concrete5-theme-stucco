/*
 * Animenu
 * A responsive dropdown navigation made with SASS and a bit of JS, based on this original article. (http://red-team-design.com/animenu-a-responsive-dropdown-navigation-made-with-sass/)
 * 
 * Browser compatibility
 * Animenu works in all major browsers. IE8+.
 * 
 * License
 * Public domain: <http://unlicense.org/>
 * 
 * This is free and unencumbered software released into the public domain.
 * 
 * Anyone is free to copy, modify, publish, use, compile, sell, or distribute this software, either in source code form or as a compiled binary, for any purpose, commercial or non-commercial, and by any means.
 * 
 * In jurisdictions that recognize copyright laws, the author or authors of this software dedicate any and all copyright interest in the software to the public domain. We make this dedication for the benefit of the public at large and to the detriment of our heirs and successors. We intend this dedication to be an overt act of relinquishment in perpetuity of all present and future rights to this software under copyright law.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 * 
 * For more information, please refer to <http://unlicense.org/>
*/

(function(){
  var animenuToggle = document.querySelector('.animenu__toggle'),
      animenuNav    = document.querySelector('.animenu__nav'),
      hasClass = function( elem, className ) {
        return new RegExp( ' ' + className + ' ' ).test( ' ' + elem.className + ' ' );
      },
      toggleClass = function( elem, className ) {
        var newClass = ' ' + elem.className.replace( /[\t\r\n]/g, ' ' ) + ' ';
        if( hasClass(elem, className ) ) {
          while( newClass.indexOf( ' ' + className + ' ' ) >= 0 ) {
            newClass = newClass.replace( ' ' + className + ' ' , ' ' );
          }
          elem.className = newClass.replace( /^\s+|\s+$/g, '' );
        } else {
          elem.className += ' ' + className;
        }
      },
      animenuToggleNav =  function (){
        toggleClass(animenuToggle, 'animenu__toggle--active');
        toggleClass(animenuNav, 'animenu__nav--open');
      }

  if (!animenuToggle.addEventListener) {
      animenuToggle.attachEvent('onclick', animenuToggleNav);
  }
  else {
      animenuToggle.addEventListener('click', animenuToggleNav);
  }
})();