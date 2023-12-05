import {hex2rgb} from "../functions.js";

class ColorPalette extends HTMLElement {
    // element created
    constructor()  {
        super();
        this.color = this.getAttribute('color');
        [this.red, this.green, this.blue] = hex2rgb(this.color);
        this.attachShadow({
            mode: "open"
        });
    }

    // update the class colors based on slider change
    updateColor(value, color) {
        switch(color) {
            case "red":
                this.red = value;
                this.shadowRoot.getElementById('red-value').innerHTML = `[${value}]`;
                break;
            case "green":
                this.green = value;
                this.shadowRoot.getElementById('green-value').innerHTML = `[${value}]`;
                break;
            case "blue":
                this.blue = value;
                this.shadowRoot.getElementById('blue-value').innerHTML = `[${value}]`;
                break;
            default:
                break;
        }

        const colorBox = this.shadowRoot.querySelector('.color-box');
        if(colorBox) {
            colorBox.style.backgroundColor = `rgb(${this.red}, ${this.green}, ${this.blue}`;
        }


    }
    // browser calls this when the element is added to the DOM
    connectedCallback() {
        this.updateColor();
        const container = document.createElement('div');
        container.innerHTML = `
            <style>
            @import '../../styles/main.css';
            
            .color-changer {
                border: 1px solid black;
                max-width: 200px;
                width: 100%;
                position: absolute;
                background-color: #fff;
                left: 100%;
                top: 0;
            }
         
            .color-box {
                height: 100px;
                width: 100%;
            }
            </style>
            <div class = 'color-changer'> 
                <div class="color-box" style = 'background-color: ${this.color}'></div>
                <h5 class = 'mar-bottom-8'>RGB</h5>
                <div>
                    <p>Red <span id="red-value">[${this.red}]</span></p>
                    <input id = 'red' type="range" min = '0' max = '255' value = ${this.red}>
                </div>
                
                <div>
                    <p>Green <span id="green-value">[${this.green}]</span></p>
                    <input id = 'green' type="range" min = '0' max = '255' value = ${this.green}>
                </div>
                
                <div>
                <p>Blue <span id="blue-value">[${this.blue}]</span></p>
                    <input id = 'blue' type="range" min = '0' max = '255' value = ${this.blue} >
                </div>
             </div>
        `;

        this.shadowRoot.appendChild(container);
        const redInput = this.shadowRoot.getElementById('red');
        const greenInput = this.shadowRoot.getElementById('green');
        const blueInput = this.shadowRoot.getElementById('blue');

        redInput.addEventListener('input', (e) => this.updateColor(e.target.value, "red"));
        greenInput.addEventListener('input', (e) => this.updateColor(e.target.value, "green"));
        blueInput.addEventListener('input', (e) => this.updateColor(e.target.value, "blue"));
    }




}

customElements.define('color-palette', ColorPalette);

