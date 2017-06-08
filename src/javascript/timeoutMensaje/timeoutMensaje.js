document.addEventListener('DOMContentLoaded', main, false);

function main() {
    var correct = document.querySelector('.correct');
    var incorrect = document.querySelector('.incorrect');

    if (correct) {
        setTimeout(function () {
            correct.parentNode.removeChild(correct);
        }, 3000);
    }
    if (incorrect) {
        setTimeout(function () {
            incorrect.parentNode.removeChild(incorrect);
        }, 3000);
    }
}