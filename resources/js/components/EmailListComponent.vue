<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Emails</div>
                    <div class="card-body">
                        <table class="table table-striped col-md-12" id="table-email">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Asunto</td>
                                    <td>destinatario</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="email in emailsList" v-bind:key="email.id">
                                    <td>{{ email.id }}</td>
                                    <td>{{ email.subject }}</td>
                                    <td>{{ email.addressee }}</td>
                                    <td>{{ email.status }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import 'jquery/dist/jquery.min.js';
    import "datatables.net-dt/js/dataTables.dataTables"
    import "datatables.net-dt/css/jquery.dataTables.min.css"
    import $ from 'jquery'; 
    import axios from 'axios';


    export default {
        props: [
            'email'
        ],
        data() {
            return {
                emailsList: this.email,
                urlBase: window.location.origin
            }
        },
        mounted() {
            
            $('#table-email').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
            });
        },
        methods: {
        }
    }
</script>
