/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/task_dnd.js ***!
  \**********************************/
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

var draggables = document.querySelectorAll('.draggable');
var containers = document.querySelectorAll('.drop-zone');
var draggableElement;
var draggableContainer;
draggables.forEach(function (draggable) {
  draggable.addEventListener('dragstart', function () {
    draggable.classList.add('dragging');
    draggableElement = draggable;
  });
  draggable.addEventListener('dragend', function () {
    draggable.classList.remove('dragging');
    axios.put('/api/task/updateOrder', {
      id: $(draggableElement).data('task'),
      status: $(draggableContainer).data('status')
    });
  });
});
containers.forEach(function (container) {
  container.addEventListener('dragover', function (e) {
    e.preventDefault();
    var afterElement = getDragAfterElement(container, e.clientY);
    var draggable = document.querySelector('.dragging');

    if (afterElement == null) {
      container.appendChild(draggable);
    } else {
      container.insertBefore(draggable, afterElement);
    }

    draggableContainer = container;
  });
});

function getDragAfterElement(container, y) {
  var draggableElements = _toConsumableArray(container.querySelectorAll('.draggable:not(.dragging)'));

  return draggableElements.reduce(function (closest, child) {
    var box = child.getBoundingClientRect();
    var offset = y - box.top - box.height / 2;

    if (offset < 0 && offset > closest.offset) {
      return {
        offset: offset,
        element: child
      };
    } else {
      return closest;
    }
  }, {
    offset: Number.NEGATIVE_INFINITY
  }).element;
}
/******/ })()
;