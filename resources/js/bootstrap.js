window._ = require('lodash');

try {
    require('bootstrap');
} catch (e) { }

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
/* import * as faceapi from 'face-api.js';
import { tinyFaceDetector, detectAllFaces, FaceMatcher, detectSingleFace, createCanvasFromMedia, TinyFaceDetectorOptions, nets, bufferToImage, ssdMobilenetv1, loadTinyFaceDetectorModel, loadSsdMobilenetv1Model, loadTinyYolov2Model, loadAgeGenderModel, loadFaceRecognitionModel, loadFaceDetectionModel, loadFaceExpressionModel, loadFaceLandmarkModel, loadFaceLandmarkTinyModel, SsdMobilenetv1, resizeResults, draw, FaceLandmarks68, tf, fetchNetWeights, TinyFaceDetector, env, euclideanDistance, fetchImage } from 'face-api.js'


//window.faceapi = require("faceapi");
document.addEventListener('DOMContentLoaded', async () => {
    console.log("inside DOMContentLoaded");

    var url = "./models";
    try {
        console.log("faceapi", faceapi)

        // Load the models
        await faceapi.nets.mtcnn.loadFromUri(url);
        await faceapi.nets.tinyYolov2.loadFromUri(url);
        await faceapi.nets.tinyFaceDetector.loadFromUri(url);
        await faceapi.nets.ssdMobilenetv1.loadFromUri(url);
        await faceapi.nets.faceLandmark68Net.loadFromUri(url);
        await faceapi.nets.faceRecognitionNet.loadFromUri(url);
        await faceapi.nets.faceExpressionNet.loadFromUri(url);

        console.log("models loaded");

    } catch (error) {
        console.error("Error loading models:", error);
    }


});
export default faceapi; */




/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
