/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;


import * as faceapi from 'face-api.js';

async function loadModels() {
    var url = "./models";
    await faceapi.nets.mtcnn.loadFromUri(url);
    await faceapi.nets.tinyYolov2.loadFromUri(url);
    await faceapi.nets.tinyFaceDetector.loadFromUri(url);
    await faceapi.nets.ssdMobilenetv1.loadFromUri(url);
    await faceapi.nets.faceLandmark68Net.loadFromUri(url);
    await faceapi.nets.faceRecognitionNet.loadFromUri(url);
    await faceapi.nets.faceExpressionNet.loadFromUri(url);
}

window.faceapi = new faceapi;
window.loadFaceApiModels = loadModels();





// Automatically load models when the app loads
document.addEventListener('DOMContentLoaded', loadModels);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
