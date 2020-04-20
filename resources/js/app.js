/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./main');

window.Vue = require('vue');

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

/************************************************
 *              generate-reports                *
 ************************************************/
if( document.getElementById("generate-reports") ){
    const generateReports = new Vue({
        el: '#generate-reports',
        data: function () {
            return {
                user_id_token: $('#user_id_token').html(),
                user_email: $('#user_email').html(),
                available_reports_errored: false,
                available_reports_loading: true,
                available_shows_shown: false,
                available_shows_errored: false,
                available_shows_loading: true,
                available_reports: null,
                available_shows: null,
                process_report_button_shown: false,
                report_type: '',
                report_show: '',
            }
        },
        methods: {
            onReportsChange: function() {
                this.available_shows_loading = true
                this.available_shows_shown = false
                this.process_report_button_shown = false
                this.report_show = ''

                if ( this.report_type != '' && this.report_type !== undefined) {
                    this.getAvailableShowsForReport('hrc-2020', this.report_type)
                    this.available_shows_shown = true
                }
                if ( this.report_show != '' && this.report_show !== undefined) {
                    this.process_report_button_shown = true
                }
            },
            onShowsChange: function() {
                if ( this.report_show != '' && this.report_show !== undefined) {
                    this.process_report_button_shown = true
                }
            },
            getAvailableReports: function(show_code, email) {
                axios.get('https://api.montgomerylabs.io:6001/api/checkcompany', {
                    params: {
                        show_code: show_code,
                        email: email
                    }
                })
                .then(response => {
                    this.available_reports = response.data.data
                })
                .catch(error => {
                    console.log(error)
                    this.available_reports_errored = true
                })
                .finally(
                    () => this.available_reports_loading = false
                )
            },
            getAvailableShowsForReport: function(show_code, email) {
                axios.get('https://api.montgomerylabs.io:6001/api/checkcompany', {
                    params: {
                        show_code: show_code,
                        email: email
                    }
                })
                .then(response => {
                    this.available_shows = response.data.data
                })
                .catch(error => {
                    console.log(error)
                    this.available_shows_errored = true
                })
                .finally(
                    () => this.available_shows_loading = false
                )
            },
            processReport: function() {
                console.log('report_type', this.report_type)
                console.log('report_show', this.report_show)
                console.log('user_email', this.user_email)

                axios.get('https://api.montgomerylabs.io:6001/api/checkcompany', {
                    params: {
                        code: this.report_type,
                        show: this.report_show,
                        email: this.user_email
                    }
                })
                .then(response => {
                    // this.available_shows = response.data.data
                    // console.log('available_shows', response)
                })
                .catch(error => {
                    console.log(error)
                    // this.available_shows_errored = true
                })
                .finally(
                    // () => this.available_shows_loading = false
                )
            },
        },
        mounted () {
            this.getAvailableReports('hrc-2020', 'zzxx')
            console.log(this.user_id_token)
        }
    });
}
