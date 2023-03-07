'use strict';

////////////Variable Assigning/////////////

const btnStart = document.querySelector('.content__btn-start');
const btnStop = document.querySelector('.content__btn-stop');
const btnReset = document.querySelector('.content__btn-reset');
const clockTimer = document.querySelector('.content__clock');



//////////Function////////////
let sec = 0;
let min = 0;
let hour = 0;

const startTimer = function () {

    let c = 0;
    const tick = () => {
        if (sec === 60) {
            min++;
            sec = 0;
        }
        if (min === 60) {
            hour++;
            sec = 0;
            min = 0;
        }
        if (c === 100) {
            c = 0;
            sec++;
        }

        c++;

        //display
        if (c !== 100) {
            clockTimer.textContent = `${String(hour).padStart(2, 0)
                }:${String(min).padStart(2, 0)
                }:${String(sec).padStart(2, 0)
                }.${String(c).padStart(2, 0)
                }`;
        }
    };

    const timer = setInterval(tick, 10);
    return timer;
}


////////////Button/////////////////

let timer, flag = false;

btnStart.addEventListener('click', function () {
    if (!flag) {
        flag = true;
        timer = startTimer();
    }
})

btnStop.addEventListener('click', function () {
    if (flag) {
        flag = false;
        clearInterval(timer);
    }
})

btnReset.addEventListener('click', function () {
    clearInterval(timer);
    sec = min = hour = 0;
    clockTimer.textContent = `${String(hour).padStart(2, 0)}:${String(min).padStart(2, 0)}:${String(sec).padStart(2, 0)}.00`;
})


//Time
const formatCur = function (value, locale, currency) {
    return new Intl.NumberFormat(locale, {
        style: 'currency',
        currency: currency
    }).format(value);
}

//Showing clock time
const clockDisplay = function () {
    const time = setInterval(() => {
        const current = new Date();
        const hour = current.getHours();
        const min = current.getMinutes();
        const sec = current.getSeconds();
        // const mili = current.getMilliseconds();

        clockTimer.textContent = `${String(hour).padStart(2, 0)}:${String(min).padStart(2, 0)}:${String(sec).padStart(2, 0)}`;
    }, 1000
    );

}

// clockDisplay();


