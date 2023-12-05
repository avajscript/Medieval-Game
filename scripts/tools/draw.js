// Declaring elements

import {LinkedList} from "../LinkedList.js";

/** @type {HTMLCanvasElement} */
const canvas = document.getElementById("canvas");
/** @type {HTMLInputElement} */
const colorInput = document.getElementById('colorInput');
const paletteElem = document.getElementById('palette');

// Declaring constants
const WIDTH = 400,
    HEIGHT = 400,
    PALETTE_LENGTH = 10;
let paletteList = new LinkedList( null, PALETTE_LENGTH);


const createColorElem = (color) => {
    const div = document.createElement('div');
    div.classList.add('palette-box')
    div.style.backgroundColor = color;
    return div;
}
const addColor = (e) => {
    // add color to palette linked list
    paletteList.insertAtStart(e.target.value);
    const palettes = paletteList.map(createColorElem);
    paletteElem.innerHTML = "";
    console.log(e);
    palettes.forEach(palette => {

        paletteElem.appendChild(palette);
    })

}




// Event Listeners
colorInput.addEventListener('change', (e) => addColor(e));

