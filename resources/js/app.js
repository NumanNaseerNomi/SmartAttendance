import "./bootstrap";

import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap.bundle.min.js";

import "@fortawesome/fontawesome-free/css/all.min.css"

import { createApp } from "vue";
import app from "../views/app.vue";

createApp(app).mount("#app");