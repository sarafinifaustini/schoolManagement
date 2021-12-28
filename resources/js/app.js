/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
// import "fullcalendar/dist/fullcalendar.css";
import FullCalendar from 'vue-full-calendar';
window.Vue = require('vue').default;
Vue.use(FullCalendar);
// import FullCalendar from "@fullcalendar/vue";
// import dayGridPlugin from "@fullcalendar/daygrid";
// import timeGridPlugin from "@fullcalendar/timegrid";
// import ListPlugin from "@fullcalendar/list";
// import interactionPlugin from "@fullcalendar/interaction";
// Vue.use(FullCalendar, dayGridPlugin, timeGridPlugin, interactionPlugin, ListPlugin);
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
Vue.component(
    "agenda-index",
    require("./components/admin/AgendaIndex.vue").default
);
Vue.component('students-index', require('./components/admin/StudentsIndex.vue').default);
Vue.component('teacher-index', require('./components/admin/TeacherIndex.vue').default);
Vue.component('attendance-index', require('./components/teacher/AttendanceIndex.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));
/**

/**
/**

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});